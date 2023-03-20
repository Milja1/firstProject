<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

/**
 * php artisan make:controller Main/IndexController
 * создание текущего контроллера в папке Main
 */


class IndexController extends Controller
{
    public function __invoke(Category $category)  // метод (функция) вызываемая по умолчанию т.е. без ссылок
    {
        $posts = $category->posts()->paginate(3);     
        
        return view('category.post.index', compact('posts'));
    }
}
