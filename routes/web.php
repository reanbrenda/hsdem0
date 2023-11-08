<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'welcome'])->name('welcome');

Route::get('posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
