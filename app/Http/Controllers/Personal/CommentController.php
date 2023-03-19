<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Http\Requests\Personal\UpdateRequest as PersonalUpdateRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

/**
 * php artisan make:controller Resonal/CommentController --resource
 */

class CommentController extends Controller
{
	/**
	 * из таблицы БД получаем комментарии только
	 * аутентифицированного пользователя делающего запрос
	 */
    public function index()
    {
        $comments = auth()->user()->comments;   // с помощью метода comments из app\Models\User.php        
               
        return view('personal.comment.index', compact('comments'));
    }

	/**
	 * редактирование комментария
	 */
    public function edit(Comment $comment)
    {
        return view('personal.comment.edit', compact('comment'));
    }

	/**
	 * добавление изменений в таблицу БД
	 */
    public function update(PersonalUpdateRequest $request,Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);
                
        return redirect()->route('personal.comment.index');
    }

	/**
	 * удаление комментрия
	 */
    public function delete(Comment $comment)
    {
        $comment->delete();   // с помощью метода delete() удаляем комментарий        
     
        return redirect()->route('personal.comment.index');
    }
}
