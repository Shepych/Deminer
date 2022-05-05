<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/js/bootstrap-5.1.3-dist/css/bootstrap.css">
{{--    <link rel="stylesheet" href="/js/particles/demo/css/style.css">--}}
{{--    <script type="text/javascript" src="/js/particles/particles.js"></script>--}}
    <link rel="stylesheet" href="/styles/main.css">
    <title>Новости майнинга и криптовалют</title>
</head>

<body>
    <div id="particles-js" style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;z-index: -2"></div>

    <section class="setka">
        <header>
            <section class="header__group">
                <img class="header__gpu" src="/images/backgrounds/gpu.png" alt="Видеокарта">

                <ul class="header__menu">
{{--                    <li class="logo">MINING.NET</li>--}}
                    <li class="rate">
                        <div class="token__title">
                            <span>BITCOIN</span>
                            <span>BTC</span>
                        </div>

                        <span class="token__price">$40.000</span>
                        <img class="token" src="/images/tokens/bitcoin.svg.png" alt="Биткоин">
                    </li>
                    <li class="rate">
                        <div class="token__title">
                            <span>ETHEREUM</span>
                            <span>ETH</span>
                        </div>

                        <span class="token__price">$3.000</span>
                        <img class="token" src="/images/tokens/eth.png" alt="Эфириум">
                    </li>
                    <li class="rate">
                        <div class="token__title">
                            <span>TONCOIN</span>
                            <span>TON</span>
                        </div>

                        <span class="token__price">$2</span>
                        <img class="token" src="/images/tokens/ton.jpg" alt="Тон">
                    </li>
                </ul>
            </section>

            <section class="course">
                <div class="course__intro">
                    <div class="course__header">
                        <h2>🔥 Полный курс по криптовалютам и цифровой экономике 🔥</h2>
                        <span style="display: flex;justify-content: center;align-items: center">
                            <svg style="margin-right: 6px" xmlns="http://www.w3.org/2000/svg" width="22" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                              <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                            </svg>
                            10 Уроков

                            <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                              <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                            </svg>
                            3 Часа
                        </span>
                    </div>
                    <p>
                        Этот платный курс - ваша инвестиция в знания и информацию.
                        По прохождению которого вы узнаете абсолютно всё что нужно
                        знать, чтобы сделать комплексный вывод стоит ли заниматься
                        майнингом, инвестировать ли в цифровые активы, каковы
                        риски и перспективы глубоководного мира криптовалюты, и что чёрт возьми здесь вообще происходит ?!
                        В 21 веке на пороге цифровой экономики совершенно
                        невыгодно быть дураком: держаться за прошлое и мыслить
                        предвзято - что всё это один большой мыльный пузырь (пирамида) …
                        Но это будущее и оно уже настало!
                        Необразованность и нежелание разобраться с криптовалютами
                        раз и навсегда - порождает невежество, а так же упущенные возможности.

                    </p>
                </div>

                <div class="course__untro">
                    <div class="cross"></div>
                    <div class="price"></div>
                </div>
            </section>
        </header>

        <main>

            @for($i = 1; $i < 5; $i++)
                <div class="article">
                    <div class="article__image__wrap">
                        <img class="article__face__image" src="/images/posts/{{$i}}.jpg" alt="">
                    </div>

                    <div class="article__description">
                        <span>🔴  Биржа OKX стала официальным партнером команды McLaren Racing</span>
{{--                        <p>Здесь абсолютно комфортно вы можете генерировать тексты---}}
{{--                            «рыбы» для решения задач в области макетирования.</p>--}}
                    </div>
                </div>
            @endfor

            <div class="pagination">
                @for($i = 1; $i < 6; $i++)
                    <div class="pagination__item">{{$i}}</div>
                @endfor
            </div>
        </main>

        <footer>

        </footer>
    </section>

    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/particles/particles.min.js"></script>
    <script type="text/javascript" src="/js/particles/demo/js/app.js"></script>
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 140,
                    "density": {
                        "enable": true,
                        "value_area":1000
                    }
                },
                "color": {
                    "value": ["#656e7f"]
                },

                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#fff"
                    },
                    "polygon": {
                        "nb_sides": 5
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 0.6,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 2,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 120,
                    "color": "#656e7f",
                    "opacity": 0.4,
                    "width": 1
                },
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "grab"
                    },
                    "onclick": {
                        "enable": false
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 140,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
    </script>
{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            alert(8800);--}}
{{--        });--}}
{{--    </script>--}}
</body>
</html>
