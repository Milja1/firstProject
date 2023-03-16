<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // подключаем

/**
 * php artisan make:model Tag -m
 */

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes; // 'трейд' для 'мягкого удаления'

    // возможность вносить в поля таблицы изменения
    protected $table = 'tags';
    protected $guarded = false;
}
