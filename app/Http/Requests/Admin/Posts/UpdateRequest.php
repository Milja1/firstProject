<?php

namespace App\Http\Requests\Admin\Posts;

use Illuminate\Foundation\Http\FormRequest;

/**
 * php artisan make:request Admin/Posts/UpdateRequest
 */

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id', // 'exists' - в таблице 'categories' в колонке 'category_id', соответсвующей 'id' должно быть значение 
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id', // 'exists' - в таблице 'tags' в колонке 'tag_id', соответсвующей !!!нескольким 'id' должно быть значение
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
            'content.required' => 'Это поле необходимо для заполнения',
            'content.string' => 'Данные должны соотвествовать строчному типу',
            'preview_image.required' => 'Это поле необходимо для заполнения',
            'preview_image.file' => 'Необходимо выбрать файл',
            'main_image.required' => 'Это поле необходимо для заполнения',
            'main_image.file' => 'Необходимо выбрать файл',
            'category_id.required' => 'Это поле необходимо для заполнения',
            'category_id.integer' => 'Данные должны быть числом',
            'category_id.exists' => 'Id категории должны быть в базе данных',
            'tag_ids.array' => 'Необходимо отправить массив данных',          
        ];
    }
}
