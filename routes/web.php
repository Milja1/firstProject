<?php

use App\Http\Controllers\Post\Comment\StoreController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * страница для однометодных контроллеров
 * переподключить страницу в app\Providers\RouteServiceProvider.php
 */


Route::group(['namespace' => 'Main'], function() {
    Route::get('/', 'IndexController')->name('main.index');
});
Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function() {
    Route::get('/', 'IndexController')->name('post.index');
    Route::get('/{post}', 'ShowController')->name('post.show');
	Route::post('{post}/comments', [ReviewController::class, 'addComment']);

 /*  Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function() { // вложенный маршрут Nested Route
        Route::post('/', 'StoreController')->name('post.comment.store');
    }); */

    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function() {       // вложенный маршрут Nested Route
        Route::post('/', 'StoreController')->name('post.like.store');
    });   
}); 

Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function() {
    Route::get('/', 'IndexController')->name('category.index');

    Route::group(['namespace' => 'Post', 'prefix' => '{category}/posts'], function() {    // вложенный маршрут Nested Route
            Route::get('/', 'IndexController')->name('category.post.index');
    });

});

Route::post('posts/{post}/comments', [App\Http\Controllers\ReviewController::class, 'addComment']);

Auth::routes();

