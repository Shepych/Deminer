@extends('layouts.app')


@section('content')
    <div>
        <a href="/" class="auth__logo">
            DEMINER<snap class="net">.NET</snap>
        </a>

        <main class="auth__block">
            <form class="authorize__form" method="POST" action="{{ route('login') }}">
                @csrf
                <input id="email" type="text" class="auth__input @error('name') is-invalid @enderror" name="name" value="{{ old('email') }}" placeholder="Логин" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="password" type="password" class="auth__input @error('password') is-invalid @enderror" name="password" required placeholder="••••••••" autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input style="display:none" class="form-check-input" type="checkbox" name="remember" id="remember" checked>

                <button type="submit" class="auth__submit btn btn-primary">
                    {{ __('Войти') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link auth__request" style="text-align: center" href="{{ route('password.request') }}">
                        {{ __('Забыл пароль') }}
                    </a>
                @endif
            </form>
        </main>
    </div>
@endsection
