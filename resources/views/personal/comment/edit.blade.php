<!-- расширение в шаблон страницы "редактирование коментариев к поста" личного кабинета resources\views\admin\layouts\main.blade.php -->

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
			<div class="col-12">
                  <form action="{{ route('personal.comment.update', $comment->id) }}" method="POST" class="w-50">
                  @csrf
				  @method('PATCH') <!-- т.к. метод передачи запроса не GET и не POST -->
                    <div class="form-group">
						<textarea class="form-control" name="message" cols="30" rows="10">{{ $comment->message }}</textarea>                                               

                        @error('message')
                            <div class="text-danger">
                                {{ $message }}
                            </div>                          
                        @enderror

                    </div>
                    <input type="submit" class=" btn btn-info" value="{{ __('Обновить') }}">
                 </form>
              </div>
			</div>

			
        </div>
    </div>
    </section>
</div>

@endsection