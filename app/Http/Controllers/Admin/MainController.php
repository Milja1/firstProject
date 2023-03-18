<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;  // подключаем
use App\Models\Post;      // подключаем
use App\Models\Tag;       // подключаем
use App\Models\User;      // подключаем

/**
 * php artisan make:controller Admin/MainController
 */

class MainController extends Controller
{
    public function index()
    {
		$data = []; // в массив получаем количество действующих объектов из таблиц БД
		$data['usersCount'] = User::all()->count(); 
		$data['postsCount'] = Post::all()->count();
		$data['categoriesCount'] = Category::all()->count();
		$data['tagsCount'] = Tag::all()->count();
		
        return view('admin.main.index', compact('data'));
    }
}
