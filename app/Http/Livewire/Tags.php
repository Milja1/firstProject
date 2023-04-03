<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * контроллер Livewire
 * создан:  php artisan make:livewire Tags
 */

class Tags extends Component
{
    use WithPagination; // пагинация Livewire - отобразилась не корректно
	
	public $tag;    // текущий тег на добавление или редактирование
	public $popUp = false; // условие открытия модального окна
	public $rules = [      // правила валидации
		'tag.title' => ['required', 'string', 'min:2'],
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

		$this->tag->save();

		$this->close();
	}

	/**
	 * метод добавления данных
	 */
	public function add() 
	{
		$this->popUp = true; // при вызове будет открываться модальное окно
		$this->tag = new Tag();
	}

	/**
	 * метод редактирования данных
	 */
	public function update(Tag $tag) 
	{
		$this->popUp = true; // при вызове будет открываться модальное окно
		$this->tag = $tag;
	}

	/**
	 * метод удаления данных в таблице БД
	 */
	public function delete(Tag $tag) 
	{
		$tag->delete();
	}


	/**
	 * метод вывода данных из таблицы БД
	 */
    public function render()
    {
		$tags = Tag::orderBy('created_at','DESC')->paginate(4);           // получаем из БД список всех категорий
        return view('livewire.tags', [
			'tags' => $tags
		]);
    }
}
