<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;  // подключаем
use App\Models\Post;      // подключаем
use App\Models\Tag;       // подключаем
use App\Models\User;      // подключаем


class MainController extends Controller
{
	/**
	 * получаем из БД количество users, posts, categories, tags для кабинета администратора
	 */
    public function index()
    {
		$data = [];
		$data['usersCount'] = User::all()->count(); 
		$data['postsCount'] = Post::all()->count();
		$data['categoriesCount'] = Category::all()->count();
		$data['tagsCount'] = Tag::all()->count();
		
        return view('admin.main.index', compact('data'));
    }
}
