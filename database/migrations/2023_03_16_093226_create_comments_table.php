<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * php artisan make:model Comment -m
 */

class CreateCommentsTable extends Migration
{
    /**
     * после определения поле таблицы 
     * 'накат' миграции - 'php artisan migrate'
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('message');

            // поле для связи с таблицей 'users'
            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'comments_user_idx');
            $table->foreign('user_id', 'comments_user_fk')->on('users')->references('id');            

            // поле для связи с таблицей 'posts'
            $table->unsignedBigInteger('post_id');
            $table->index('post_id', 'comments_post_idx');  
            $table->foreign('post_id', 'comments_post_fk')->on('posts')->references('id');
 
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
        Schema::dropIfExists('comments'); // по команде удаляется вся таблица
    }
}