<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\PostUserLike;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
	/**
	 * корличество likes и comments пользователя в личном кабинете 
	 */
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
						
        return view('personal.main.index', compact('countComments', 'countLikes'));
    }
}
