<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Category;  // подключаем
use App\Models\Post;      // подключаем
use App\Models\Tag;       // подключаем
use App\Models\User;      // подключаем

/**
 * php artisan make:controller Resonal/MainController
 */

class MainController extends Controller
{
    public function index(User $user)
    {
		// $data = []; // в массив получаем количество действующих объектов из таблиц БД
		// $data['usersCount'] = User::all()->count(); 
		// $data['postsCount'] = Post::all()->count();
		// $data['categoriesCount'] = Category::all()->count();
		// $data['tagsCount'] = Tag::all()->count();
				
        return view('personal.main.index'/* , compact('data') */);
    }
}
