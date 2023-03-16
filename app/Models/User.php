<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; // подключение
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * автоматически созданная модель
 * создаем базу данных
 * в поле DB_DATABASE файла '.env'
 * задаем название созданной БД
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;                  // 'мягкое удаление'

   /**
     * создаем констатнты для нумерации присваиваемых ролей для их
     * полседующей актуализации и передачей в качестве role_id
     * при возможной необходимости расширении списка ролей и (или) создания соответсвующей таблицы
     * 
     * mapping — определение соответствия данных между потенциальными различиями одного объекта или разных объектов
     * т.е. если в поле стоит какое-то значение определяем что под ним понимается
     * 
     */
    const ROLE_ADMIN = 0;
    const ROLE_READER = 1;
 
    public static function getRoles()
    {
        return [
            self::ROLE_ADMIN => 'Aдмин',
            self::ROLE_READER => 'Читатель',
        ];
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',         // добавляем
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * для получения данных из таблиц БД
     * связанных с объектами методом: 
     */
    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'post_user_likes', 'user_id', 'post_id'); // 'многие ко многим'
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id'); // 'один ко многим'
    }
}