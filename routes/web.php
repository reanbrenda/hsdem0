<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'welcome'])->name('welcome');

Route::get('posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('posts/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('users/{id}', [\App\Http\Controllers\UserController::class, 'show'])->name('users.show');

Route::get('categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/{id}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');
