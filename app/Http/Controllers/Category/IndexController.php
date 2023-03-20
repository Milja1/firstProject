<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

/**
 * php artisan make:controller Main/IndexController
 * создание текущего контроллера в папке Main
 */


class IndexController extends Controller
{
    public function __invoke()  // метод (функция) вызываемая по умолчанию т.е. без ссылок
    {
        $categories = Category::all();  // получаем список категорий из БД
        return view('category.index', compact('categories'));
    }
}
