<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * переподключить страницу в app\Providers\RouteServiceProvider.php
 */


Route::group(['namespace' => 'Main'], function() {
    Route::get('/', 'IndexController')->name('main.index'); // без указания метода контроллера т.к. он однометодный
});
Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function() {
    Route::get('/', 'IndexController')->name('post.index');
    Route::get('/{post}', 'ShowController')->name('post.show');

    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function() {                   // вложенный маршрут Nested Route
        Route::post('/', 'StoreController')->name('post.comment.store');
    });

    /*Route::prefix('{post}/likes')->group(function() {     // вложенный маршрут Nested Route
        Route::post('/', [ShowController::class, 'show'])->name('post.like.store');
    }); */
   
}); 

/* Route::prefix('category')->group( function () {
    Route::prefix('posts')->group(function() {
        //Route::get('/', [IndexController::class, 'index'])->name('category.index');

        Route::prefix('{category}/posts')->group(function() {                                         // вложенный маршрут Nested Route
                Route::get('/', [CatecoryIndexController::class, 'index'])->name('category.post.index');
        });
    });
}); */

Auth::routes();

