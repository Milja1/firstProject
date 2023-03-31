<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;

/**
 * php artisan make:controller Post/Comment/StoreController
 */


class StoreController extends Controller
{
    public function __invoke(Post $post, StoreRequest $request)  // метод (функция) вызываемая по умолчанию т.е. без ссылок
    {
       /*  $data = $request->validated();       // получение значений из формы добавления комментария под постом 
        $data['user_id'] = auth()->user()->id;  // id авторизованного пользователя отправившего коментарий 
        $data['post_id'] = $post->id;           // id поста к оторому добавлен коментарий 
        Comment::create($data);                 // передача массива значений в БД

        return redirect()->route('post.show', $post->id); */
    }
}
