<?php

namespace App\Service;                   // добавляем

use App\Models\Post;                    // подключаем
use Exception;
use Illuminate\Support\Facades\DB;      // подключаем
use Illuminate\Support\Facades\Storage; // подключаем

/**
 * класс создан для взаимодейсвия с БД (в ручную т.к. не от Laravel)  
 * для его инициализации создаем контроллер app\Http\Controllers\Admin\BaseController.php
 */

class PostService
{
	/**
	 * обработка данных при добавлении поста
	 */
	public function store($data)
	{
		try {     // транзакция для ...........
		DB::beginTransaction();
			// получаем из формы массив отвалидированных данных
			if (isset($data['tag_ids'])){     // проверяем заполнен ли в форме массив тегов
				$tagIds = $data['tag_ids'];   // получаем теги из формы по name
				unset($data['tag_ids']);      // ощищаем введенный в форму массив тегов
			}

			/* 
			прикрепленные к форме файлы сохраняются в "storage\app\public\images" на которую имеет символическую ссылку "public\storage\images"
			в таблице БД сохраняется строка с информацией о пути к месту хранения файлов
			*/  
			$data['preview_image'] = Storage::disk('public')->put('/images',  $data['preview_image']); 
			$data['main_image'] = Storage::disk('public')->put('/images',  $data['main_image']);

			$post = Post::firstOrCreate($data);   // добавляем в базу данные из формы с проверкой на уникальность			
			 
			if (isset($tagIds)){
				$post->tags()->attach($tagIds);
			}
			
	 	DB::commit();
	 	} catch (Exception $exception) {
		DB::rollBack();
			abort(500); // нарушение работы на стороне сервиса
		}
	}

	/**
	 * обработка данных при редактировании поста
	 */
	public function update($data, $post)
	{
	 	try {    // транзакция для ...........
		DB::beginTransaction();
			if (isset( $data['tag_ids'])) {   // проверяем заполнен ли в форме ли массив тегов     
				$tagIds = $data['tag_ids'];   // получаем теги из формы по name
				unset($data['tag_ids']);      // ощищаем введенный в форму массив тегов
			}

			/* 
			прикрепленные к форме файлы сохраняются в "storage\app\public\images" на которую имеет символическую ссылку "public\storage\images"
			в таблице БД сохраняется строка с информацией о пути к месту хранения файлов
			*/      
			if (isset($data['preview_image'])) {        // если в таблице БД есть запись о пути к месту хранения файлов 			
				$data['preview_image'] = Storage::disk('public')->put('/images',  $data['preview_image']);  // то в таблице БД сохраняем либо старую запис, либо заменяем её на новую
			}
			if (isset($data['main_image'])) { 			  
				$data['main_image'] = Storage::disk('public')->put('/images',  $data['main_image']);
			}
			$post->update($data);   // сохраняем в базу данных изменения

			if (isset($tagIds)){
				$post->tags()->sync($tagIds); 
			}
						
		DB::commit();
		} catch (Exception $exception) {
		DB::rollBack();
			abort(500);   // нарушение работы на стороне сервиса
		}
			return $post;
	}
}