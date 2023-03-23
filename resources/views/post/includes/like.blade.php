{{-- ____ блок лайков ____ страницы просмотра поста --}}

<section class="py-3">
	@auth() {{-- проверка авторизации пользователя --}}
	<form action="{{ route('post.like.store', $post->id) }}" method="post">
		@csrf
		{{-- количество лайков --}}
		<span>{{ $post->liked_users_count}}</span>
		<button type="submit" class="border-0 bg-transparent">
			{{-- проверка есть ли в списке пролайканых постов пользователя соответсвующий пост --}}
			@if(auth()->user()->likedPosts->contains($post->id))
			<i class="fas fa-heart"></i>
			@else
			<i class="far fa-heart"></i>
			@endif
		</button>
	</form>
	@endauth
	@guest {{-- проверка регистрации пользователя --}}
	<div>
		<span>{{ $post->liked_users_count}}</span> {{-- показывает только количество лайков --}}
		<i class="far fa-heart"></i>
	</div>
	@endguest
</section>