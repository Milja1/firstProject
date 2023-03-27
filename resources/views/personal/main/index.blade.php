<!-- расширение в шаблон страницы (входа) личного кабинета resources\views\admin\layouts\main.blade.php -->

<!-- 
    для корректной работы 'frontend' все ссылки на подключения 
    стилей 'href' и вставки 'src' оборачинваем в хелпер asset()
-->


@extends('personal.layouts.main') {{-- подключение к странице шаблона --}}

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

			{{-- блок 'Понравившиеся посты' --}}
          	<div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
              		<div class="inner">
					  	<h3>{{ $countLikes }}</h3> {{-- количество из app\Http\Controllers\Personal\MainController.php --}}
                		<p>{{ __('Понравившиеся посты') }}</p>
              		</div>
					<div class="icon">
						<i class="nav-icon far fa-heart"></i>
					</div>
              		<a href="{{ route('personal.liked.index') }}" class="small-box-footer">{{ __('подробнее') }} <i class="fas fa-arrow-circle-right"></i></a>
            	</div>
          	</div>

			{{-- блок 'Комментарии' --}}
          	<div class="col-lg-3 col-6">
                <div class="small-box bg-secondary">
              		<div class="inner">
					  	<h3>{{ $countComments }}</h3> {{-- app\Http\Controllers\Personal\MainController.php --}}
                		<p>{{ __('Комментарии') }}</p>
              		</div>
              		<div class="icon">
					  	<i class="nav-icon far fa-comment"></i>
              		</div>
              		<a href="{{route('personal.comment.index') }}" class="small-box-footer">{{ __('подробнее') }} <i class="fas fa-arrow-circle-right"></i></a>
            	</div>
          	</div>

			
        </div>
    </div>
    </section>
</div>

@endsection