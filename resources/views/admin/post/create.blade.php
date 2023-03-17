<!-- расширение 'Добавление ПОСТА' в шаблон страницы (входа) административной панели resources\views\admin\layouts\main.blade.php -->

@extends('admin.layouts.main') {{-- подключение к странице шаблона --}}

@section('content') {{-- вставка в страницу шаблона --}}

<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">{{ __('Добавление поста') }}</h1>
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
					<form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data"> {{-- enctype="multipart/form-data" прикрепление изображения в форме файла --}}
						@csrf
						<div class="form-group w-25">
							<input type="text" class="form-control" name="title" placeholder="{{ __('Введите название поста') }}" value="{{ old('title') }}"> {{-- полеостаетсязаполненнымприошибкевдругомполе --}}
							{{-- при ошибке в валидации --}}
							@error('title')
							<div class="text-danger">
								{{ __('Поле не заполнено либо заполнено неправильно') }}
							</div>
							@enderror
						</div>

						<div class="form-group">
							<textarea id="summernote" name="content">
							{{ old('content') }} {{-- поле остается заполненным при ошибке в другом поле --}}
							</textarea>
							{{-- при ошибке в валидации --}}
							@error('content')
							<div class="text-danger">
								{{ __('Поле не заполнено либо заполнено неправильно') }}
							</div>
							@enderror
						</div>

						<div class="form-group w-50">
							<label for="exampleInputFile">{{ __('Добавить изображение preview') }}</label>
							<div class="input-group">
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="preview_image">
									<label class="custom-file-label">{{ __('Выберите изображение') }}</label>
								</div>
								<div class="input-group-append">
									<span class="input-group-text">{{ __('Загрузить') }}</span>
								</div>
							</div>
							{{-- при ошибке в валидации --}}
							@error('preview_image')
							<div class="text-danger">
								{{ __('Поле не заполнено либо заполнено неправильно') }}
							</div>
							@enderror
						</div>

						<div class="form-group w-50">
							<label for="exampleInputFile">{{ __('Добавить главное изображение') }}</label>
							<div class="input-group">
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="main_image">
									<label class="custom-file-label">{{ __('Выберите изображение') }}</label>
								</div>
								<div class="input-group-append">
									<span class="input-group-text">{{ __('Загрузить') }}</span>
								</div>
							</div>
							{{-- при ошибке в валидации --}}
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
								<option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }} {{-- при редактировании формы будет показана предыдущая категорию  --}}>{{ $category->title }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<input type="submit" class=" btn btn-info" value="{{ __('Добавить') }}">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection