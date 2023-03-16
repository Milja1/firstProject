<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * php artisan make:model PostUserLike -m
 */

class PostUserLike extends Model
{
    use HasFactory;

    
    protected $table = 'post_user_likes';
    protected $guarded = false; // возможность вносить в поля таблицы изменения
}
