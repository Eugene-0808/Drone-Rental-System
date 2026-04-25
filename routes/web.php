<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PurchaseHistoryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Contact page
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Authentication routes (custom controllers)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Static pages (if you have the views ready)
Route::view('/tos', 'tos')->name('tos');
Route::view('/privacy', 'privacy')->name('privacy');

// Routes that require authentication
Route::middleware('auth')->group(function () {
   
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

    Route::get('/purchase-history', [PurchaseHistoryController::class, 'index'])->name('purchase.history');
});