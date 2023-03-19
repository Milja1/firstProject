<!-- расширение для ГЛАВНОй страницы (входа) сайта -->

<!-- 
    для корректной работы 'frontend' все ссылки на подключения 
    стилей 'href' и вставки 'src' оборачинваем в хелпер asset()
-->

@extends('layouts.main') <!-- подключение к странице шаблона -->

@section('content') <!-- расширение в страницу шаблона -->

<main class="blog">
	<div class="container">
		<h1 class="edica-page-title" data-aos="fade-up">{{ __('Блог') }}</h1>

		{{-- все посты --}}
		<section class="featured-posts-section">
			<div class="row">
				@foreach($posts as $post)
				<div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
					<div class="blog-post-thumbnail-wrapper">
						<img src="{{ 'storage/' . $post->preview_image }}" alt="blog post">
					</div>
					<p class="blog-post-category">{{ $post->category->title }}</p>
					<a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
						<h6 class="blog-post-title">{{ $post->title }}</h6>
					</a>
				</div>
				@endforeach

				{{-- пагинация запускаем - php artisan vendor:publish --tag=laravel-pagination
				 			подключаем в - app\Providers\AppServiceProvider.php --}}
				<div class="row">
					<div class="mx-auto" style="margin-top: -100px;">
						{{ $posts->links() }}
					</div>
				</div>

			</div>
		</section>

		<div class="row">

			{{-- рандомные посты --}}
			<div class="col-md-8">
				<section>
					<div class="row blog-post-row">
						@foreach($randomPosts as $post)
						<div class="col-md-6 blog-post" data-aos="fade-up">
							<div class="blog-post-thumbnail-wrapper">
								<img src="{{ 'storage/' . $post->preview_image }}" alt="blog post">
							</div>
							<p class="blog-post-category">{{ $post->category->title }}</p>
							<a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
								<h6 class="blog-post-title">{{ $post->title }}</h6>
							</a>
						</div>
						@endforeach
					</div>
				</section>
			</div>

			{{-- популярные посты --}}
			<div class="col-md-4 sidebar" data-aos="fade-left">
				<div class="widget widget-post-list">
					<h5 class="widget-title">{{ ('Популярные посты') }}</h5>
					<ul class="post-list">
						@foreach($likedPosts as $post)
						<li class="post">
							<a href="{{ route('post.show', $post->id) }}" class="post-permalink media">
								<img src="{{ 'storage/' . $post->preview_image }}" alt="blog post">
								<div class="media-body">
									<h6 class="post-title">{{ $post->title }}</h6>
								</div>
							</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>

</main>

@endsection