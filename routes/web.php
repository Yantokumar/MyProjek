<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// --- HALAMAN USER ---
Route::get('/', [AnimeController::class, 'index'])->name('beranda');
Route::get('/genre', [AnimeController::class, 'genre'])->name('genre');

Route::get('/tentang', function () {
    return view('pages.tentang'); // Sesuaikan jika filenya di folder views langsung
})->name('tentang');

Route::get('/login', function () {
    return view('pages.login');
})->name('login');

// --- HALAMAN ADMIN (GRUP) ---
// Hapus Route::get('/admin') yang lama, ganti dengan grup ini:
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/anime', [AdminController::class, 'anime'])->name('admin.anime');
    Route::get('/feedback', [AdminController::class, 'feedback'])->name('admin.feedback');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
});

// --- HALAMAN DETAIL ANIME ---
Route::get('/anime/{id}', [AnimeController::class, 'show'])->name('anime.detail');

// --- HALAMAN FAVORIT ---
Route::middleware(['auth'])->group(function () {
    Route::get('/favorit', [AnimeController::class, 'favorites'])->name('favorit');
    Route::post('/add-favorite', [AnimeController::class, 'addFavorite']);
    Route::delete('/favorit/{id}', [AnimeController::class, 'destroyFavorite'])->name('favorit.destroy');
});

// Route Login & Register
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route masukan user
Route::post('/feedback', [AdminController::class, 'storeFeedback'])->name('feedback.store');
