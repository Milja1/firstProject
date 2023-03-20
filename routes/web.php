<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * страница для однометодных контроллеров
 * переподключить страницу в app\Providers\RouteServiceProvider.php
 */


Route::group(['namespace' => 'Main'], function() {
    Route::get('/', 'IndexController')->name('main.index'); // без указания метода контроллера т.к. он однометодный
});
Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function() {
    Route::get('/', 'IndexController')->name('post.index');
    Route::get('/{post}', 'ShowController')->name('post.show');

    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function() { // вложенный маршрут Nested Route
        Route::post('/', 'StoreController')->name('post.comment.store');
    });

    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function() {       // вложенный маршрут Nested Route
        Route::post('/', 'StoreController')->name('post.like.store');
    });
   
}); 

Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function() {
    Route::get('/', 'IndexController')->name('category.index');

    Route::group(['namespace' => 'Post', 'prefix' => '{category}/posts'], function() {                   // вложенный маршрут Nested Route
            Route::get('/', 'IndexController')->name('category.post.index');
    });

});

Auth::routes();

