<!-- расширение 'просмотр одной КАТЕГОРИИ' в шаблон страницы (входа) административной панели resources\views\admin\layouts\main.blade.php -->

@extends('admin.layouts.main') <!-- подключение к странице шаблона -->

@section('content') <!-- вставка в страницу шаблона -->

<div class="content-wrapper">
	<div class="content-header">
    	<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6 d-flex">
					<h1 class="m-0 mr-2"> {{ $category->title }}</h1>
					<a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-block btn-success col-3">
						<i class="fas fa-pen-nib"></i>
						{{ __('Редактировать') }}                     
					</a>
					<form action="{{ route('admin.category.delete', $category->id) }}" method="POST">
					@csrf
					@method('DELETE') <!-- т.к. метод передачи запроса не GET и не POST -->
						<button type="submit" class="btn btn-block btn-danger">
							<i class="fas fa-trash"></i>
							{{ __('Удалить') }}
						</button>  
					</form>   	
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">{{ __('Главная') }}</a></li>
						<li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">{{ __('Категории') }}</a></li>
						<li class="breadcrumb-item active">{{ $category->title }}</li>
					</ol>
				</div>
			</div>
    	</div>
  	</div>

  	<section class="content">
		<div class="container-fluid">

			<!-- таблица -->
			<div class="row">
				<div class="col-6">
					<div class="card">
						<div class="card-body table-responsive p-0">

							<table class="table table-hover text-nowrap col-10">
								<tbody>
									<tr>
										<td>ID</td>
										<td>{{ $category->id }}</td>
									<tr>										
									</tr>	
										<td>{{ __('Название') }}</td>
										<td>{{ $category->title }}</td>
									</tr>
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>

		</div>
  	</section>

</div>

@endsection