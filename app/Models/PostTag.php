<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * php artisan make:model PostTag -m
 */

class PostTag extends Model
{
    use HasFactory;

    // возможность вносить в поля таблицы изменения
    protected $table = 'post_tags';
    protected $guarded = false;
}
