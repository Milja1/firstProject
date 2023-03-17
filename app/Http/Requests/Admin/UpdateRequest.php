<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * php artisan make:request Admin/UpdateRequest
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
			'title' => 'required|string'
        ];
    }
}
