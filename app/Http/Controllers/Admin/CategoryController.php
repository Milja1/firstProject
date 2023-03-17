<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;  // подключение
use App\Http\Requests\Admin\UpdateRequest; // подключение
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * php artisan make:controller Admin/CategoryController --resource
 */

class CategoryController extends Controller
{
	/**
	 * просмотр всех категорий
	 */
	public function index()
	{
		$categories = Category::all();           // получаем из БД список всех категорий
		return view('admin.category.index', compact('categories')); // полученный список передаем на страницу для вывода
	}

	/**
	 * создание категории
	 */
	public function create()
	{
		return view('admin.category.create');
	}

	/**
	 * добавление категорий в БД
	 */
	public function store(StoreRequest $request)
	{
		$data = $request->validated(); // получение из формы запроса 'Добавление категорий' отвалидированных данных
		Category::firstOrCreate($data); // добавляем в базу данных с проверкой данных на уникальность 
		return redirect()->route('admin.category.index');
	}

	/**
	 * просмотр одной категории
	 */
	public function show(Category $category)
	{
		return view('admin.category.show', compact('category'));
	}

	/**
	 * редактирование одной категории
	 */
	public function edit(Category $category)
	{
		return view('admin.category.edit', compact('category'));
	}

	/**
	 * внесение изменений в БД 
	 */
	public function update(UpdateRequest $request, Category $category)
	{
		$data = $request->validated();  // получаем из формы массив отвалидированных данных
		$category->update($data);       // сохраняем в базу данных изменения

		return view('admin.category.show', compact('category'));
	}

	/**
	 * удаление категории
	 */
	public function delete(Category $category)
	{
		$category->delete();
		return redirect()->route('admin.category.index');
	}
}
