<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // подключение

/**
 * php artisan make:model Post -m
 */

class Post extends Model
{
    use HasFactory;
    use SoftDeletes; // 'мягкое удаление'

    
    protected $table = 'posts';
    protected $guarded = false; // возможность вносить в поля таблицы изменения

    protected $withCount = ['likedUsers'];  // количество отношейний лайков к пользователю
    
	/* !!!!!!!!!!!!! для оптимизации количества запросов  необходима установка "telescope"	
	protected $with = ['category'];  // по запросам с включеннием 'category' */        

    /**
     * для получения данных из таблиц БД
     * связанных с объектами отношением: 
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id'); // 'многие ко многим'
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');  // 'обратный один к одному'
    }

    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id'); // 'многие ко многим'
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');   // 'один ко многим'
    }
}