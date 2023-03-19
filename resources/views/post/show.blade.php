<!-- расширение для ГЛАВНОй страницы (входа) сайта -->

<!-- 
    для корректной работы 'frontend' все ссылки на подключения 
    стилей 'href' и вставки 'src' оборачинваем в хелпер asset()
-->

@extends('layouts.main') <!-- подключение к странице шаблона -->

@section('content') <!-- расширение в страницу шаблона -->


<main class="blog-post">
	<div class="container">
		<h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
		{{-- переформартирование даты (подключение для перевода на RU в app\Providers\AppServiceProvider.php) --}}
		<p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
			{{ $date->year }} {{ $date->translatedFormat('F')}} {{ $date->day }} ~ {{ $post->comments->count() }} {{ __('комментариев') }}
		</p>

		{{-- блок основного изображения --}}
		<section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
			<img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-100">
		</section>

		{{-- блок контента --}}
		<section class="post-content">
			<div class="row">
				<div class="col-lg-9 mx-auto">
					{!! $post->content !!}
				</div>
			</div>
		</section>

		<div class="row">
			<div class="col-lg-9 mx-auto">

				{{-- блок схожие посты --}}
				<section class="related-posts">
					<h2 class="section-title mb-4" data-aos="fade-up">{{ __('Схожие посты') }}</h2>
					<div class="row">
						@foreach($relatedPosts as $relatedPost)
						<div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
							<img src="{{ asset('storage/' . $relatedPost->preview_image) }}" alt="related post" class="post-thumbnail">
							<p class="post-category">{{ $relatedPost->category->title }}</p>
							<a href="{{ route('post.show', $relatedPost->id ) }}">
								<h5 class="post-title">{{ $relatedPost->title }}</h5>
							</a>
						</div>
						@endforeach
					</div>
				</section>

				{{-- блок комментариев --}}
				<section class="comment-list mb-5">
                    <h2 class="section-title mb-5" data-aos="fade-up">{{ __('Комментарии') }} ({{ $post->comments->count() }})</h2>
                        @foreach($post->comments as $comment)
                            <div class="comment-text mb-3" >
                                <span class="username">
                                    <div> {{ $comment->user->name }} </div>
									{{-- добавление срока поста атрибут создан в app\Models\Comment.php --}}
                                    <span class="text-muted float-right">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                                </span>
                                {{ $comment->message }}
                            </div>
                        @endforeach                        
                </section>

				@auth() {{-- увидят форм тольк оавторизованные пользователи --}}
					
			
				{{-- блок добавления комментариев --}}
                <section class="comment-section">
                    <h2 class="section-title mb-5" data-aos="fade-up">{{ __('Отправить комментарий') }}</h2>
                    <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                    @csrf
                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
								<label for="comment" class="sr-only"></label>
								<textarea name="message" id="comment" class="form-control" placeholder="{{ __('Ваш комментарий') }}" rows="10"></textarea>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" class="btn btn-warning btn-sm" value="{{ __('Добавить') }}" >
                                </div>
                            </div>
                        </form>
                </section>
				@endauth
				
			</div>
		</div>
	</div>
</main>

@endsection