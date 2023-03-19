<!-- расширение 'Добавление КАТЕГОРИЙ' в шаблон страницы (входа) административной панели resources\views\admin\layouts\main.blade.php -->href

@extends('admin.layouts.main') <!-- подключение к странице шаблона -->

@section('content') <!-- вставка в страницу шаблона -->

<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">{{ __('Добавление категорий') }}</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">{{ __('Главная') }}</a></li>
						<li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">{{ __('Категории') }}</a></li>
						<li class="breadcrumb-item active">{{ __('Добавление категорий') }}</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<form action="{{ route('admin.category.store') }}" method="POST" class="w-25">
						@csrf
						<div class="form-group">
							<input type="text" class="form-control" name="title" placeholder="{{ __('Введите название категории') }}">

							<!-- при ошибке в валидации-->
							@error('title')
							<div class="text-danger">
								{{ $message }}
							</div>
							@enderror

						</div>
						<input type="submit" class=" btn btn-info" value="{{ __('Добавить') }}">
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection