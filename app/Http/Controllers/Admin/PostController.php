<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Admin\Posts\StoreRequest;  // подключение
use App\Http\Requests\Admin\Posts\UpdateRequest; // подключение
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;  // подключение
use Exception;
use Illuminate\Support\Facades\Storage;

/**
 * php artisan make:controller Admin/PostController --resource
 * 
 * т.к. применяется используется класс PostService
 * изменяем extends (наследование) от BaseController
 */

class PostController extends BaseController
{
    /**
     * просмотр всех постов
     */
    public function index()
    {
        $posts = Post::all(); // получаем из таблицы БД список всех категорий
		return view('admin.post.index', compact('posts')); // передаем его для вывода на странице по Route
    }

    /**
     * создание поста
     */
    public function create()
    {
		$categories = Category::all();                             // получаем все категории из таблицы базы данных
        $tags = Tag::all();                                        // получаем все теги из таблицы базы данных
        return view('admin.post.create', compact('categories', 'tags'));   // передаем их для отображения на стр. resources\views\admin\post\create.blade.php
    }

    /**
     * добавление поста в БД
     */
    public function store(StoreRequest $request)
    {   
		$data = $request->validated();
		$this->service->store($data);   // обрабатываем полученныеы из БД данные с помощью метода 'store' из app\Service\PostService.php
		
        return redirect()->route('admin.post.index');      // переадресация
    }

    /**
     * просмотр одного поста
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post')); // передаем для вывода на странице отдельную категорию  по Route
    }

    /**
     * редактирование одного поста
     */
    public function edit(Post $post)
    {
		$categories = Category::all();                             // получаем все категории из таблицы базы данных
        $tags = Tag::all();                                        // получаем все теги из таблицы базы данных

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * сохранение изменений поста в БД
     */
    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();                // получаем из формы массив отвалидированных данных
		$post = $this->service->update($data, $post); // обрабатываем полученныеы данные с помощью метода 'update' из app\Service\PostService.php	
		
		return view('admin.post.show', compact('post')); // вывод полученного результата 
    }

    /**
     * удаление поста
     */
    public function delete(Post $post)
    {
        $post->delete();
		return redirect()->route('admin.post.index');
    }
}
