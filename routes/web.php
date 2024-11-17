<?php

use App\Http\Controllers\BandulController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
| Rute yang dapat diakses tanpa perlu autentikasi.
|
*/

// Halaman Utama dan Produk
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/productprofile', [HomeController::class, 'productprofile'])->name('productprofile');
Route::get('/notifikasi', [HomeController::class, 'notifikasi'])->name('notifikasi.index');

// Review dan Komentar
Route::get('/reviews', [KomentarController::class, 'index'])->name('reviews.index');
Route::post('/reviews', [KomentarController::class, 'store'])->name('reviews.store');

// Forum
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::post('/forum/message', [ForumController::class, 'store'])->name('forum.store');
Route::get('/forum/messages', [ForumController::class, 'fetchMessages'])->name('forum.fetch');

// Rute untuk Autentikasi (Login, Register, dll)
require __DIR__ . '/auth.php';

Route::get('auth/{view}', function ($view) {
    $path = 'auth.' . str_replace('/', '.', $view);
    if (view()->exists($path)) {
        return view($path);
    }
    abort(404);
})->where('view', '.*');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
|
| Rute yang hanya dapat diakses oleh pengguna yang telah login.
|
*/

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->middleware('verified')->name('dashboard');

    // Profil Pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Manajemen User
    Route::resource('user-management', UserController::class);

    // Manajemen Data Bandul
    Route::resource('bandul-management', BandulController::class);

    // Rute untuk menampilkan view di folder 'admin'
    Route::get('admin/{view}', function ($view) {
        $path = 'admin.' . str_replace('/', '.', $view);
        if (view()->exists($path)) {
            return view($path);
        }
        abort(404);
    })->where('view', '.*');

    // Rute untuk menampilkan view di folder 'user'
    Route::get('user/{view}', function ($view) {
        $path = 'user.' . str_replace('/', '.', $view);
        if (view()->exists($path)) {
            return view($path);
        }
        abort(404);
    })->where('view', '.*');
});
