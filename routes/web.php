<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
       return view('auth.login');
   })->name('login');

Route::get('/register', function () {
       return view('auth.register');
   })->name('register');
   
Route::get('/loginafter', function () {
       return view('auth.loginafter');
   })->name('loginafter');


Route::get('/inventory', function () {
    return view('inventory'); 
});

Route::get('/register', function () {
       return view('auth.register');
   })->name('register');

Route::post('/register', function (Request $request) {
    // opsional: nanti bisa ditambah validasi/simpan ke database
    return redirect()->route('auth.loginafter');
})->name('register.post');

Route::get('/home', function () {
    return view('home');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/leaderboard', function () {
    return view('leaderboard');
});

Route::get('/shopnew', function () {
    return view('shopnew');
});