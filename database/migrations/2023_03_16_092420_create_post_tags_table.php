<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * php artisan make:model PostTag -m
 */

class CreatePostTagsTable extends Migration
{
    /**
     * после определения поле таблицы 
     * 'накат' миграции - 'php artisan migrate'
     */
    public function up()
    {
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();

            // поле для связи с таблицей 'posts'
            $table->unsignedBigInteger('post_id');
            $table->index('post_id', 'post_tag_post_idx');
            $table->foreign('post_id', 'post_tag_post_fk')->on('posts')->references('id');

            // поле для связи с таблицей tags'
            $table->unsignedBigInteger('tag_id');       
            $table->index('tag_id', 'post_tag_tag_idx');       
            $table->foreign('tag_id', 'post_tag_tag_fk')->on('tags')->references('id');

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
        Schema::dropIfExists('post_tags'); // по команде удаляется вся таблица
    }
}