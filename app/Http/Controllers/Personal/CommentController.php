<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\UpdateRequest as PersonalUpdateRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{
	/**
	 * просмотр данных всех комментариев
	 * аутентифицированного пользователя делающего запрос
	 */
    public function index()
    {
		$user = Auth::user()->id;
		$comments = DB::table('comments')
        ->where('user_id', '=', $user)		
        ->paginate(5);
		
		//$comments = auth()->user()->comments;   // можно с помощью метода comments из app\Models\User.php - не получилась пагинация ????       
		
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
        $comment->delete();        
     
        return redirect()->route('personal.comment.index');
    }
}
