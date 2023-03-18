<!-- расширение 'Редактирование ПОЛЬЗОВАТЕЛЯ' в шаблон страницы (входа) административной панели resources\views\admin\layouts\main.blade.php -->

@extends('admin.layouts.main') <!-- подключение к странице шаблона -->

@section('content') <!-- вставка в страницу шаблона -->
    
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          	<div class="row mb-2">
            	<div class="col-sm-6">
              		<h1 class="m-0">{{ __('Редактирование пользователя') }}</h1>
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
                 	<form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="w-25">
                 	@csrf
				  	@method('PATCH') {{-- т.к. метод передачи запроса не GET и не POST --}}

						{{-- поле имя пользователя --}}                    
						<div class="form-group">
							<input type="text" class="form-control" name="name" placeholder="{{ __('Введите имя пользователя') }}" value="{{ $user->name }}">
							@error('name')
								<div class="text-danger">
									{{ $message }}
								</div>                          
							@enderror
						</div>

						{{-- поле email пользователя --}}  
						<div class="form-group">
							<input type="text" class="form-control" name="email" placeholder="{{ __('Введите адресс электронной почты') }}" value="{{ $user->email }}">                        
							@error('email')
								<div class="text-danger">
									{{ $message }}
								</div>                          
							@enderror
						</div>

						{{-- кнопка --}}
                    	<input type="submit" class=" btn btn-info" value="{{ __('Обновить') }}">

                 	</form>
              	</div>
          	</div>
        </div>
    </section>
</div>

@endsection