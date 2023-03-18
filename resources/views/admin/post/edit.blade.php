<!-- расширение 'Редактирование ПОСТА' в шаблон страницы (входа) административной панели resources\views\admin\layouts\main.blade.php -->

@extends('admin.layouts.main') {{-- подключение к странице шаблона --}}

@section('content') {{-- вставка в страницу шаблона --}}
    
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          	<div class="row mb-2">
            	<div class="col-sm-6">
              		<h1 class="m-0">{{ __('Редактирование поста') }}</h1>
            	</div>
            	<div class="col-sm-6">
              		<ol class="breadcrumb float-sm-right">
                		<li class="breadcrumb-item"><a href="#">Home</a></li>
                		<li class="breadcrumb-item active">Dashboard v1</li>
              		</ol>
            	</div>
          	</div>
        </div>
    </div>

    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data"> {{-- enctype - при работе с файлами --}}
                @csrf
				@method('PATCH') {{-- т.к. метод передачи запроса не GET и не POST --}}

					{{-- выбор названия --}}
				  	<div class="form-group w-25">
						<input type="text" class="form-control" name="title" placeholder="{{ __('Введите название поста') }}" value="{{ $post->title }}">
						@error('title')
						<div class="text-danger">
							{{ __('Поле не заполнено либо заполнено неправильно') }}
						</div>
						@enderror
					</div>

					{{-- выбор контента --}}
					<div class="form-group">
						<textarea id="summernote" name="content">{{ $post->content }}</textarea>
						@error('content')
						<div class="text-danger">
							{{ __('Поле не заполнено либо заполнено неправильно') }}
						</div>
						@enderror
					</div>

					{{-- выбор изображения preview --}}
					<div class="form-group w-50">
						<label for="exampleInputFile">{{ __('Добавить изображение preview') }}</label>
						<div class="col-2 mb-1">
							{{-- предварительное изображение --}}
							{{-- командой php artisan storage:link создаем символические ссылки настроенные для приложения от storage\app\images на public\storage  --}}
							<img src="{{ url('storage/' . $post->preview_image) }}" alt="preview_image" class="w-50"> {{-- предварительное изображение --}}
						</div>
							<div class="input-group">
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="preview_image">
									<label class="custom-file-label">{{ __('Выберите изображение') }}</label>
								</div>
								<div class="input-group-append">
									<span class="input-group-text">{{ __('Загрузить') }}</span>
								</div>
							</div>
						@error('preview_image')
							<div class="text-danger">
								{{ __('Поле не заполнено либо заполнено неправильно') }}
							</div>
						@enderror
					</div>

					{{-- выбор главного изображения --}}
					<div class="form-group w-50">
						<label for="exampleInputFile">{{ __('Добавить главное изображение') }}</label>
						<div class="col-4 mb-1">
							{{-- предварительное изображение --}}
							{{-- командой php artisan storage:link создаем символические ссылки настроенные для приложения от storage\app\images на public\storage  --}}
							<img src="{{ url('storage/' . $post->main_image) }}" alt="main_image" class="w-50"> {{-- предварительное изображение --}}
						</div>
						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="main_image">
								<label class="custom-file-label">{{ __('Выберите изображение') }}</label>
							</div>
							<div class="input-group-append">
									<span class="input-group-text">{{ __('Загрузить') }}</span>
							</div>
						</div>
						@error('main_image')
							<div class="text-danger">
								{{ __('Поле не заполнено либо заполнено неправильно') }}
							</div>
						@enderror
					</div>

					{{-- выбор категорий --}}
					<div class="form-group w-50">
						<label>{{ __('Выберите категорию') }}</label>
						<select name="category_id" class="form-control">
							@foreach($categories as $category)
								{{-- при редактировании формы будет показана предыдущая категория  --}}
								<option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
							@endforeach
						</select>
					</div>

					{{-- выбор тегов --}}
					<div class="form-group">
						<label>{{ __('Теги') }}</label>
						<select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="{{ __('Выберите теги') }}" style="width: 100%;">
							@foreach($tags as $tag)
								{{-- при редактировании формы будут показаны предыдущие теги - функция pluck('id') - собирает 'id' тегов --}}									
								<option {{ is_array( $post->tags->pluck('id')->toArray() ) && in_array($tag->id, $post->tags->pluck('id')->toArray() ) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
							@endforeach									
						</select>
					</div>

					<div class="form-group">
						<input type="submit" class=" btn btn-info" value="{{ __('Обновить') }}">
					</div>
            	</form>
            </div>
        </div>
    </div>
    </section>
</div>

@endsection