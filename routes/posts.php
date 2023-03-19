<?php

use App\Http\Controllers\Post\CommentController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\LikedController;
use App\Http\Controllers\Post\ShowController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * подключить страницу в app\Providers\RouteServiceProvider.php
 */

Route::prefix('posts')->group(function() {
    Route::get('/', [CommentController::class, 'store'])->name('post.index');
    Route::get('/{post}', [LikedController::class, 'store'])->name('post.show');

    Route::prefix('{post}/comments')->group(function() {  // вложенный маршрут Nested Route
        Route::post('/', [IndexController::class, 'index'])->name('post.comment.store');
    });

    Route::prefix('{post}/likes')->group(function() {     // вложенный маршрут Nested Route
        Route::post('/', [ShowController::class, 'show'])->name('post.like.store');
    });
   
}); 



Auth::routes();