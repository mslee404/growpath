<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserGrowpath;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:user_growpaths',
            'password' => 'required|string|min:6|confirmed',
            'diplay_name' => 'nullable|string|max:255',
        ]);

        $user = UserGrowpath::create([
            'username'     => $request->username,
            'password'     => $request->password, // akan otomatis di-hash karena setPasswordAttribute
            'diplay_name'  => $request->diplay_name,
        ]);

        Auth::guard('web')->login($user);

        return redirect()->route('loginafter');
    }
}