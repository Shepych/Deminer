@php($unlock = 0)
@if(Auth::user() !== null)
    @if(Auth::user()->payment_status == true)
        @php($unlock = 1)
    @endif
@endif

@extends('layouts.main')

@section('content')
{{--    {{ dd(auth()->user()->payment_status) }}--}}
    <section class="course" style="margin-top:20px">
        @if(session('success'))
            <div style="color: red;font-size:20px">
                Спасибо за покупку
            </div>
        @endif
        <div class="course__intro">
            <div class="course__header">
                <h2 style="cursor:default" class="article__main__title course__title">🔥 Полный курс по криптовалютам, майнингу и цифровой безопасности</h2>
                <span style="margin-top: 20px;display: block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                      <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                    </svg>
                    9 Уроков

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                      <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                    </svg>
                    1 Час
                </span>
            </div>

            @if(auth()->user())
                @if(auth()->user()->payment_status)
                    <div class="course__info__more paid__button" style="cursor: default">
                        300р
                    </div>
                @else
                    <div onclick="checkNeedCaptha()" class="course__info__more course__price course__button__hover">
                        300р
                    </div>
                @endif
            @else
                <div onclick="checkNeedCaptha()" class="course__info__more course__price course__button__hover">
                    300р
                </div>
            @endif

        </div>

        <p class="course__introduction">
            Этот платный курс - ваша инвестиция в знания и информацию.
            По прохождению которого вы узнаете абсолютно всё что нужно
            знать, чтобы сделать комплексный вывод: стоит ли заниматься
            майнингом, инвестировать ли в цифровые активы, каковы
            риски и перспективы глубоководного мира криптовалют.

            <br><br>

            В 21 веке на пороге цифровой экономики совершенно
            невыгодно быть дураком: держаться за прошлое и мыслить
            предвзято - что всё это один большой мыльный пузырь …
            Это будущее и оно уже наступило!
            Нежелание разобраться с криптовалютами
            раз и навсегда - порождает необразованность, невежество, а так же упущенные возможности.
            Купи ты биткоин 6 лет назад, ты бы сейчас стал сказочно богат, а что если я скажу тебе что ещё не поздно его покупать даже за <strong style="color:limegreen">$30.000</strong> ? Тебе нужно лишь разобраться что к чему, зачем и как!

            <br><br>

            Как выйти на пассивный доход с криптовалютами, как сохранить капитал в кризис, а может быть и преумножить -
            всё это ты найдешь в нашем курсе.

            Мы занимаемся майнингом, инвестируем в криптовалюту, и мы расскажем тебе почему упала вся крипта, о чём молчат
            майнеры и кто такие биткоины.

            <br>
        </p>
    </section>

    <div class="example">
        @foreach($lessons as $item)
        <a @if($unlock)href="/lesson/{{ $item->id }}"@else onclick="sweetError('Курс не оплачен')"@endif class="lesson__item">
            <div>
                <span class="number__lesson">Урок {{ $item->number }}</span><span class="title__lesson">@if($unlock || $item->id == 1 || $item->id == 9 || $item->id == 5){{ $item->title }}@else <div class="title__locked"></div> @endif</span>
            </div>
            <div class="time__lesson">{{ $item->timer }}</div>
        </a>
        @endforeach
    </div>

    <div class="pagination" style="margin-top: 20px">
        <a href="/" class="pagination__item">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
            </svg>
        </a>
    </div>
@endsection
