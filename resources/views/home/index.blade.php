@extends('layouts.main')

@section('content')
<main>

    <section class="course">
        <div class="course__intro">
            <div class="course__header">
                <h2 class="article__main__title course__title">🔥 Полный курс по криптовалютам, майнингу и цифровой безопасности</h2>
                <span style="margin-top: 20px;display: block;">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                          <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                        </svg>
                        10 Уроков
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                      <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                    </svg>
                    2 Часа
                </span>
            </div>

            <a href="/course" class="course__info__more course__price">
                300р
            </a>
        </div>

        <div class="course__untro">
            <div class="cross"></div>
            <div class="price"></div>
        </div>
    </section>

    <div class="articles__list">
        @foreach($posts as $key => $post)
            <a href="/article/{{$post->url}}" class="article">
                <div class="article__image__wrap">
                    <img class="article__face__image" src="/images/posts/{{$post->id}}/{{$post->img}}" alt="Обложка">
                </div>

                <div class="article__description">
                    <span>{{$post->title}}</span>
                </div>
            </a>
        @endforeach
    </div>

    {{$posts->links('pagination.classic')}}

</main>
@endsection
