<!-- расширение 'просмотр списка ПОЛЬЗОВАТЕЛЕЙ' в шаблон страницы (входа) административной панели resources\views\admin\layouts\main.blade.php -->

@extends('admin.layouts.main') <!-- подключение к странице шаблона -->

@section('content') <!-- вставка в страницу шаблона -->

<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">{{ __('Пользователи') }}</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">{{ __('Главная') }}</a></li>
						<li class="breadcrumb-item active">{{ __('Пользователи') }}</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">

			<!-- кнопка -->
			<div class="row">
				<div class="col-1 mb-3">
					<a href="{{ route('admin.user.create') }}" class="btn btn-block btn-info">{{ __('Добавить') }}</a>
				</div>
			</div>

			<!-- таблица -->
			<div class="row">
				<div class="col-7">
					<div class="card">
						<div class="card-body table-responsive p-0">
							<div class="container">
								<table class="table table-hover text-nowrap col-12">
									<thead>
										<tr>
											<th>ID</th>
											<th>{{ __('Название') }}</th>
											<th colspan="3" class="text-center">{{ __('Действия') }}</th>
										</tr>
									</thead>
									<tbody>
										@foreach($users as $user)
										<tr>
											<div class="row justify-content-start">
												<td>{{ $user->id }}</td>
												<td>{{ $user->name }}</td>
											</div>

											<div class="row justify-content-end">
												<td class="col-2">
													<a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-block btn-outline-primary btn-sm w-40">
														<i class="far fa-eye"></i>
														{{ __('Просмотр') }}
												</td>
												<td class="col-2">
													<a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-block btn-outline-success btn-sm w-40">
														<i class="fas fa-pen-nib"></i>
														{{ __('Редактирование') }}
													</a>
												</td>
												<td class="col-2">
													<form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
														@csrf
														@method('DELETE') <!-- т.к. метод передачи запроса не GET и не POST -->
														<button type="submit" class="btn btn-block btn-outline-danger btn-sm w-40">
															<i class="fas fa-trash"></i>
															{{ __('Удаление') }}
														</button>
													</form>
												</td>
											</div>
										</tr>
										@endforeach
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