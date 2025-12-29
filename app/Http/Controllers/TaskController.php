<?php

namespace App\Http\Controllers;

use App\Models\TaskUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_tugas' => 'required|string|max:255',
            'tgl_deadline' => 'required|date',
            'waktu_deadline' => 'required',
        ]);

        TaskUser::create([
            'user_id' => Auth::id(),
            'task_name' => $request->nama_tugas,
            'task_description' => $request->detail_tugas,
            'due_date' => $request->tgl_deadline,
            'due_time' => $request->waktu_deadline,
        ]);

        return redirect()->back()->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $task = TaskUser::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'nama_tugas' => 'required|string|max:255',
            'tgl_deadline' => 'nullable|date',
            'waktu_deadline' => 'nullable',
        ]);

        $task->update([
            'task_name' => $request->nama_tugas,
            'task_description' => $request->detail_tugas,
            'due_date' => $request->tgl_deadline,
            'due_time' => $request->waktu_deadline,
        ]);

        return redirect()->back()->with('success', 'Tugas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $task = TaskUser::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $task->delete();

        return redirect()->back()->with('success', 'Tugas berhasil dihapus!');
    }

    public function check($id)
    {
        $task = TaskUser::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        if (!$task->is_completed) {
            $task->update([
                'is_completed' => true,
                'completed_at' => Carbon::now(),
            ]);

            // Tambah XP ke user
            // Asumsi 20 XP per tugas selesai (bisa disesuaikan)
            /** @var \App\Models\UserGrowpath $user */
            $user = Auth::user();
            $user->addXp(20);
        }

        return redirect()->back()->with('success', 'Tugas selesai! +20 XP');
    }
}
