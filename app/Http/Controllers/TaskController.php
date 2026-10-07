<?php

namespace App\Http\Controllers;

use App\Models\TaskUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        Auth::user()->tasks()->create($this->validated($request));

        return back()->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        Auth::user()->tasks()->findOrFail($id)->update($this->validated($request));

        return back()->with('success', 'Tugas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Auth::user()->tasks()->findOrFail($id)->delete();

        return back()->with('success', 'Tugas berhasil dihapus!');
    }

    public function check($id)
    {
        // Update bersyarat = atomik, jadi klik ganda tidak memberi XP dua kali
        $updated = Auth::user()->tasks()
            ->whereKey($id)
            ->where('is_completed', false)
            ->update(['is_completed' => true, 'completed_at' => now()]);

        if ($updated) {
            $this->flashSiram(TaskUser::XP, Auth::user()->addXp(TaskUser::XP));
        }

        return back();
    }

    private function validated(Request $request): array
    {
        $request->validate([
            'nama_tugas'     => 'required|string|max:100',
            'detail_tugas'   => 'nullable|string|max:1000',
            'tgl_deadline'   => 'required|date',
            'waktu_deadline' => 'required|date_format:H:i,H:i:s',
        ]);

        return [
            'task_name'        => $request->nama_tugas,
            'task_description' => $request->detail_tugas,
            'due_date'         => $request->tgl_deadline,
            'due_time'         => $request->waktu_deadline,
        ];
    }
}
