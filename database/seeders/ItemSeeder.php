<?php

namespace Database\Seeders;

use App\Models\ItemShop;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    // Harga per tier (gold). Panen = 500 gold.
    const BIASA = 1000;
    const LANGKA = 2500;
    const EPIK = 5000;
    const LEGENDARIS = 7500;

    public function run(): void
    {
        // [nama, deskripsi, gambar, harga]
        $items = [
            'avatar' => [
                ['Kakek Petani', 'Merawat tanaman seperti cucu sendiri', 'images/1-pakde.svg', 0],
                ['Bude', 'Merawat tanaman seperti cucu sendiri', 'images/4-mbokde.svg', 0],
                ['Dewa Petir', 'Avatar spesial Dewa Petir (Zenitsu)', 'images/2-senitsu.svg', 7500],
                ['My Istri', 'Bukankah ini (Waguri-chan)', 'images/5-myistri.svg', 7500],
                ['Rahmat', 'Rahmat si jagoan neon', 'images/3-rahmat.svg', 7500],
                ['Gwejh', 'Detektif', 'images/6-gweh.svg', 7500],
                ['Anya', 'Spy mission waku waku', 'images/7-anya.svg', 7500],
                ['Super Idol', 'Won Forever Young', 'images/8-wony.svg', 7500],

                ['Tunas', 'Tunas kecil di kepala, semangat besar di hati', 'images/avatar/tunas.svg', self::BIASA],
                ['Hana', 'Ceria dari pagi sampai panen', 'images/avatar/hana.svg', self::BIASA],
                ['Ren', 'Kalem, tapi habit-nya nggak pernah bolong', 'images/avatar/ren.svg', self::BIASA],
                ['Aki', 'Semangatnya membara seperti daun musim gugur', 'images/avatar/aki.svg', self::BIASA],
                ['Sora', 'Rajin belajar, rajin menyiram', 'images/avatar/sora.svg', self::BIASA],
                ['Mei', 'Kedip sekali, tanaman langsung tumbuh', 'images/avatar/mei.svg', self::BIASA],
                ['Taiyo', 'Cerah seperti matahari musim panas', 'images/avatar/taiyo.svg', self::BIASA],
                ['Haru', 'Membawa harum bunga musim semi', 'images/avatar/haru.svg', self::LANGKA],
                ['Yuki', 'Tenang seperti salju pertama', 'images/avatar/yuki.svg', self::LANGKA],
                ['Kaito', 'Senpai misterius penjaga kebun malam', 'images/avatar/kaito.svg', self::LANGKA],
                ['Miko Kebun', 'Menyapu daun gugur sambil berdoa panen melimpah', 'images/avatar/miko-kebun.svg', self::LANGKA],
                ['Ninja Bambu', 'Menyiram tanpa suara, tumbuh tanpa jeda', 'images/avatar/ninja-bambu.svg', self::LANGKA],
                ['Penyihir Tanaman', 'Satu mantra, seribu tunas', 'images/avatar/penyihir-tanaman.svg', self::LANGKA],
                ['Neko', 'Nyaa~ jangan lupa centang habit-mu', 'images/avatar/neko.svg', self::EPIK],
                ['Kitsune', 'Roh rubah yang menjaga ladang', 'images/avatar/kitsune.svg', self::EPIK],
                ['Elf Hutan', 'Bisa bicara dengan pepohonan', 'images/avatar/elf-hutan.svg', self::EPIK],
                ['Idol Bunga', 'Konser pertamanya di tengah kebun bunga', 'images/avatar/idol-bunga.svg', self::EPIK],
                ['Roh Pohon', 'Lahir dari daun pertama pohon tertua', 'images/avatar/roh-pohon.svg', self::EPIK],
                ['Ksatria Matahari', 'Legenda: pelindung semua kebun', 'images/avatar/ksatria-matahari.svg', self::LEGENDARIS],
                ['Putri Bulan', 'Legenda: penjaga mimpi para petani', 'images/avatar/putri-bulan.svg', self::LEGENDARIS],
            ],

            'avatar_frame' => [
                ['Apple Frame', 'Frame apel apel emas', 'images/Apple.svg', 7500],
                ['Sea Frame', 'Frame laut ubur ubur kerang cute kawaii', 'images/Laut.svg', 7500],
                ['Night Sky Frame', 'Terdengar burung hantu suaranya merdu', 'images/Malam.svg', 7500],

                ['Sakura Mekar', 'Musim semi: kelopak sakura berguguran', 'images/bingkai/sakura-mekar.svg', self::BIASA],
                ['Gerimis Semi', 'Musim semi: gerimis yang menyegarkan', 'images/bingkai/gerimis-semi.svg', self::BIASA],
                ['Padang Bunga', 'Musim semi: hamparan bunga warna-warni', 'images/bingkai/padang-bunga.svg', self::LANGKA],
                ['Matahari Mekar', 'Musim panas: bunga matahari menyapa', 'images/bingkai/bunga-matahari.svg', self::BIASA],
                ['Pantai Tropis', 'Musim panas: pasir, ombak, dan nyiur', 'images/bingkai/pantai-tropis.svg', self::BIASA],
                ['Festival Kembang Api', 'Musim panas: malam festival penuh warna', 'images/bingkai/festival-kembang-api.svg', self::EPIK],
                ['Daun Maple', 'Musim gugur: merah, oranye, emas', 'images/bingkai/daun-maple.svg', self::BIASA],
                ['Hutan Jamur', 'Musim gugur: jamur-jamur mungil bermunculan', 'images/bingkai/hutan-jamur.svg', self::LANGKA],
                ['Panen Labu', 'Musim gugur: waktunya panen raya', 'images/bingkai/panen-labu.svg', self::LANGKA],
                ['Salju Turun', 'Musim dingin: butiran salju pertama', 'images/bingkai/salju-turun.svg', self::BIASA],
                ['Cemara Salju', 'Musim dingin: hangatnya pondok di hutan cemara', 'images/bingkai/cemara-salju.svg', self::LANGKA],
                ['Aurora', 'Legenda: tirai cahaya di langit kutub', 'images/bingkai/aurora.svg', self::LEGENDARIS],
                ['Hutan Hujan', 'Terrain: rimbun dan penuh kehidupan', 'images/bingkai/hutan-hujan.svg', self::BIASA],
                ['Hutan Bambu', 'Terrain: angin berbisik di antara bambu', 'images/bingkai/hutan-bambu.svg', self::BIASA],
                ['Gurun Oasis', 'Terrain: kesegaran di tengah gurun', 'images/bingkai/gurun-oasis.svg', self::LANGKA],
                ['Terumbu Karang', 'Terrain: taman warna-warni di bawah laut', 'images/bingkai/terumbu-karang.svg', self::LANGKA],
                ['Sawah Terasering', 'Terrain: hijau berundak di kaki bukit', 'images/bingkai/sawah-terasering.svg', self::LANGKA],
                ['Gunung Berapi', 'Terrain: panas membara, jangan terlalu dekat', 'images/bingkai/gunung-berapi.svg', self::EPIK],
                ['Gua Kristal', 'Terrain: kristal yang berpendar dalam gelap', 'images/bingkai/gua-kristal.svg', self::EPIK],
                ['Pulau Melayang', 'Legenda: daratan di atas awan', 'images/bingkai/pulau-melayang.svg', self::LEGENDARIS],
            ],

            'tanaman' => [
                ['Buah Apel', 'Apakah ini gravitasi?', 'images/Plant-Apple.svg', 0],
                ['Buah Naga', 'Buah naga merah yang segar dan manis (kayanya)', 'images/Plant-Dragon-fruit.svg', 10000],
                ['Buah Jeruk', 'Jeruk makan jeruk', 'images/Plant-Orange.svg', 10000],
                ['Buah Pepaya', 'Pepaya California yang dirawat seperti anak sendiri', 'images/Plant-Papaya.svg', 10000],
                ['Terong', 'Ayam penyet dan terong goreng', 'images/Plant-Eggplant.svg', 10000],

                ['Sakura', 'Mekar merah muda di puncak musim semi', 'images/Plant-Sakura.svg', 10000],
                ['Bunga Matahari', 'Selalu menghadap ke arah semangatmu', 'images/Plant-Bunga-Matahari.svg', 10000],
                ['Maple', 'Daunnya berubah merah saat kamu konsisten', 'images/Plant-Maple.svg', 12000],
                ['Cemara', 'Tetap hijau, bahkan di musim dingin', 'images/Plant-Cemara.svg', 12000],
                ['Pohon Roh', 'Legenda: pohon yang bercahaya di malam hari', 'images/Plant-Pohon-Roh.svg', 20000],
            ],
        ];

        // updateOrCreate: aman dijalankan berulang (tidak membuat item dobel)
        foreach ($items as $type => $rows) {
            foreach ($rows as [$name, $desc, $image, $price]) {
                ItemShop::updateOrCreate(
                    ['name' => $name, 'type' => $type],
                    ['desc' => $desc, 'image' => $image, 'price' => $price],
                );
            }
        }
    }
}
