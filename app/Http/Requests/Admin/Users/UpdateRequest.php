<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

/**
 * php artisan make:request Admin/Users/UpdateRequest
 */

class UpdateRequest extends FormRequest
{
    /**
     * авторизован ли пользователь для отправки этого запроса
     *
     * @return bool
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
            'email' => 'required|string|email|unique:users,email,' . $this->user_id, // уникальная запись в поле email таблицы 'users' по 'id' пользователя
			'user_id' => 'required|integer|exists:users,id', // 'exists' - в таблице 'users' в колонке 'user_id', соответсвующей 'id' должно быть значение 
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
                      
        ];
    }
}
