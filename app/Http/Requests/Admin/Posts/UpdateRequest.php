<?php

namespace App\Http\Requests\Admin\Posts;

use Illuminate\Foundation\Http\FormRequest;

/**
 * php artisan make:request Admin/Posts/UpdateRequest
 */

class UpdateRequest extends FormRequest
{
    /**
     *авторизован ли пользователь для отправки этого запроса
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
}
