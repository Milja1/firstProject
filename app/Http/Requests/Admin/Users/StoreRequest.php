<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

/**
 * php artisan make:request Admin/Posts/StoreRequest
 */

class StoreRequest extends FormRequest
{
    /**
     * авторизован ли пользователь для отправки этого запроса
     */
    public function authorize()
    {
        return true; // исправить на 'true'
    }

    /**
     * правила проверки, которые применяются к запросу
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
			'role' => 'required|integer',
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
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Данные должны соотвествовать строчному типу',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.string' => 'Данные должны соотвествовать строчному типу',
            'email.email' => 'Электронная почта должна иметь соответствующие атрибуты',
            'email.unique' => 'Пользователь с таким "email" уже существует',
			'password.required' => 'Это поле необходимо для заполнения',
            'password.string' => 'Данные должны соотвествовать строчному типу',   
        ];
    }
}
