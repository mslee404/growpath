<?php

namespace App\Http\Controllers;

use App\Models\UserHabit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HabitController extends Controller
{
    private const DAYS = 'in:senin,selasa,rabu,kamis,jumat,sabtu,minggu';
    private const TIME = 'required|date_format:H:i,H:i:s';

    public function store(Request $request)
    {
        $request->validate(['frekuensi' => 'required|in:daily,weekly,monthly,custom']);
        $type = $request->frekuensi;
        $this->validateHabit($request, $type);

        // Induk + detail harus tersimpan bersama, atau tidak sama sekali
        DB::transaction(function () use ($request, $type) {
            $habit = Auth::user()->habits()->create(['habit_type' => $type]);
            $habit->{"{$type}Habit"}()->create($this->detailData($request, $type));
        });

        return back()->with('success', 'Habit berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $habit = $this->findHabit($id);
        $this->validateHabit($request, $habit->habit_type);

        $habit->detail()?->update($this->detailData($request, $habit->habit_type));

        return back()->with('success', 'Habit diperbarui!');
    }

    public function destroy($id)
    {
        $this->findHabit($id)->delete();

        return back()->with('success', 'Habit berhasil dihapus!');
    }

    public function check($id)
    {
        $habit = $this->findHabit($id)->load('customHabit');

        if ($habit->isDoneThisPeriod($habit->records()->max('completion_date'))) {
            return back()->with('success', 'Habit ini sudah selesai untuk periode ini.');
        }

        $xp = $habit->xp();
        // createOrFirst aman dari klik ganda (unique user_habit_id + completion_date)
        $record = $habit->records()->createOrFirst(
            ['completion_date' => today()->toDateString()],
            ['xp_earned' => $xp],
        );

        if ($record?->wasRecentlyCreated) {
            $this->flashSiram($xp, Auth::user()->addXp($xp));
        }

        return back();
    }

    private function findHabit($id): UserHabit
    {
        return Auth::user()->habits()->findOrFail($id);
    }

    private function validateHabit(Request $request, string $type): void
    {
        // Dropdown hari mengirim "Senin", database menyimpan "senin"
        foreach (['hari_weekly', 'hari_monthly'] as $field) {
            if ($request->filled($field)) {
                $request->merge([$field => strtolower($request->input($field))]);
            }
        }

        $byType = match ($type) {
            'daily'   => ['jam_daily' => self::TIME],
            'weekly'  => ['jam_weekly' => self::TIME, 'hari_weekly' => 'required|' . self::DAYS],
            'monthly' => ['monthly_mode' => 'required|in:tanggal,minggu'] + ($request->monthly_mode === 'minggu'
                ? ['hari_monthly' => 'required|' . self::DAYS, 'minggu_ke' => 'required|integer|between:1,5', 'jam_monthly_minggu' => self::TIME]
                : ['tanggal_monthly' => 'required|integer|between:1,31', 'jam_monthly_tanggal' => self::TIME]),
            'custom'  => ['interval_custom' => 'required|integer|between:1,365', 'jam_custom' => self::TIME],
        };

        $request->validate([
            'nama_habit'   => 'required|string|max:100',
            'detail_habit' => 'nullable|string|max:255',
        ] + $byType);
    }

    private function detailData(Request $r, string $type): array
    {
        return [
            'habit_name'        => $r->nama_habit,
            'habit_description' => $r->detail_habit,
        ] + match ($type) {
            'daily'   => ['hour' => $r->jam_daily],
            'weekly'  => ['hour' => $r->jam_weekly, 'day' => $r->hari_weekly],
            'monthly' => $r->monthly_mode === 'minggu'
                ? ['schedule_type' => 'week', 'day' => $r->hari_monthly, 'week' => $r->minggu_ke, 'date' => null, 'hour' => $r->jam_monthly_minggu]
                : ['schedule_type' => 'date', 'date' => $r->tanggal_monthly, 'day' => null, 'week' => null, 'hour' => $r->jam_monthly_tanggal],
            'custom'  => ['hour' => $r->jam_custom, 'day_count' => $r->interval_custom],
        };
    }
}
