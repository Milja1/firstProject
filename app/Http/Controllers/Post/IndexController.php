<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


/**
 * для страницы визуального отображения всех постов
 */
class IndexController extends Controller
{
    public function __invoke()
	{		
	    $posts = Post::paginate(6);
        $randomPosts = Post::get()->random(2);       // рандомные посты
        // посты с наибольшим количеством лайков ('DESC' - по убыванию)
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(3); // через метод likedUsers из app\Models\Post.php (take(3) три лучших поста)

        return view('post.index', compact('posts', 'randomPosts', 'likedPosts')); 
    }    
}
