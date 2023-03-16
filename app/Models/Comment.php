<?php

namespace App\Models;

use Carbon\Carbon; // подключение
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * php artisan make:model Comment -m
 */

class Comment extends Model
{
    use HasFactory;

    // возможность вносить в поля таблицы изменения
    protected $table = 'comments';
    protected $guarded = false;

    /**
     * для получание данных из таблицы БД 'users'
     * связанных с объектами методом 'обратный один к одному'
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * создание атрибута для оборачивания даты в Carbon
     */
    public function getDateAsCarbonAttribute()
    {
        return Carbon::parse($this->created_at);
    }
}