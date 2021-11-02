<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">

    <title>Song Base</title>
</head>

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
                            <a class="nav-link" href="#">Список песен</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        @hasanyrole('admin|writer')
                        <li class="nav-item mr-1">
                            <a class="btn btn-outline-info" href="{{ route('adminIndex') }}">Админка</a>
                        </li>
                        @endhasanyrole
                        @guest
                        <li class="nav-item mr-1">
                            <a href="{{ route('login') }}" class="btn btn-outline-success">Войти</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info" href="{{ route('register') }}">Регистрация</a>
                        </li>
                        @endguest

                        @auth
                        <a class="btn btn-outline-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            Выйти из акккаунта
                        </a>

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

    <div class="container-fluid text-center mt-70">
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

    <script src="{{ asset('front/js/jquery.slim.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('front/js/popper.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>

</body>

</html>
