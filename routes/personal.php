<?php


// use App\Http\Controllers\Resonal\CommentController;
// use App\Http\Controllers\Resonal\LikedController;
// use App\Http\Controllers\Resonal\MainController as ResonalMainController;

use App\Http\Controllers\Personal\CommentController;
use App\Http\Controllers\Personal\LikedController;
use App\Http\Controllers\Personal\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::prefix('personal')->/*middleware('auth', 'verified')->*/group(function() {                  // добавили 'middleware' в порядке очередности проверки => 'auth' - проверка авторизован ли пользователь 'admin'
    //Route::prefix('main')->group(function() {                                                      //  'verified' - верификация персональных данных
        Route::get('/', [MainController::class, 'index'])->name('personal.main.index');
    //});
    Route::prefix('likeds')->group(function() {                                                      
        Route::get('/', [LikedController::class, 'index'])->name('personal.liked.index');
        Route::delete('/{post}', [LikedController::class, 'delete'])->name('personal.liked.delete');
    });

    Route::prefix('comments')->group(function() {                                                      
        Route::get('/', [CommentController::class, 'index'])->name('personal.comment.index');
        Route::get('/{comment}/edit', [CommentController::class, 'edit'])->name('personal.comment.edit');
        Route::patch('/{comment}', [CommentController::class, 'update'])->name('personal.comment.update');
        Route::delete('/{comment}', [CommentController::class, 'delete'])->name('personal.comment.delete');
    });

});

Auth::routes();