<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::group(['prefix' => 'message'], function () {
        Route::get('/', [MessageController::class, 'index'])->name('message.index');
        Route::get('/create', [MessageController::class, 'create'])->name('message.create');
        Route::get('/markSeen', [MessageController::class, 'markSeen'])->name('message.markSeen');
        Route::post('/store', [MessageController::class, 'store'])->name('message.store');
    });
});

require __DIR__.'/auth.php';
