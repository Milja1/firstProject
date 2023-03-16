<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * добавление поля (колонки) в таблицу БД
 * php artisan make:migration add_soft_deletes_to_users_table
 */

class AddSoftDeletesToUsersTable extends Migration
{
    /**
     * после добавления поля (колонки) таблицы 
     * 'накат' миграции - 'php artisan migrate'
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes(); // 'мягкое удаление'
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();   // по команде удаление добавленной колонки из таблицы
        });
    }
}