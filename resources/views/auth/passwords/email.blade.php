@extends('layouts.app')

@section('content')
    <div>
        <a href="/" class="auth__logo">
            DEMINER<snap class="net">.NET</snap>
        </a>

        <main class="auth__block">
            <a href="{{ route('login') }}" class="btn btn-link auth__request" style="text-align: center">
                Назад
            </a>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

            <input id="email" type="email" class="auth__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-Mail" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <button type="submit" class="auth__submit btn btn-primary" style="margin-bottom: 10px">
                {{ __('Отправить ссылку') }}
            </button>
            </form>
        </main>
    </div>
@endsection
