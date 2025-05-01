<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[TopicController::class,'index'])->name('topics.index');
Route::get('/topics/create',[TopicController::class,'create'])->name('topics.create');
Route::post('/topic',[TopicController::class,'store'])->name('topics.store');
Route::get('/topic/{id}',[TopicController::class,'show'])->name('topics.show');
Route::post('/topic/{id}/comment',[CommentController::class,'store'])->name('commments.store');
Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
