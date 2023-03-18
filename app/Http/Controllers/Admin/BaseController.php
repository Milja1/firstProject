<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\PostService;       // подключаем

/**
 * php artisan make:controller Admin/BaseController
 * создан для инициализации класса PostService в app\Service\PostService.php
 */

class BaseController extends Controller
{
    public $service;

    public function __construct(PostService $service)
    {
        $this->service = $service; // инициализация 
    }
}
