<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Main'], function() {
    Route::get('/', 'IndexController')->name('main.index'); // без указания метода контроллера т.к. он однометодный
});

Auth::routes();

