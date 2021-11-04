<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="yandex-verification" content="baaee974cc962430" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
    @yield('otherStyle')
    <title>Song Base</title>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode
                .insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(86241966, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });

    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/86241966" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
</head>
@if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-unstyled">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session()->has('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<body>
    <div class="container-fluid">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <a class="navbar-brand" href="{{ route('mainPage') }}">Songsworship</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('mainPage') }}">Главная <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('allSongs') }}">Список песен</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        @hasanyrole('admin|writer')
                        <li class="nav-item mr-1 mb-2">
                            <a class="btn btn-outline-info" href="{{ route('adminIndex') }}">Админка</a>
                        </li>
                        @endhasanyrole
                        @guest
                        <li class="nav-item mr-1 mb-2">
                            <a href="{{ route('login') }}" class="btn btn-outline-success">Войти</a>
                        </li>
                        <li class="nav-item mr-1 mb-2">
                            <a class="btn btn-outline-info" href="{{ route('register') }}">Регистрация</a>
                        </li>
                        @endguest

                        @auth
                        <li class="nav-item mr-1 mb-2">
                            <a class="btn btn-outline-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                Выйти из акккаунта
                            </a>
                        </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @endauth
                    </ul>

                    <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form> -->

                </div>
            </nav>
        </div>

    </div>
    @yield('content')

    <div class="container-fluid text-center mt-100">
        <div class="container">
            <footer class="blog-footer">
                <p>SongBase © 2021 - <?= date("Y") ?> Drumsid</p>
                <p>
                    <a href="#">Back to top</a>
                </p>
            </footer>
        </div>
    </div>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
  </script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- <script src="{{ asset('front/js/jquery.slim.min.js') }}" crossorigin="anonymous"></script> -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front/js/popper.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

    </script>
    @yield('otherScripts')
</body>

</html>
