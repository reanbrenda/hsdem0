<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/posts', [\App\Http\Controllers\Api\PostController::class, 'index']);
Route::post('/posts', [\App\Http\Controllers\Api\PostController::class, 'store']);
Route::get('/posts/{post}', [\App\Http\Controllers\Api\PostController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::middleware('abilities:users.index')->get('/users', [\App\Http\Controllers\Api\UserController::class, 'index']);
    Route::get('/users/{user}', [\App\Http\Controllers\Api\UserController::class, 'show']);
});

