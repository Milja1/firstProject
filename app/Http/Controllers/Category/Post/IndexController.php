<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;


/**
 * для страницы визуального отображения постов по категориям
 */
class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        $posts = $category->posts()->paginate(3);     
        
        return view('category.post.index', compact('posts'));
    }
}
