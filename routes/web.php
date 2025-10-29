<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AvaliacaoController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'], function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/publicacao/{id}/curtida', [AvaliacaoController::class, 'curtida'])->name('publicacao.curtida');
Route::post('/publicacao/{id}/descurtida', [AvaliacaoController::class, 'descurtida'])->name('publicacao.descurtida');

Route::post('/like', [AvaliacaoController::class, 'like'])->name('like');
Route::post('/dislike', [AvaliacaoController::class, 'dislike'])->name('dislike');

require __DIR__.'/auth.php';