<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserGrowpath;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegisterForm() { return view('auth.register'); }

    public function register(Request $request)
    {
        $request->validate([
            'username'      => 'required|string|max:255|unique:user_growpaths,username',
            'password'      => 'required|string|min:6|confirmed',
            'display_name'  => 'nullable|string|max:255',
        ]);

        $user = UserGrowpath::create([
            'username'      => $request->username,
            'password'      => $request->password, 
            'display_name' => $request->display_name ?? $request->username,
        ]);

        Auth::login($user);

        return redirect()->route('loginafter');
    }
}
