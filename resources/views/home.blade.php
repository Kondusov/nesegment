@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (auth())
                        <div class="alert alert-success" role="alert">
                            Поздравляем!<br>Регистрация прошла успешно.<br><a href="/">Перейти на Главную страницу</a>
                        </div>
                    @else

                    {{ __('You are logged in!') }}
                    <p>Проверьте почтовый ящик. Там ссылка для подтверждения вашей электронной почты.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
