<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Tag; // подключение

/**
 * php artisan make:controller Admin/TagController --resource
 */

class TagController extends Controller
{
	/**
	 * просмотр всех тегов
	 */
	public function index()
	{
		$tags = Tag::all(); // получаем из таблицы БД список всех категорий
		return view('admin.tag.index', compact('tags')); // передаем его для вывода на странице по Route
	}

	/**
	 * создание тега
	 */
	public function create()
	{
		return view('admin.tag.create');
	}

	/**
	 * добавление тега в БД
	 */
	public function store(StoreRequest $request)
	{
		$data = $request->validated();  // получаем из формы массив отвалидированных данных

		Tag::firstOrCreate($data);   // добавляем в базу данных с проверкой данных на уникальность
		return redirect()->route('admin.tag.index');
	}

	/**
	 * просмотр одного тега
	 */
	public function show(Tag $tag)
	{
		return view('admin.tag.show', compact('tag')); // передаем для вывода на странице отдельную категорию  по Route
	}

	/**
	 * редактирование одного тега
	 */
	public function edit(Tag $tag)
	{
		return view('admin.tag.edit', compact('tag'));
	}

	/**
	 * сохранение изменений тега в БД
	 */
	public function update(UpdateRequest $request, Tag $tag)
	{
		$data = $request->validated();  // получаем из формы массив отвалидированных данных
		$tag->update($data);    // добавляем в базу данных измененные данные 

		return view('admin.tag.show', compact('tag'));
	}

	/**
	 * удаление тега
	 */
	public function delete(Tag $tag)
	{
		$tag->delete();
		return redirect()->route('admin.tag.index');
	}
}
