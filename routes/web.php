<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HabitController;
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
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/inventory', fn() => view('inventory'));
    Route::get('/shop', fn() => view('shop'));
    Route::get('/profile', fn() => view('profile'));
    Route::get('/leaderboard', fn() => view('leaderboard'));
    Route::get('/leaderboard', fn() => view('leaderboard'));

    Route::post('/habit', [HabitController::class, 'store'])->name('habit.store');
    Route::post('/habit/{id}/check', [HabitController::class, 'check'])->name('habit.check');
    Route::delete('/habit/{id}', [HabitController::class, 'destroy'])->name('habit.destroy');
    Route::put('/habit/{id}', [HabitController::class, 'update'])->name('habit.update');

    Route::post('/task', [App\Http\Controllers\TaskController::class, 'store'])->name('task.store');
    Route::post('/task/{id}/check', [App\Http\Controllers\TaskController::class, 'check'])->name('task.check');
    Route::delete('/task/{id}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('task.destroy');
    Route::put('/task/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('task.update');
});

Route::get('/', fn() => view('welcome'));