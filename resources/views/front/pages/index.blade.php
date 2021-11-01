@extends('layouts.front')
@section('content')
<section id="home-slider">
        <div class="container">
            <!-- <div class="row"> -->
            <div class="main-slider">
                <div class="slide-text">
                    <h1>Команда пролсавления</h1>
                    <p>Церкви Слово Жизни Долгопрудный. На этом ресурсе находятся тексты песен которые мы
                        используем на служениях. </p>
                    @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-success">Войти</a>
                    @endguest

                </div>
                <img src="{{ asset('front/images/home/slider/hill.png') }}"
                    class="slider-hill img-fluid animate__animated animate__fadeInLeftBig" alt="slider image">
                <img src="{{ asset('front/images/home/slider/house.png') }}"
                    class="slider-house img-fluid animate__animated animate__fadeInRightBig" alt="slider image">
                <img src="{{ asset('front/images/home/slider/sun.png') }}"
                    class="slider-sun img-fluid animate__animated animate__fadeInDownBig" alt="slider image">
                <img src="{{ asset('front/images/home/slider/birds1.png') }}"
                    class="slider-birds1 img-fluid animate__animated animate__fadeInBottomLeft" alt="slider image">
                <img src="{{ asset('front/images/home/slider/birds2.png') }}"
                    class="slider-birds2 img-fluid animate__animated animate__fadeInBottomRight" alt="slider image">
            </div>
            <!-- </div> -->
        </div>
        <!-- <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div> -->
    </section>
    <div class="container-fluid mt-70 card-primer">
        <div class="container">
            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    <img class="rounded-circle rounded-width" src="{{ asset('front/images/home/chords.jpg') }}"
                        alt="Generic placeholder image" width="140" height="140">
                    <h2>Тексты песен с аккордами</h2>
                    <p>Мы разместили песни в алфавитном порядке. Каждый текст песни можно транспонировать в нужную
                        тональность.
                    </p>
                    <p><a class="btn btn-secondary" href="#" role="button">Смотреть</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle rounded-width" src="{{ asset('front/images/home/vocal.jpg') }}"
                        alt="Generic placeholder image" width="140" height="140">
                    <h2>Партии песен</h2>
                    <p>Так же к тексту песни можно привязать вокальные партии и прослушать перед подготовкой к служению
                    </p>
                    <p><a class="btn btn-secondary" href="#" role="button">Смотреть</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle rounded-width" src="{{ asset('front/images/home/temp.jpg') }}"
                        alt="Generic placeholder image" width="140" height="140">
                    <h2>Темп, размер, форма песни</h2>
                    <p>Есть возможность привязать к тексту темп песни, размер песни, форму песни (последовательность) и
                        даже
                        прикрепить туториал (в разработке).</p>
                    <p><a class="btn btn-secondary" href="#" role="button">Смотреть</a></p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div>
    </div>
    <div class="container-fluid mt-70 ">
        <div class="container">
            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Неемия 9:6</h2>
                    <p class="lead">Ты, Господи, един, Ты создал небо, небеса небес и всё воинство их, землю и всё, что
                        на ней,
                        моря и всё, что в них, и Ты живишь всё сие, и небесные воинства Тебе поклоняются.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" src="{{ asset('front/images/home/sunshine2.jpg') }}"
                        alt="Generic placeholder image">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Псалом 44:12</span></h2>
                    <p class="lead">И возжелает Царь красоты твоей; ибо Он Господь Твой, и ты поклонись Ему.

                    </p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="featurette-image img-fluid mx-auto" src="{{ asset('front/images/home/worship1.jpg') }}"
                        alt="Generic placeholder image">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Лука 4:8</h2>
                    <p class="lead">Господу Богу твоему поклоняйся, и Ему одному служи.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" src="{{ asset('front/images/home/worship3.jpg') }}"
                        alt="Generic placeholder image">
                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->
        </div>
    </div>

    <div class="container-fluid mt-70">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="row featurette text-center">
                    <div class="col-md-12">
                        <img class="featurette-image img-fluid mx-auto" src="{{ asset('front/images/home/bible.jpg') }}"
                            alt="Generic placeholder image">
                    </div>
                    <div class="col-md-12">
                        <p class="lead mt-3">Если вы хотите узнать о поклонении, то познакомьтесь с Тем, кто его создал!
                        </p>

                        <p class="lead">Есть много способов поклоняться, но в конечном итоге это означает признание
                            того, что есть
                            что-то большее, чем вы. Поклонники - это те, кто скажет вам, что верят не только в себя.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-70">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-sm-8">
                    <h2>Форма обратной связи</h2>
                    <p>Пожелания, предложения, отзывы</p>
                    <form>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Имя</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" placeholder="Имя">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Сообщение</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection