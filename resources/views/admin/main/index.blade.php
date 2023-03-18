<!-- расширение в шаблон страницы (входа) административной панели resources\views\admin\layouts\main.blade.php -->

<!-- 
    для корректной работы 'frontend' все ссылки на подключения 
    стилей 'href' и вставки 'src' оборачинваем в хелпер asset()
-->


@extends('admin.layouts.main') {{-- подключение к странице шаблона --}}

@section('content') {{-- вставка в страницу шаблона --}}
    
<div class="content-wrapper">
    <div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1 class="m-0">{{ __('Главная страница') }}</h1>
          		</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item active">{{ __('Главная') }}</li>
					</ol>
          		</div>
        	</div>
      	</div>
    </div>
    
    <section class="content">
    <div class="container-fluid">
        <div class="row">

			{{-- блок 'Пользователи' --}}
          	<div class="col-lg-3 col-6">
                <div class="small-box bg-info">
              		<div class="inner">
                		<h3>{{ $data['usersCount'] }}</h3> {{-- количество из app\Http\Controllers\Admin\MainController.php --}}
                		<p>{{ __('Пользователи') }}</p>
              		</div>
					<div class="icon">
						<i class="nav-icon fas fa-users"></i>
					</div>
              		<a href="{{ route('admin.user.index') }}" class="small-box-footer">{{ __('подробнее') }} <i class="fas fa-arrow-circle-right"></i></a>
           		 </div>
          	</div>

			{{-- блок 'Посты' --}}
          	<div class="col-lg-3 col-6">
                <div class="small-box bg-success">
              		<div class="inner">
					  	<h3>{{ $data['postsCount'] }}</h3> {{-- количество из app\Http\Controllers\Admin\MainController.php --}}
                		<p>{{ __('Посты') }}</p>
              		</div>
					<div class="icon">
						<i class="nav-icon fas fa-clipboard"></i>
					</div>
              		<a href="{{ route('admin.post.index') }}" class="small-box-footer">{{ __('подробнее') }} <i class="fas fa-arrow-circle-right"></i></a>
            	</div>
          	</div>

			{{-- блок 'Категории' --}}
          	<div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
              		<div class="inner">
					  	<h3>{{ $data['categoriesCount'] }}</h3> {{-- количество из app\Http\Controllers\Admin\MainController.php --}}
                		<p>{{ __('Категории') }}</p>
              		</div>
              		<div class="icon">
					  	<i class="nav-icon fas fa-list"></i>
              		</div>
              		<a href="{{ route('admin.category.index') }}" class="small-box-footer">{{ __('подробнее') }} <i class="fas fa-arrow-circle-right"></i></a>
            	</div>
          	</div>

			{{-- блок 'Теги' --}}
          	<div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
              		<div class="inner">
					  	<h3>{{ $data['tagsCount'] }}</h3> {{-- количество из app\Http\Controllers\Admin\MainController.php --}}
                		<p>{{ __('Теги') }}</p>
              		</div>
              		<div class="icon">
					  	<i class="nav-icon fas fa-tags"></i>
              		</div>
              		<a href="{{ route('admin.tag.index') }}" class="small-box-footer">{{ __('подробнее') }} <i class="fas fa-arrow-circle-right"></i></a>
            	</div>
          	</div>

        </div>
    </div>
    </section>
</div>

@endsection