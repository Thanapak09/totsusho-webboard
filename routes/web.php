<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

Route::get('/', [TopicController::class, 'index'])->name('topics.index');

// Dashboard (Requires authentication + verified)
Route::get('/dashboard', fn() => redirect()->route('topics.index'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    
    // Topic Routes
    Route::prefix('topics')->name('topics.')->group(function () {
        Route::get('/', [TopicController::class, 'index'])->name('index');
        Route::get('/create', [TopicController::class, 'create'])->name('create');
        Route::post('/', [TopicController::class, 'store'])->name('store');
        Route::get('/{id}', [TopicController::class, 'show'])->name('show');
    });

    // Comment Routes
    Route::prefix('comments')->name('comments.')->group(function () {
        Route::post('/{topic}', [CommentController::class, 'store'])->name('store');
        Route::delete('/{comment}', [CommentController::class, 'destroy'])->name('destroy');
    });

    // Profile Routes
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__ . '/auth.php';
