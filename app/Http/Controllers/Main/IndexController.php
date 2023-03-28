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
		return redirect()->route('post.index');
    }
}
