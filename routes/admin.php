<?php

use App\Http\Controllers\Admin\CategoryController; // подключение
use App\Http\Controllers\Admin\MainController;     // подключение
use App\Http\Controllers\Admin\PostController;	   // подключение
use App\Http\Controllers\Admin\TagController; 	   // подключение
use App\Http\Controllers\Admin\UserController;     // подключение
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->/*middleware('auth', 'admin')->*/group(function () { // 'middleware' в порядке очередности проверки => 'auth' - проверка авторизован ли пользователь 'admin', 'admin' - проверка является ли он адинимистратором
	Route::get('/', [MainController::class, 'index'])->name('admin.main.index');

	Route::prefix('posts')->group(function () {
		Route::get('/', [PostController::class, 'index'])->name('admin.post.index');
		Route::get('/create', [PostController::class, 'create'])->name('admin.post.create');
		Route::post('/create', [PostController::class, 'store'])->name('admin.post.store');
		Route::get('/{post}', [PostController::class, 'show'])->name('admin.post.show');
		Route::get('/{post}/edit', [PostController::class, 'edit'])->name('admin.post.edit');
		Route::patch('/{post}', [PostController::class, 'update'])->name('admin.post.update');
		Route::delete('/{post}', [PostController::class, 'delete'])->name('admin.post.delete');
	});

	Route::prefix('categories')->group(function () {
		Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
		Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
		Route::post('/create', [CategoryController::class, 'store'])->name('admin.category.store');
		Route::get('/{category}', [CategoryController::class, 'show'])->name('admin.category.show');
		Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
		Route::patch('/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
		Route::delete('/{category}', [CategoryController::class, 'delete'])->name('admin.category.delete');
	});

	Route::prefix('tags')->group(function () {
		Route::get('/', [TagController::class, 'index'])->name('admin.tag.index');
		Route::get('/create', [TagController::class, 'create'])->name('admin.tag.create');
		Route::post('/create', [TagController::class, 'store'])->name('admin.tag.store');
		Route::get('/{tag}', [TagController::class, 'show'])->name('admin.tag.show');
		Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('admin.tag.edit');
		Route::patch('/{tag}', [TagController::class, 'update'])->name('admin.tag.update');
		Route::delete('/{tag}', [TagController::class, 'delete'])->name('admin.tag.delete');
	});

	Route::prefix('users')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/create', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/{user}', [UserController::class, 'show'])->name('admin.user.show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::patch('/{user}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/{user}', [UserController::class, 'delete'])->name('admin.user.delete');
    });
});

Auth::routes();
