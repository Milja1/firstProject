<!-- шаблон ГЛАВНОЙ (входа) страницы -->

<!-- 
    из  шаблона Edica https://www.bootstrapdash.com/ копируем:
    - содержимое файла blog.html
    - папку 'assets' в папку 'publik' для подключения стилей
-->

<!-- 
    для корректной работы 'frontend' все ссылки на подключения 
    стилей 'href' и вставки 'src' оборачинваем в хелпер asset()
-->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>firstProject</title>
	<link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/loader.js') }}"></script>
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script defer src="https://code.jquery.com/jquery-3.6.4.js"
			integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
			crossorigin="anonymous"></script>
	<script src="{{ asset('js/addReview.js') }}"></script>

</head>

<body>
	<div class="edica-loader"></div>
	<header class="edica-header">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand" href="index.html"><img src="{{ asset('assets/images/logo.svg') }}" alt="Edica"></a>
				<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				{{-- кнопки переходов --}}
				<div class="collapse navbar-collapse" id="edicaMainNav">
					<ul class="navbar-nav mx-auto mt-2 mt-lg-0">

						<li class="nav-item">
							<a class="nav-link" href="{{ route('main.index') }}">{{ __('Блог') }}</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('category.index') }}">{{ __('Категории') }}</a>
						</li>

						@auth() {{-- если пользователь вошел то переводит в личный кабинет  --}}
						<li class="nav-item">
							<a class="nav-link" href="{{ route('personal.main.index') }}">{{ __('Личный кабинет') }}</a>
						</li>
						<li class="nav-item">							
								<a class="nav-link" href="{{ route('admin.main.index') }}">{{ __('Кабинет администратора') }}</a>
						</li>
						<li class="nav-item">
							<form action="{{ route('logout') }}" method="POST">
								@csrf
								<input class="btn btn-outline-primary" type="submit" value="{{ __('Выйти') }}">
							</form>
						</li>
						@endauth
						
						@guest {{-- если пользователь не вошел то переводит на панель входа  --}}
						<li class="nav-item">
							<a class="nav-link" href="{{ route('personal.main.index') }}">{{ __('Войти') }}</a>
						</li>
						@endguest
					</ul>

				</div>
			</nav>
		</div>
	</header>

	@yield('content') <!-- расширение из resources\views\main\index.blade.php -->

	<footer class="py-3 border-top text-center">

		{{-- вывод информации на всех или нескольких страницах  --}}
		{{-- © {{ config('app.name') }} {{ date('Y') }} стандартный вариант копирайта --}}
		FOOTER
		{{-- © {{ config('app.name') }} {{ $date }} (вывод даты через переменную осуществляется через -app\Providers\AppServiceProvider.php-) --}}

	</footer>


	<script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<script>
		AOS.init({
			duration: 1000
		});
	</script>
</body>

</html>