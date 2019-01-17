@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 login_card">
            <img src="{{ asset('img/alif_logo.svg') }}" class="logo" alt="logo">
            <div class="login">
                <h2 class="text-center">Войти</h2>
                <hr>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input id="login" type="text" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" name="login" value="{{ old('login') }}" required autofocus placeholder="{{ __('Логин') }}">

                        @if ($errors->has('login'))
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('login') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ __('Пароль') }}">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-check">
                        <div>
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Запомнить меня') }}
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block btn-success">
                        {{ __('Войти') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
