<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- HTML Settings  -->
    <meta name="viewport" content="width=320, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta http-equiv="Content-Language" content="ru">
    <meta charset="utf8" />

    <!-- Page Settings  -->
    <title>ТК-999 | @yield('title')</title>

    <!-- CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/main.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/preloader.css') }}"/>
@yield('custom-css')

    <!-- JS Includes before  -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    @yield('custom-js-before')

</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-light" aria-label="Eighth navbar example">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">ТК-999</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('index') }}#schedule-section">Расписание</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Пассажирам</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Контакты</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    @yield('content')



<section id="footer-section">
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">© 2014-{{ date('Y') }} ИП Аднакулов Г.В.</p>
            <a href="/"
               class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none navbar-brand">
                TK-999
            </a>
            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="https://vk.com/zorgo" class="nav-link px-2  text-muted">Разработка: ZORGO</a></li>
            </ul>
            <p class="col-md-12 mb-0 text-muted"> Пассажирские перевозки.</p>
            <p class="col-md-12 mb-0 text-muted"> ОГРН 304860630800061 Лицензия АСС-86-154006 от 25.11.2014г.</p>
        </footer>
    </div>
</section>

<div class="preloader">
    <svg>
        <g>
            <path d="M 50,100 A 1,1 0 0 1 50,0"/>
        </g>
        <g>
            <path d="M 50,75 A 1,1 0 0 0 50,-25"/>
        </g>
        <defs>
            <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                <stop offset="0%" style="stop-color:#BFE2FF;stop-opacity:1" />
                <stop offset="100%" style="stop-color:#337AB7;stop-opacity:1" />
            </linearGradient>
        </defs>
    </svg>
</div>

<!-- Preloader  -->
<script>
    window.setTimeout(function() {
        document.querySelector('.preloader').classList.add("preloader-remove");
    }, 10000);
    window.onload = function() {
        document.querySelector('.preloader').classList.add("preloader-remove");
    };
</script>
<!-- JS Includes after  -->
<script src="{{ asset('assets/js/jquery.json.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
@yield('custom-js-after')
</body>
</html>
