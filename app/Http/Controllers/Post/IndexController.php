<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

/**
 * php artisan make:controller Post/IndexController
 */

class IndexController extends Controller
{
    public function __invoke()
	{		
	    $posts = Post::paginate(3);     // получение постов из БД
        $randomPosts = Post::get()->random(2);       // получение рандомных постов из БД

        // получение количества лайков для каждого поста ('DESC' - по убыванию)
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(3); // через метод likedUsers из app\Models\Post.php (take(3) три лучших поста)

        return view('post.index', compact('posts', 'randomPosts', 'likedPosts')); 
    }    
}
