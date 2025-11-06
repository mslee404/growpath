<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
       return view('auth.login');
   })->name('login');
   
   Route::post('/login', [AuthController::class, 'login']);

Route::get('/inventory', function () {
    return view('inventory'); 
});

Route::get('/shop', function () {
    return view('shop'); 
});