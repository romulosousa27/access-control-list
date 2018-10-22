@extends('auth.templates.template')

@section('content-form')
<form class="login form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
    @csrf

    <div class="form-group row">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
    </div>

    <div class="form-group row">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
    </div>

    <div class="form-group row mb-0">
            <button type="submit" class="btn btn-login">
                {{ __('Login') }}
            </button>

            <div class="form-group text-right">
                <a class="btn btn-link recuperar" href="{{ route('password.request') }}">
                    {{ __('Recuperar Senha?') }}
                </a>
			</div>
    </div>
</form>
@endsection
