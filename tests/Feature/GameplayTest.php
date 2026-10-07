<?php

namespace Tests\Feature;

use App\Models\GoldPurchase;
use App\Models\GoldShop;
use App\Models\ItemShop;
use App\Models\UserGrowpath;
use App\Models\UserHabit;
use Database\Seeders\GoldShopSeeder;
use Database\Seeders\ItemSeeder;
use Database\Seeders\PPSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GameplayTest extends TestCase
{
    use RefreshDatabase;

    private UserGrowpath $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([PPSeeder::class, ItemSeeder::class, GoldShopSeeder::class]);
        $this->travelTo(now()->parse('2026-10-05 09:00')); // Senin
        $this->user = UserGrowpath::create(['username' => 'tester', 'password' => 'rahasia123']);
        $this->actingAs($this->user);
    }

    private function habit(string $type, array $extra = []): UserHabit
    {
        $payload = ['nama_habit' => "Habit $type", 'frekuensi' => $type] + $extra + match ($type) {
            'daily'   => ['jam_daily' => '07:00'],
            'weekly'  => ['jam_weekly' => '07:00', 'hari_weekly' => 'Senin'],
            'monthly' => ['monthly_mode' => 'tanggal', 'tanggal_monthly' => 5, 'jam_monthly_tanggal' => '07:00'],
            'custom'  => ['interval_custom' => 3, 'jam_custom' => '07:00'],
        };
        $this->post('/habit', $payload)->assertSessionHasNoErrors();

        return UserHabit::latest('id')->first();
    }

    private function xp(): int
    {
        return $this->user->fresh()->total_xp;
    }

    public function test_registration_gives_default_items_and_plant(): void
    {
        $this->assertCount(3, $this->user->inventories);
        $this->assertStringContainsString('buah-apel/Level%201.svg', $this->user->fresh()->plant_url);
    }

    public function test_habit_check_respects_its_period(): void
    {
        $daily = $this->habit('daily');
        $weekly = $this->habit('weekly');
        $custom = $this->habit('custom'); // tiap 3 hari

        foreach ([$daily, $weekly, $custom] as $h) {
            $this->post("/habit/{$h->id}/check");
        }
        $this->assertSame(10 + 30 + 15, $this->xp());

        // Klik ulang di hari yang sama: tidak ada XP tambahan
        $this->post("/habit/{$daily->id}/check");
        $this->assertSame(55, $this->xp());

        // Selasa: harian boleh lagi, mingguan & kustom belum
        $this->travel(1)->days();
        foreach ([$daily, $weekly, $custom] as $h) {
            $this->post("/habit/{$h->id}/check");
        }
        $this->assertSame(65, $this->xp());

        // Kamis (3 hari kemudian): kustom boleh lagi, mingguan tetap belum
        $this->travel(2)->days();
        $this->post("/habit/{$custom->id}/check");
        $this->post("/habit/{$weekly->id}/check");
        $this->assertSame(80, $this->xp());

        // Senin depan: mingguan boleh lagi
        $this->travel(4)->days();
        $this->post("/habit/{$weekly->id}/check");
        $this->assertSame(110, $this->xp());
    }

    public function test_done_habits_are_hidden_on_home(): void
    {
        $weekly = $this->habit('weekly');
        $this->get('/home')->assertSee('Habit weekly');

        $this->post("/habit/{$weekly->id}/check");
        $this->get('/home')->assertDontSee('Habit weekly');

        $this->travel(7)->days();
        $this->get('/home')->assertSee('Habit weekly');
    }

    public function test_invalid_habit_leaves_no_orphan_rows(): void
    {
        $this->post('/habit', ['nama_habit' => 'X', 'frekuensi' => 'weekly', 'jam_weekly' => '07:00'])
            ->assertSessionHasErrors('hari_weekly');

        $this->assertSame(0, UserHabit::count());
    }

    public function test_task_gives_xp_once(): void
    {
        $this->post('/task', ['nama_tugas' => 'Laporan', 'tgl_deadline' => '2026-10-06', 'waktu_deadline' => '10:00'])
            ->assertSessionHasNoErrors();
        $task = $this->user->tasks()->first();

        $this->post("/task/{$task->id}/check");
        $this->post("/task/{$task->id}/check");

        $this->assertSame(20, $this->xp());
    }

    public function test_level_up_grows_plant_and_flashes_watering_animation(): void
    {
        $this->user->update(['total_xp' => 95]);
        $daily = $this->habit('daily');

        $this->post("/habit/{$daily->id}/check")->assertSessionHas('siram', fn ($s) => $s['xp'] === 10 && $s['stage'] === 2
            && str_contains($s['from'], 'Level%201.svg'));

        $this->assertSame(2, $this->user->equippedOf('tanaman')->fresh()->level);
    }

    public function test_harvest_only_at_stage_ten_and_pays_once(): void
    {
        $plant = $this->user->equippedOf('tanaman');

        $this->postJson('/harvest')->assertStatus(400);

        $plant->update(['level' => 10]);
        $this->postJson('/harvest')->assertOk();
        $this->postJson('/harvest')->assertStatus(400);

        $this->assertSame(500, $this->user->fresh()->total_gold);
        $this->assertSame(1, $plant->fresh()->level);
    }

    public function test_buying_items_checks_gold(): void
    {
        $item = ItemShop::where('name', 'Hana')->first();

        $this->postJson('/shop/buy', ['item_id' => $item->id])->assertStatus(400);

        $this->user->update(['total_gold' => 1500]);
        $this->postJson('/shop/buy', ['item_id' => $item->id])->assertOk()->assertJson(['new_gold' => 500]);
        $this->postJson('/shop/buy', ['item_id' => $item->id])->assertStatus(400);
    }

    public function test_gold_topup_is_disabled_without_midtrans_keys(): void
    {
        $this->postJson('/shop/buy-gold', ['package_id' => GoldShop::first()->id])->assertStatus(503);
        $this->assertSame(0, $this->user->fresh()->total_gold);
    }

    public function test_gold_topup_credits_once_after_payment(): void
    {
        config(['services.midtrans.server_key' => 'SB-Mid-server-test', 'services.midtrans.client_key' => 'SB-Mid-client-test']);
        $package = GoldShop::where('name', 'Kantong Kecil')->first();

        Http::fake([
            '*/snap/v1/transactions' => Http::response(['token' => 'snap-token-123']),
            '*/v2/*/status'          => Http::response(['transaction_status' => 'settlement', 'status_code' => '200']),
        ]);

        $order = $this->postJson('/shop/buy-gold', ['package_id' => $package->id])
            ->assertOk()->assertJson(['snap_token' => 'snap-token-123'])->json('order_id');

        $this->assertSame(0, $this->user->fresh()->total_gold);

        $this->postJson("/shop/buy-gold/{$order}/check")->assertJson(['status' => 'success', 'new_gold' => 100]);
        $this->postJson("/shop/buy-gold/{$order}/check")->assertJson(['status' => 'success', 'new_gold' => 100]);

        $this->assertSame(100, $this->user->fresh()->total_gold);
        $this->assertSame($package->xp, $this->xp());
    }

    public function test_midtrans_webhook_requires_valid_signature(): void
    {
        config(['services.midtrans.server_key' => 'SB-Mid-server-test']);
        $purchase = GoldPurchase::create([
            'user_id' => $this->user->id, 'package_id' => GoldShop::first()->id,
            'order_id' => 'GP-TEST-1', 'status' => 'pending', 'date' => now(),
        ]);
        $body = ['order_id' => 'GP-TEST-1', 'status_code' => '200', 'gross_amount' => '5000.00', 'transaction_status' => 'settlement'];

        $this->postJson('/midtrans/notification', $body + ['signature_key' => 'palsu'])->assertStatus(403);
        $this->assertSame('pending', $purchase->fresh()->status);

        $signature = hash('sha512', 'GP-TEST-1' . '200' . '5000.00' . 'SB-Mid-server-test');
        $this->postJson('/midtrans/notification', $body + ['signature_key' => $signature])->assertOk();

        $this->assertSame('success', $purchase->fresh()->status);
        $this->assertSame(100, $this->user->fresh()->total_gold);
    }

    public function test_all_pages_render(): void
    {
        $this->habit('monthly');
        $this->post('/task', ['nama_tugas' => 'Tugas besok', 'tgl_deadline' => '2026-10-06', 'waktu_deadline' => '10:00']);

        foreach (['/home', '/shop', '/inventory', '/leaderboard', '/profile'] as $page) {
            $this->get($page)->assertOk();
        }

        $this->get('/home')->assertSee('Tugas besok')->assertSee('2026-10-06'); // tanggal tidak bergeser zona waktu
    }

    public function test_every_seeded_item_image_exists(): void
    {
        foreach (ItemShop::all() as $item) {
            $this->assertFileExists(public_path($item->image), $item->name);

            if ($item->type === 'tanaman') {
                foreach (range(1, 10) as $level) {
                    $this->assertFileExists(public_path('images/Tanaman/' . \Illuminate\Support\Str::slug($item->name) . "/Level $level.svg"), "$item->name stage $level");
                }
            }
        }
    }
}
