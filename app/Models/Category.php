<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // подключаем

/**
 * php artisan make:model Category -m
 */

class Category extends Model
{
    use HasFactory;
    use HasFactory;
    use SoftDeletes; // 'трейд' для 'мягкого удаления'

    
    protected $table = 'categories';
    protected $guarded = false; // возможность вносить в поля таблицы изменения

    /**
     * для получание данных из таблицы БД 'posts'
     * связанных с объектами методом 'один ко многим'
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }

}
