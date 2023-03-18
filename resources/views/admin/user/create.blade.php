<!-- расширение 'Добавление ПОЛЬЗОВАТЕЛЯ' в шаблон страницы (входа) административной панели resources\views\admin\layouts\main.blade.php -->

@extends('admin.layouts.main') <!-- подключение к странице шаблона -->

@section('content') <!-- вставка в страницу шаблона -->
    
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">{{ __('Добавление пользователя') }}</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <form action="{{ route('admin.user.store') }}" method="POST" class="w-25">
                  @csrf

                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="{{ __('Введите имя пользователя') }}">                        
                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>                          
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="{{ __('Введите адресс электронной почты') }}">                        
                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>                          
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="password" placeholder="{{ __('Введите пароль') }}">                        
                        @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>                          
                        @enderror
                    </div>

                    <input type="submit" class=" btn btn-info" value="{{ __('Добавить') }}">
                 </form>
              </div>
          </div>
        </div>
      </section>
</div>

@endsection