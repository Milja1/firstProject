<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Posts\StoreRequest; // подключение
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;  // подключение
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * php artisan make:controller Admin/PostController --resource
 */

class PostController extends Controller
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
        //$tags = Tag::all();                                        // получаем все теги из таблицы базы данных
        return view('admin.post.create', compact('categories'/* , 'tags' */));   // передаем их для отображения на стр. resources\views\admin\post\create.blade.php
    }

    /**
     * добавление поста в БД
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
		$data['preview_image'] = Storage::put('/images', $data['preview_image']); // переопределяем значение из формы как путь (Storage::put) в месту попадания файла в storage\app\images
		$data['main_image'] = Storage::put('/images', $data['main_image']);        // -- // --
		
		Post::firstOrCreate($data); // передаем путь хранения файла в таблицу 'posts' (прикрепляем к объекту созданному на базе класса Post)
        //$this->service->store($data);   // обрабатываем полученныеы данные с помощью метода 'store' из app\Service\PostService.php
        
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
        return view('admin.post.edit', compact('post'));
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
