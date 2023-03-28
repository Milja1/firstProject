<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Tag;


class TagController extends Controller
{
	/**
	 * просмотр списка тегов
	 */
	public function index()
	{
		$tags = Tag::all();
		return view('admin.tag.index', compact('tags'));
	}

	/**
	 * создание тега
	 */
	public function create()
	{
		return view('admin.tag.create');
	}

	/**
	 * создание тега
	 */
	public function store(StoreRequest $request)
	{
		$data = $request->validated();
		Tag::firstOrCreate($data);      // добавляем в БД с проверкой данных на уникальность

		return redirect()->route('admin.tag.index');
	}

	/**
	 * просмотр одного тега
	 */
	public function show(Tag $tag)
	{
		return view('admin.tag.show', compact('tag'));
	}

	/**
	 * редактирование тега
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
		$data = $request->validated();
		$tag->update($data);           // добавляем в БД измененные данные 

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
