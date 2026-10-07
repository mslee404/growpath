<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GoldTopupController;
use App\Http\Controllers\HabitController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Webhook Midtrans (tanpa login, dikecualikan dari CSRF di bootstrap/app.php)
Route::post('/midtrans/notification', [GoldTopupController::class, 'notify'])->name('midtrans.notify');

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:5,1');

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->middleware('throttle:5,1');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::view('/loginafter', 'auth.loginafter')->name('loginafter');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
    Route::post('/inventory/equip', [InventoryController::class, 'equip'])->name('inventory.equip');
    Route::post('/harvest', [InventoryController::class, 'harvest'])->name('harvest');

    Route::get('/shop', [ShopController::class, 'index'])->name('shop');
    Route::post('/shop/buy', [ShopController::class, 'buy'])->name('shop.buy');
    Route::post('/shop/buy-gold', [GoldTopupController::class, 'create'])->name('shop.buyGold');
    Route::post('/shop/buy-gold/{orderId}/check', [GoldTopupController::class, 'check'])->name('shop.buyGold.check');

    Route::view('/profile', 'profile')->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');

    Route::post('/habit', [HabitController::class, 'store'])->name('habit.store');
    Route::post('/habit/{id}/check', [HabitController::class, 'check'])->name('habit.check');
    Route::put('/habit/{id}', [HabitController::class, 'update'])->name('habit.update');
    Route::delete('/habit/{id}', [HabitController::class, 'destroy'])->name('habit.destroy');

    Route::post('/task', [TaskController::class, 'store'])->name('task.store');
    Route::post('/task/{id}/check', [TaskController::class, 'check'])->name('task.check');
    Route::put('/task/{id}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
});
