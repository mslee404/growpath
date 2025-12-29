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
    Route::get('/inventory', [App\Http\Controllers\InventoryController::class, 'index'])->name('inventory');
Route::post('/inventory/equip', [App\Http\Controllers\InventoryController::class, 'equip'])->name('inventory.equip');
    Route::post('/harvest', [App\Http\Controllers\InventoryController::class, 'harvest'])->name('harvest');
    Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop');
    Route::post('/shop/buy', [App\Http\Controllers\ShopController::class, 'buy'])->name('shop.buy');
    Route::post('/shop/buy-gold', [App\Http\Controllers\ShopController::class, 'buyGold'])->name('shop.buyGold');
    Route::get('/profile', fn() => view('profile'));
    Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::get('/leaderboard', [App\Http\Controllers\LeaderboardController::class, 'index'])->name('leaderboard');

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