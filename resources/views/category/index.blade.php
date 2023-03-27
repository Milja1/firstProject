@extends('personal.layouts.main')

@section('content')

<main class="blog">
	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0"> {{ __('Категории') }}</h1>
					</div>
				</div>
			</div>
		</div>
		<section class="content">
			<div class="container-fluid">

				<!-- таблица -->
				<div class="row">
					<div class="col-4">
						<div class="card">
							<div class="card-body table-responsive p-0">

								<table class="table table-hover text-nowrap col-12">
									<thead>
										<tr>
											<th>ID</th>
											<th>{{ __('Название') }}</th>
											<th colspan="3" class="text-center">{{ __('Действия') }}</th>
										</tr>
									</thead>
									<tbody>
										@foreach($categories as $category)
										<tr>
											<td>{{ $category->id }}</td>
											<td>{{ $category->title }}</td>
											<td>
												<a href="{{ route('category.post.index', $category->id) }}" class="btn btn-block btn-outline-primary btn-sm"> <!-- можно  route('admin.post.show', $post->id) -->
													<i class="far fa-eye"></i>
													{{ __('Просмотр') }}
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
</main>
@endsection