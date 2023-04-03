<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * контроллер Livewire
 * создан:  php artisan make:livewire Categoriess
 */

class Categories extends Component
{
	use WithPagination; // пагинация Livewire - отобразилась не корректно
	
	public $category;    // текущая категория на добавление или редактирование
	public $popUp = false; // условие открытия модального окна
	public $rules = [      // правила валидации
		'category.title' => ['required', 'string', 'min:2'],
	];

	/**
	 * метод закрытия модального окна по команде
	 */
	public function close() 
	{
		$this->reset(); // очистит форму 
	}

	/**
	 * метод сохранения введенных или отредактированных данных в таблицу БД
	 */
	public function store() 
	{
		$this->validate(); // метод от Livewire

		$this->category->save();

		$this->close();
	}

	/**
	 * метод добавления данных
	 */
	public function add() 
	{
		$this->popUp = true; // при вызове будет открываться модальное окно
		$this->category = new Category();
	}

	/**
	 * метод редактирования данных
	 */
	public function update(Category $category) 
	{
		$this->popUp = true; // при вызове будет открываться модальное окно
		$this->category = $category;
	}

	/**
	 * метод удаления данных в таблице БД
	 */
	public function delete(Category $category) 
	{
		$category->delete();
	}


	/**
	 * метод вывода данных из таблицы БД
	 */
    public function render()
    {
		$categories = Category::orderBy('created_at','DESC')->paginate(4);           // получаем из БД список всех категорий
        return view('livewire.categories', [
			'categories' => $categories
		]);
    }
}
