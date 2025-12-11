<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/loginafter', fn() => view('auth.loginafter'))->name('loginafter');
    Route::get('/home', fn() => view('home'))->name('home');
    Route::get('/inventory', fn() => view('inventory'));
    Route::get('/shop', fn() => view('shop'));
    Route::get('/profile', fn() => view('profile'));
    Route::get('/leaderboard', fn() => view('leaderboard'));
});

Route::get('/', fn() => view('welcome'));