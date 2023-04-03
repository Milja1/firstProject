{{-- расширение 'просмотр ПОЛЬЗОВАТЕЛЯ'в шаблон страницы административной панели resources\views\admin\layouts\main.blade.php --}}

@extends('admin.layouts.main') {{-- подключениекстраницешаблона --}}

@section('content') {{-- расширение шаблона страницы --}}

<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6 d-flex">
					<h1 class="m-0 mr-2"> {{ $user->name }}</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">{{ __('Главная') }}</a></li>
						<li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">{{ __('Пользователи') }}</a></li>
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
										<td>{{ $user->id }}</td>									
									</tr>
									<tr>
									<td>{{ __('Имя') }}</td>
									<td>{{ $user->name }}</td>
									</tr>
									<tr>
									<td>{{ __('Адрес электронной почты') }}</td>
									<td>{{ $user->email }}</td>
									</tr>
									<tr>
									<td>{{ __('Дата регистрации') }}</td>
									<td>{{ $user->created_at }}</td>
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