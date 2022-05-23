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
{{--<div id="particles-js" style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;z-index: -2"></div>--}}

<section class="setka">
    <header style="position: relative">
        <a class="authorize__icon" href="/login">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
        </a>
        <section class="header__group">
            <div class="header__left__section">
                <div>
                    <div class="footer__animation">
                        <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_wyzwc4m4.json"  background="transparent"  speed="1"  style="width: 270px; height: 270px;"  loop autoplay></lottie-player>
                    </div>

                    <a href="/" class="auth__logo">
                        DEMINER<span class="net">.NET</span>
                    </a>
                </div>
            </div>

            <ul class="header__menu">
                {{--                    <li class="logo">MINING.NET</li>--}}
                @foreach($rates as $token)
                    <li class="rate">
                        <div class="token__title">
                            <span>{{ $token->cryptocurrency }}</span>
                            <span>{{ $token->reduction }}</span>
                        </div>

                        <span class="token__price">${{ $token->reduction == 'TON' ? $token->rate : round($token->rate) }}</span>
                        <img class="token" src="{{ $token->icon }}" alt="{{ $token->cryptocurrency }}">
                    </li>
                @endforeach
            </ul>
        </section>
    </header>

    @yield('content')

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <div class="footer__animation" style="margin-right: 0">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_2xtrgx6x.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player>
{{--        <img src="/images/icons/bitcoin.png" class="bitcoin__png" alt="Биткоин">--}}
{{--        <img class="header__gpu" src="/images/backgrounds/gpu.png" alt="Видеокарта">--}}

{{--        <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_wyzwc4m4.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player>--}}
    </div>

    <a href="https://t.me/criminaling" target="_blank" class="telegram__wrapper">
        <div style='background-size:103%;margin-right: 15px;background-image: url("/images/icons/balaklava.jpg")' class="telegram__icon"></div>
        <div class="telegram__text">
            <span style="font-size: 22px">Уголовный майнинг</span>
            <span style="color: #656e7f">1049 Подписчиков</span>
        </div>
        <div style='margin-left: 15px;background-image: url("/images/icons/telegram.png");background-size: 114%;background-position: -4px -4px;' class="telegram__icon"></div>
    </a>
</section>

<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/js/particles/particles.min.js"></script>
<script type="text/javascript" src="/js/particles/demo/js/app.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function checkNeedCaptha() {
        // Аякс на проверку необходимости капчи и на редирект если уже товар оплачен
        var need = false;

        if(!need) {
            sweette();
        } else {
            alert('капча нужна');
            sweette();
        }
    }

    function sweette() {
        Swal.fire({
            title: 'Введите E-Mail',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            customClass: {
                input: 'auth__input',
            },
            confirmButtonText: 'Подтвердить',
            showLoaderOnConfirm: true,
            preConfirm: (login) => {
                var email = $('.swal2-input').val();
                if(validate(email)) {
                    $.ajax({
                        url: '{{ route('course') }}',
                        type: 'get',
                        data: {
                            email: email,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: (data) => {
                            document.location.href = data;
                        }
                    });
                }
            },
        });
    }

    function sweetError(text) {
        Swal.fire({
            title: text,
            icon: 'error',
            focusConfirm: false,
        })
    }

    function validateEmail(email) {
        var re = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
        return re.test(String(email).toLowerCase());
    }

    function validate(email) {
        if (validateEmail(email)) {
            return true;
        } else {
            sweetError('Не валидный E-Mail');
            return false;
        }
    }
</script>
<style>
    .swal2-popup {
        background-color: #212b3d !important;
    }

    .swal2-container {
        background: rgba(0,0,0,.8) !important;
    }

    .swal2-title {
        color: white !important;
    }

    .swal2-confirm {
        background-color: #6f7f95 !important;
        color: #171f2a !important;
        outline: none !important;
        font-size: 20px !important;
        padding: .375rem .75rem !important;
        width: 210px !important;
        height: 44px !important;
        transition: 0.15s;
        box-shadow: 0 0 5px black !important;
    }

    .swal2-confirm:hover {
        background-color: #0b5ed7 !important;
        color: #fff !important;
    }

</style>
{{--<script>--}}
{{--    particlesJS("particles-js", {--}}
{{--        "particles": {--}}
{{--            "number": {--}}
{{--                "value": 140,--}}
{{--                "density": {--}}
{{--                    "enable": true,--}}
{{--                    "value_area":1000--}}
{{--                }--}}
{{--            },--}}
{{--            "color": {--}}
{{--                "value": ["#656e7f"]--}}
{{--            },--}}

{{--            "shape": {--}}
{{--                "type": "circle",--}}
{{--                "stroke": {--}}
{{--                    "width": 0,--}}
{{--                    "color": "#fff"--}}
{{--                },--}}
{{--                "polygon": {--}}
{{--                    "nb_sides": 5--}}
{{--                },--}}
{{--                "image": {--}}
{{--                    "src": "img/github.svg",--}}
{{--                    "width": 100,--}}
{{--                    "height": 100--}}
{{--                }--}}
{{--            },--}}
{{--            "opacity": {--}}
{{--                "value": 0.6,--}}
{{--                "random": false,--}}
{{--                "anim": {--}}
{{--                    "enable": false,--}}
{{--                    "speed": 1,--}}
{{--                    "opacity_min": 0.1,--}}
{{--                    "sync": false--}}
{{--                }--}}
{{--            },--}}
{{--            "size": {--}}
{{--                "value": 2,--}}
{{--                "random": true,--}}
{{--                "anim": {--}}
{{--                    "enable": false,--}}
{{--                    "speed": 40,--}}
{{--                    "size_min": 0.1,--}}
{{--                    "sync": false--}}
{{--                }--}}
{{--            },--}}
{{--            "line_linked": {--}}
{{--                "enable": true,--}}
{{--                "distance": 120,--}}
{{--                "color": "#656e7f",--}}
{{--                "opacity": 0.4,--}}
{{--                "width": 1--}}
{{--            },--}}
{{--        },--}}
{{--        "interactivity": {--}}
{{--            "detect_on": "canvas",--}}
{{--            "events": {--}}
{{--                "onhover": {--}}
{{--                    "enable": true,--}}
{{--                    "mode": "grab"--}}
{{--                },--}}
{{--                "onclick": {--}}
{{--                    "enable": false--}}
{{--                },--}}
{{--                "resize": true--}}
{{--            },--}}
{{--            "modes": {--}}
{{--                "grab": {--}}
{{--                    "distance": 140,--}}
{{--                    "line_linked": {--}}
{{--                        "opacity": 1--}}
{{--                    }--}}
{{--                },--}}
{{--                "bubble": {--}}
{{--                    "distance": 400,--}}
{{--                    "size": 40,--}}
{{--                    "duration": 2,--}}
{{--                    "opacity": 8,--}}
{{--                    "speed": 3--}}
{{--                },--}}
{{--                "repulse": {--}}
{{--                    "distance": 200,--}}
{{--                    "duration": 0.4--}}
{{--                },--}}
{{--                "push": {--}}
{{--                    "particles_nb": 4--}}
{{--                },--}}
{{--                "remove": {--}}
{{--                    "particles_nb": 2--}}
{{--                }--}}
{{--            }--}}
{{--        },--}}
{{--        "retina_detect": true--}}
{{--    });--}}
{{--</script>--}}
</body>
</html>
