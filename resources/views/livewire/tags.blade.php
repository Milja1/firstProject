{{-- компонент Livewire 
создан:  php artisan make:livewire Tags
--}}

<div x-data="{}">
	<section class="content">
		<div class="container-fluid">

			<div class="row">
				<div class="col-1 mb-3">
					<a wire:click="add" class="btn btn-block btn-info">{{ __('Добавить') }}</a>
				</div>
			</div>

			<div class="row">
				<div class="col-6">
					<div class="card">
						<div class="card-body table-responsive p-0">
							<div class="container">
								<table class="table table-hover text-nowrap col-12">
									<thead>
										<tr>
											<th>ID</th>
											<th>{{ __('Название') }}</th>
											<th colspan="3" class="text-center">{{ __('Действия') }}</th>
										</tr>
									</thead>
									<tbody>
										@foreach($tags as $item)
										<tr>
											<td>{{ $item->id }}</td>
											<td>{{ $item->title }}</td>
											<div class="row justify-content-end">
												<td class="col-2">
													<a wire:click="update({{ $item }})" class="btn btn-block btn-outline-success btn-sm w-40">
														<i class="fas fa-pen-nib"></i>
														{{ __('Редактировать') }}
													</a>
												</td>
												<td class="col-2">
													<a wire:click="delete({{ $item }})" class="btn btn-block btn-outline-danger btn-sm w-40">
														<i class="fas fa-trash"></i>
														{{ __('Удалить') }}
													</a>
												</td>
											</div>
										</tr>
										@endforeach
									</tbody>
								</table>
								{{ $tags->links() }}

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	@if($popUp)
	<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
		<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
		<div class="fixed inset-0 z-10 overflow-y-auto">
			<div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
				<div @click.away="$wire.close()" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
					<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
						<div class="sm:flex sm:items-start">
							<div class="mt-1 text-center sm:mt-0 sm:ml-4 sm:text-left">
								<h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
									{{ $tag->exists ? 'Редактировать название тега' : 'Добавить тег' }}
								</h3>
							</div>
						</div>
					</div>

					<form wire:submit.prevent="store" class="spase-y-5 p-2">
						<div class="row">
							<input wire:model.defer="tag.title" type="text" class="form-control" name="title" placeholder="{{ __('Введите название тега') }}">

							@error('tag.title')
							<div class="text-danger">
								{{ $message }}
							</div>
							@enderror

							<div class="px-2 py-2 sm:flex sm:flex-row-reverse sm:px-2">
								<button wire:click="close" type="button" class="ml-3 btn btn-outline-danger btn-sm">{{ __('Отменить') }}</button>
								<button type="submit" class="btn btn-outline-info btn-sm">{{ __('Сохранить') }}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endif

</div>