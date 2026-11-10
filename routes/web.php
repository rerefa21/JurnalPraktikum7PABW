<?php

use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('laporans.index');
});

Route::get('/laporans/create', [LaporanController::class, 'create'])->name('laporans.create');
Route::post('/laporans', [LaporanController::class, 'store'])->name('laporans.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('laporans.index');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('laporans', LaporanController::class)->except(['create', 'store']);
});

require __DIR__.'/auth.php';