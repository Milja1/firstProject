<?php

namespace App\Http\Middleware;

use App\Models\User; // подключение
use Closure;
use Illuminate\Http\Request;

/**
 * php artisan make:middleware AdminMiddleware
 * 
 * регистрируем в app\Http\Kernel.php
 */

class AdminMiddleware
{
    /**
     * обработка входящих запросов
     */
    public function handle(Request $request, Closure $next)
    {
		if ((int) auth()->user()->role !== User::ROLE_ADMIN) { // проверка если отправивший завпрос не является администратором
			abort(404);                                       // то страница не найдена
		};
        return $next($request);
    }
}
