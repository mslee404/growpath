<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
       return view('auth.login');
   })->name('login');
   
Route::get('/loginafter', function () {
       return view('auth.loginafter');
   })->name('loginafter');

   Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Request $request) {
    // opsional: nanti bisa ditambah validasi/simpan ke database
    return redirect()->route('loginafter');
})->name('register.post');

Route::get('/shop', function () {
    return view('shop');
});
