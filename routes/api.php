<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\GalleryController;
use App\Http\Controllers\API\ImageController;
use App\Http\Controllers\API\PostController;


Route::get('categories', [CategoryController::class, 'index']); // Tidak perlu login
Route::get('categories/{id}', [CategoryController::class, 'show']); // Tidak perlu login
Route::get('posts', [PostController::class, 'index']); // Tidak perlu login
Route::get('posts/{id}', [PostController::class, 'show']); // Tidak perlu login
Route::apiResource('galleries', GalleryController::class);
Route::apiResource('images', ImageController::class);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('categories', [CategoryController::class, 'store']);
    Route::put('categories/{id}', [CategoryController::class, 'update']);
    Route::delete('categories/{id}', [CategoryController::class, 'destroy']);
    Route::post('posts', [PostController::class, 'store']);
    Route::put('posts/{id}', [PostController::class, 'update']);
    Route::delete('posts/{id}', [PostController::class, 'destroy']);
    Route::post('logout', [AuthenticationController::class, 'logout']);

});

 // Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum'); 
Route::post('register', [AuthenticationController::class, 'register']);
Route::post('login', [AuthenticationController::class, 'login']);