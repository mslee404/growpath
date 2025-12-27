<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'display_name' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->display_name = $request->display_name;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
