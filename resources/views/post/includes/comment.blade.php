{{-- ____ блок комментариев ____ страницы просмотра поста--}}

{{-- блок просмотра комментариев --}}

<section class="comment-list mb-5">

	<h2 class="section-title" data-aos="fade-up">{{ __('Комментарии') }} ({{ $post->comments->count() }})</h2>
	@foreach($post->comments as $comment)
	<div class="comment-text mb-1">
		<h5> {{ $comment->user->name }} </h5>
		{{-- добавление времени поста атрибут создан в app\Models\Comment.php --}}
		<span class="text-muted">{{ $comment->dateAsCarbon->diffForHumans() }} </span>
		<div>
			{{ $comment->message }}
		</div>
	</div>
	@endforeach
</section>
	
	<div id="comments" class="comment-text mb-3"></div>

{{-- блок добавления комментариев --}}
@auth() {{-- увидят форму только авторизованные пользователи --}}
<section class="comment-section">
	<h2 class="section-title mb-5" data-aos="fade-up">{{ __('Оставить комментарий') }}</h2>
	<div class="row">
		<div class="form-group col-12" data-aos="fade-up">
			<label for="comment" class="sr-only"></label>
			<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
			<input type="hidden" name="postt_id" id="post_id" value="{{ $post->id }}">
			<textarea name="message" id="message" class="form-control" placeholder="{{ __('Ваш комментарий') }}" rows="10"></textarea>
		</div>
	</div>
	<div class="row">
		<div class="col-12" data-aos="fade-up">
			<button id="add_comment" class="btn btn-warning btn-sm">{{ __('Добавить') }}</button>
		</div>
	</div>

</section>
@endauth