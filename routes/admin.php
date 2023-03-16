<?php

use App\Http\Controllers\Admin\MainController; // подключение
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->/*middleware('auth', 'admin')->*/group( function () { // 'middleware' в порядке очередности проверки => 'auth' - проверка авторизован ли пользователь 'admin'
    Route::prefix('main')->group(function() {                                 //                                                'admin' - проверка является ли он адинимистратором
        Route::get('/', [MainController::class, 'index'])->name('admin.main.index');
    });
});

Auth::routes();
