<?php

use App\Http\Controllers\AnimeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AnimeController::class, 'index'])->name('beranda');

Route::get('/genre', [AnimeController::class, 'genre'])->name('genre');

Route::get('/tentang', function () {
    return view('pages.tentang');
})->name('tentang');

Route::get('/kontak', function () {
    return view('pages.kontak');
})->name('kontak');

Route::get('/login', function () {
    return view('pages.login');
})->name('login');
