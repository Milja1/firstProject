<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

/** 
 * php artisan make:controller Main/IndexController
 * 
 * создание однометодного контроллера
 * с методом '__invoke' вызываемом по умолчанию
 */

class IndexController extends Controller
{
	/**
	 * получение постов из таблицы БД
	 */
    public function __invoke()
    {
		/* $posts = Post::paginate(3);                         // все посты с пагинацией по 6 шт
		$randomPosts = Post::get()->random(2);              // рандомные посты 2 шт
		
		// посты с наибольшим количество лайков    -> сортируем, по убывающей            -> получаем -> 3 шт            
		$likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(3); 

        return view('main.index', compact('posts', 'randomPosts', 'likedPosts')); */

		return redirect()->route('post.index');
    }
}
