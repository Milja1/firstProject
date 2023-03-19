<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;

/**
 * php artisan make:controller Main/IndexController
 * создание текущего контроллера в папке Main
 */


class StoreController extends Controller
{
    public function __invoke(Post $post)  // метод (функция) вызываемая по умолчанию т.е. без ссылок
    {
       // dd($post->id);
        auth()->user()->likedPosts()->toggle($post->id);    // toggle() если лайка нет добавится (привяжется к посту и пользователю), если есть от уберется (отвяжется)

        return redirect()->back();   // перенаправление на туже страницу
    }
}
