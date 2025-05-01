<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[TopicController::class,'index'])->name('topics.index');
Route::get('/topics/create',[TopicController::class,'create'])->name('topics.create');
Route::post('/topic',[TopicController::class,'store'])->name('topics.store');
Route::get('/topic/{id}',[TopicController::class,'show'])->name('topics.show');
Route::post('/topic/{id}/comment',[CommentController::class,'store'])->name('commments.store');