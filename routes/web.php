<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BandulController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
| Rute yang dapat diakses tanpa perlu autentikasi.
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/reviews', [KomentarController::class, 'index'])->name('reviews.index');
Route::post('/reviews', [KomentarController::class, 'store'])->middleware('auth')->name('reviews.store');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
|
| Rute yang hanya dapat diakses oleh pengguna yang telah login.
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');

    Route::resource('user-management', UserController::class);
    Route::resource('bandul-management', BandulController::class);
    Route::resource('review-management', ReviewController::class);

    Route::patch('review-management/{id}/approve', [ReviewController::class, 'approve'])->name('review-management.approve');
    Route::patch('review-management/{id}/reject', [ReviewController::class, 'reject'])->name('review-management.reject');

    Route::get('/forum-chat', [ChatController::class, 'index'])->name('forum-chat.index');
    Route::post('/forum-chat/send', [ChatController::class, 'sendMessage'])->name('forum-chat.send');
});

require __DIR__ . '/auth.php';
