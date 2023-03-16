<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/** 
 * php artisan make:controller Main/IndexController
 * 
 * создание однометодного контроллера
 * с методом '__invoke' вызываемом по умолчанию
 */

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('main.index');
    }
}
