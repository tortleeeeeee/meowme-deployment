<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MeowController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MeowController::class, 'index']);

Route::get('/meows', [MeowController::class, 'index'])
->middleware(['auth', 'verified'])->name('meows');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//MEOWS
Route::middleware('auth')->group(function (){
    Route::post('/meows', [MeowController::class, 'store']);
    Route::get('/meows/{meow}/edit', [MeowController::class, 'edit']);
    Route::put('/meows/{meow}', [MeowController::class, 'update']);
    Route::delete('/meows/{meow}', [MeowController::class, 'destroy']);
});


