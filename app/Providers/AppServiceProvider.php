<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * дополнительные подключения
     */
    public function boot()
    {
		Carbon::setLocale('ru_RU');      // перевод даты на русский язык 
        Paginator::useBootstrap();       // добавляем для пагинации
		
    }
}
