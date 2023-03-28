{{-- ____ блок комментариев ____ страницы просмотра поста--}}

{{-- блок просмотра комментариев --}}

<section class="comment-list mb-5">
	<h2 class="section-title mb-5" data-aos="fade-up">{{ __('Комментарии') }} ({{ $post->comments->count() }})</h2>
	@foreach($post->comments as $comment)
	<div class="comment-text mb-3">
		<span>
			<div> 
			<p class="fw-bold"> {{ $comment->user->name }} </p>
		</div>
		</span>
		{{ $comment->message }}
		{{-- добавление времени поста атрибут создан в app\Models\Comment.php --}}
		<div><span class="text-muted float-right">{{ $comment->dateAsCarbon->diffForHumans() }}</span></div> 
	</div>
	@endforeach
</section>

{{-- блок добавления комментариев --}}
@auth() {{-- увидят форму только авторизованные пользователи --}}
<section class="comment-section">
	<h2 class="section-title mb-5" data-aos="fade-up">{{ __('Оставить комментарий') }}</h2>
	<form action="{{ route('post.comment.store', $post->id) }}" method="post">   
		@csrf
		<div class="row">
			<div class="form-group col-12" data-aos="fade-up">
				<label for="comment" class="sr-only"></label>
<!--				
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            	<input type="hidden" name="postt_id" id="post_id" value="{{ $post->id }}">
-->
				<textarea name="message" id="add_comment" class="form-control" placeholder="{{ __('Ваш комментарий') }}" rows="10"></textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-12" data-aos="fade-up">
				<input type="submit" id="" class="btn btn-warning btn-sm" value="{{ __('Добавить') }}">
			</div>
		</div>
	</form>
</section>
@endauth