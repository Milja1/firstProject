<?php

namespace App\Http\Controllers;

use App\Models\Comment;               // подключение к модели (таблицы) БД
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // подключение к глобальной модели аутентификации пользователя


/**
 * контроллер для работы с асинхронным запросом
 */
class ReviewController extends Controller
{
   public function addComment(Request $request)  // метод записи отзывов о продукте в БД
   {
    $commentInfo = $request->all();  // в переменную получаем отвалидированные данные из формы запроса
    // var_dump($commentInfo);   // контрольный вывод информации => array(3) ....
    $commentInfo['user_id'] = Auth::id(); // получение id пользователя
    // var_dump($commentInfo);   // контрольный вывод информации => array(4) ....    
    Comment::create($commentInfo);      // передача данных комментария в таблицу Comment БД
    
    // выводим, отправленные в БД, данные в JSON-формате 
    echo json_encode($commentInfo); 							   
   }
}
