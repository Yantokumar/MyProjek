<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// --- HALAMAN PUBLIK / USER ---
Route::get('/', [AnimeController::class, 'index'])->name('beranda');
Route::get('/genre', [AnimeController::class, 'genre'])->name('genre');
Route::get('/tentang', function () {
    return view('pages.tentang');
})->name('tentang');
Route::get('/anime/{id}', [AnimeController::class, 'show'])->name('anime.detail');

// Route masukan user
Route::post('/feedback', [AdminController::class, 'storeFeedback'])->name('feedback.store');

// --- AUTHENTICATION (GUEST ONLY UNTUK LOGIN & REGISTER) ---
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// --- HALAMAN USER LOGIN (FAVORIT) ---
Route::middleware(['auth'])->group(function () {
    Route::get('/favorit', [AnimeController::class, 'favorites'])->name('favorit');
    Route::post('/add-favorite', [AnimeController::class, 'addFavorite'])->name('favorit.add');
    Route::delete('/favorit/{id}', [AnimeController::class, 'destroyFavorite'])->name('favorit.destroy');
});

// --- HALAMAN ADMIN (TERPROTEKSI AUTH & ROLE ADMIN) ---
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/anime', [AdminController::class, 'anime'])->name('admin.anime');
    Route::get('/feedback', [AdminController::class, 'feedback'])->name('admin.feedback');
    Route::delete('/feedback/{id}', [AdminController::class, 'destroyFeedback'])->name('admin.feedback.destroy');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
});
