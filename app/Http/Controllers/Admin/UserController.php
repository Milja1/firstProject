<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\StoreRequest; // подключаем
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Models\User;                            // подключаем
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * php artisan make:controller Admin/UserController --resource
 */

class UserController extends Controller
{
    /**
     * просмотр списка пользователей
     */
    public function index()
    {
        $users = User::all();           // получаем из БД список всех пользователей
		return view('admin.user.index', compact('users')); // полученный список передаем на страницу для вывода
    }

    /**
     * создание пользователя
     */
    public function create()
    {
		return view('admin.user.create');
    }

    /**
     * добавление пользователя в БД
     */
    public function store(StoreRequest $request)
    {
		$data = $request->validated();
		$data['password'] = Hash::make($data['password']); // переназначаем пароль на хешированный пароль
		User::firstOrCreate(['email' => $data['email']], $data);      // создаем объект (добавляемв таблицу БД) уникальную запись по полю 'email'
        return redirect()->route('admin.user.index');
    }

    /**
     * просмотр одного пользователя
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * редактирование одного пользователя
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * внесение изменений в БД
     */
    public function update(UpdateRequest $request, User $user)
    {
		$data = $request->validated();
		$user->update($data);
        return view('admin.user.show', compact('user'));
    }

    /**
     * удаление пользователя
     */
    public function delete(User $user)
    {
        $user->delete();
		return redirect()->route('admin.user.index');
    }
}
