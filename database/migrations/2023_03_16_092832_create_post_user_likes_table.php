<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * php artisan make:model PostUserLike -m
 */

class CreatePostUserLikesTable extends Migration
{
    /**
     * после определения поле таблицы 
     * 'накат' миграции - 'php artisan migrate'
     */
    public function up()
    {
        Schema::create('post_user_likes', function (Blueprint $table) {
            $table->id();

            // поле для связи с таблицей 'posts'
            $table->unsignedBigInteger('post_id');
            $table->index('post_id', 'pul_post_idx'); // pul = сокращенное название таблицы 'post_user_likes'
            $table->foreign('post_id', 'pul_post_fk')->on('posts')->references('id');
            
            // поле для связи с таблицей 'users'
            $table->unsignedBigInteger('user_id');            
            $table->index('user_id', 'pul_user_idx');  // pul = сокращенное название таблицы 'post_user_likes'         
            $table->foreign('user_id', 'pul_user_fk')->on('users')->references('id');
            
            $table->timestamps();
        });
    }

    /**
     * 'откат' миграции
     * php artisan migrate:rollback
     *  
     * для контроля рекомендуется 
     * после 'наката' 'откатить' потом снова 'накатить'
     */
    public function down()
    {
        Schema::dropIfExists('post_user_likes'); // по команде удаляется вся таблица
    }
}