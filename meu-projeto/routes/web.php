<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\FishController;
use App\Models\Type;
use App\Models\Fish;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [FishController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('types', TypeController::class);
    Route::resource('fish', FishController::class);
});

// Route::get('/perfil', function () {
//     return view('auth.perfil');
// });

Route::get('/perfil', function () {
    return view('auth.perfil');
})->middleware(['auth', 'verified'])->name('perfil');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
