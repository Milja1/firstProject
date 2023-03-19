<!-- расширение в шаблон страницы "просмотр коментариев к поста" личного кабинета resources\views\admin\layouts\main.blade.php -->

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
            		<h1 class="m-0">{{ __('Комментарии') }}</h1>
          		</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item active">{{ __('Комментарии') }}</li>
					</ol>
          		</div>
        	</div>
      	</div>
    </div>
    
    <section class="content">
    <div class="container-fluid">
        <div class="row">

		<div class="col-6">
				<div class="card">
					<div class="card-body table-responsive p-0">

						<table class="table table-hover text-nowrap col-12">
						<thead>
							<tr>
								<th>ID</th>
								<th>{{ __('Название') }}</th>
								<th colspan="2" class="text-center">{{ __('Действия') }}</th>
							</tr>
						</thead>
						<tbody>
							@foreach($comments as $comment)
							<tr>
								<td>{{ $comment->id }}</td>
								<td>{{ $comment->message }}</td>
								<td>                     
									<a href="{{ route('personal.comment.edit', $comment->id) }}" class="btn btn-block btn-outline-success btn-sm w-60">
										<i class="fas fa-pen-nib"></i>
										{{ __('Редактирование') }}                     
									</a>
								</td>							
								
								<td>
									<form action="{{ route('personal.comment.delete', $comment->id) }}" method="POST">
									@csrf
									@method('DELETE') <!-- т.к. метод передачи запроса не GET и не POST -->
										<button type="submit" class="btn btn-block btn-outline-danger btn-sm">
											<i class="fas fa-trash"></i>
											{{ __('Удаление') }}
										</button>  
									</form>   								
								</td>
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