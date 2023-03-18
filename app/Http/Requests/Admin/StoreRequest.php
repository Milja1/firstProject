<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * php artisan make:request Admin/StoreRequest
 */

class StoreRequest extends FormRequest
{
	/**
	 * авторизован ли пользователь для отправки этого запроса
	 */
	public function authorize()
	{
		return true;  // исправить на 'true'
	}

	/**
	 * правила проверки, которые применяются к запросу
	 */
	public function rules()
	{
		return [
			'title' => 'required|string',
		];
	}

	/**
	 * определение сообщений об ошибке при заполнении формы
	 */
	public function messages()
	{
		// return parent::messages(); // по умолчанию возвращает сообщения об ошибке заложенные в Laravel

		// добавление своих сообщений об ошибке
		return [
			'title.required' => 'Это поле необходимо для заполнения',
			'title.string' => 'Данные должны соотвествовать строчному типу',
		];
	}
}
