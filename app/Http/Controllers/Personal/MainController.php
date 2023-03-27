<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\PostUserLike;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * php artisan make:controller Resonal/MainController
 */

class MainController extends Controller
{
    public function index()
    {
		$user = Auth::user()->id;

		$countComments = DB::table('comments')
        ->where('user_id', '=', $user)
        ->get()
		->count();

		$countLikes = PostUserLike::where('user_id', '=', $user)
		->get()
		->count();
		//dd($countLikes);
		
				
        return view('personal.main.index', compact('countComments', 'countLikes'));
    }
}
