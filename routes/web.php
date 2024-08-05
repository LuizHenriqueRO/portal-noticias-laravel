<?php

use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NoticiasController::class, 'home'])->name('home');
Route::resource('noticias', NoticiasController::class);

Route::get('/dashboard', [NoticiasController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/noticias/{noticia}', [NoticiasController::class, 'show'])->name('noticias.show');
Route::put('/noticias/{noticia}', [NoticiasController::class, 'update'])->name('noticias.update');

Route::get('/search', [NoticiasController::class, 'search'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';