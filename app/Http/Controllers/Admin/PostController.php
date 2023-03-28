<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Admin\Posts\StoreRequest;
use App\Http\Requests\Admin\Posts\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;


/**
 * т.к. обработка данных осуществляется с использованием app\Service\PostService.php
 * изменяем extends (наследование) от BaseController, инициализурующим класс PostService
 */

class PostController extends BaseController
{
    /**
     * просмотр списка постов
     */
    public function index()
    {
        $posts = Post::paginate(6);
		return view('admin.post.index', compact('posts'));
    }

    /**
     * отображение списка имеющихся категорий и тегов 
	 * в форме создания поста
     */
    public function create()
    {
		$categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * реализация добавления в БД данных данных отдельного поста, 
	 * обработанных с помощью метода 'store' из app\Service\PostService.php
     */
    public function store(StoreRequest $request)
    {   
		$data = $request->validated();
		$this->service->store($data);
		
        return redirect()->route('admin.post.index');
    }

    /**
     * просмотр отдельного поста
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
	 * отображение списка имеющихся категорий и тегов 
	 * в форме редактирования поста
     */
    public function edit(Post $post)
    {
		$categories = Category::all();
        $tags = Tag::all();

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * реализация редактирования в БД данных отдельного поста, 
	 * обработанных с помощью метода 'update' из app\Service\PostService.php
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
