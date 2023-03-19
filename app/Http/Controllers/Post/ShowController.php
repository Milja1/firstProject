<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;

/**
 * php artisan make:controller Post/IndexController
 */

class ShowController extends Controller
{
    public function __invoke(Post $post)
	{	
		// получаем дату создания поста 'обернутую' дату в Carbon
		$date = Carbon::parse($post->created_at);

		// получаем схожие посты   -> в колонке, одинаковой значение
	    $relatedPosts = Post::where('category_id', $post->category_id)
		    ->where('id', '!=', $post->id) // не повторять просматриваемый пост
			->get()    // получаем
			->take(3); // 3 шт

        return view('post.show', compact('post', 'date', 'relatedPosts')); 
    }    
}
