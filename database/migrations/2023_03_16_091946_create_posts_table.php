<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * php artisan make:model Post -m
 */

class CreatePostsTable extends Migration
{
    /**
     * после определения поле таблицы 
     * 'накат' миграции - 'php artisan migrate'
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');

            // поле для связи с таблицей 'categories'
            $table->unsignedBigInteger('category_id')->nullable(); 
            $table->index('category_id', 'post_category_idx');
            $table->foreign('category_id', 'post_category_fk')->on('categories')->references('id');

            $table->string('preview_image')->nullable();  // поле ссылка на аватарку к посту
            $table->string('main_image')->nullable();     // поле ссылка на картинку поста

            $table->timestamps();
            $table->softDeletes(); // мягкое удаление
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
        Schema::dropIfExists('posts'); // по команде удаляется вся таблица
    }
}