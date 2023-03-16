<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * php artisan make:controller Admin/MainController
 */

class MainController extends Controller
{
    public function index()
    {
        return view('admin.main.index');
    }
}
