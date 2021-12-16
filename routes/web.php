<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);
