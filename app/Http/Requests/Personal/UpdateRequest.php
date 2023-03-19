<?php

namespace App\Http\Requests\Personal;

use Illuminate\Foundation\Http\FormRequest;

/**
 * php artisan make:request Personal/UpdateRequest
 */

class UpdateRequest extends FormRequest
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
			'message' => 'required|string'
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
            'message.required' => 'Это поле необходимо для заполнения',
            'message.string' => 'Данные должны соотвествовать строчному типу',                   
        ];
    }
}
