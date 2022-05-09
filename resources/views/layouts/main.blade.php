<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/js/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="/styles/main.css">
    <title>{{$title}}</title>
</head>

<body>
<div id="particles-js" style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;z-index: -2"></div>

<section class="setka">
    <header>
        <a href="/login">Авторизация</a><a href="/register">Регистрация</a>
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
    </header>

    @yield('content')

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <div class="footer__animation">
        <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_wyzwc4m4.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player>
    </div>

    <div class="telegram__wrapper">
        <div style='background-size:103%;margin-right: 15px;background-image: url("/images/icons/balaklava.jpg")' class="telegram__icon"></div>
        <div class="telegram__text">
            <span style="font-size: 22px">Уголовный майнинг</span>
            <span style="color: #656e7f">1049 Подписчиков</span>
        </div>
        <div style='margin-left: 15px;background-image: url("/images/icons/telegram.png");background-size: 114%;background-position: -4px -4px;' class="telegram__icon"></div>
    </div>

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
</body>
</html>
