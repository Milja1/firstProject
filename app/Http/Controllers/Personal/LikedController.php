<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Post;


class LikedController extends Controller
{
	/**
	 * из таблицы БД получаем лайки к постам только
	 * аутентифицированного пользователя делающего запрос
	 */
    public function index()
    {
        $posts = auth()->user()->likedPosts;   // с помощью метода likedPosts из app\Models\User.php        
        
        //dd($posts->toArray());
        return view('personal.liked.index', compact('posts'));
    }

	/**
	 * удалениe поста из понравившихся (отвязываем пост от пользователя в таблице БД)
	 */
    public function delete(Post $post)
    {
        // 
        auth()->user()->likedPosts()->detach($post->id);   // с помощью метода likedPosts() - SQL-запроса в БД        
    
        return redirect()->route('personal.liked.index');
    }
}
