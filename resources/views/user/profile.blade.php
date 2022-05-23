@extends('layouts.app')

@section('content')
    <main class="dashboard">
        <a href="/" class="auth__logo">
            DEMINER<span class="net">.NET</span>
        </a>

        <section class="user__card">
            Карточка пользователя
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @role('admin')
            <span style="color:red">ADMIN</span> <br>
            <a style="color:red" target="_blank" href="/admin/panel">Админка</a>
            @endrole

            @if(session('status'))

            @endif

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button>Выход</button>
            </form>
        </section>

        <section class="user__panel">
            <div class="user__settings">
                Настройки
            </div>

            <div class="user__check">
                Чек 300р
            </div>
        </section>
    </main>
@endsection
