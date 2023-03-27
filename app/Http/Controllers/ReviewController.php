<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;    // подключаем класс Review из папки Models

/* 
    ____________ ГЕНЕРАЦИЯ КОНТРОЛЛЕРА МОДЕЛИ ________________
    производится командой 
   'php artisan make:controller ReviewController'
    в консоле проекта, где 'ReviewController' - название нового класса
    после её выполнения в папке 'app/Http/Controllers' 
    создается новый файл 'ReviewController.php'
*/

class ReviewController extends Controller
{
   public function  addComment(Request $request)  // метод записи отзывов о продукте в БД
   {
        return 'Задолбало';
	
	// //die(var_dump($request)); // контрольный вывод информации

    //     // необходимо провести валидацию

    //     $commentInfo = $request->all();  // получение информации отзыва о продукте из формы файл show.blade.php
 
    //     /* контрольный вывод информации
    //     var_dump($commentInfo);   => array(4) { ["_token"]=> string(40) "acM97jAoQEzcT81bksV9JrZg4NDtwdGl6t4ENyEq" 
    //                                             ["product_id"]=> string(2) "20" 
    //                                             ["mark"]=> string(1) "4" 
    //                                             ["text"]=> string(5) "aaaaa" } */
    //     $commentInfo['user_id'] = Auth::id(); // получение id пользователя
	// 	//$commentInfo['post_id'] = $post->id; // получение id пользователя
        
    //     Comment::create($commentInfo);      // передача данных отзыва в таблицу Review БД
        
    //     // выводим, отправленные в БД, данные в JSON-формате 
    //     echo json_encode($commentInfo); /* => {"_token":"iz599llFVC4D2QHGrd8clFqWBT2ZXOJRWnvZNp9Y",
    //                                            "product_id":"18",
    //                                            "mark":"3",
    //                                            "text":"ooooo",
    //                                            "user_id":2} */
											   
											   
   }
}
