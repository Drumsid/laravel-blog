@extends('layouts.front')
@section('content')
    <section id="error-page">
        <div class="error-page-inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 mt-100">
                        <div class="text-center">
                        <h2 class="mb-3">Страница не найдена</h2>
                            <div class="bg-404">
                                <img src="{{ asset('front/images/errors/skripicnyj.jpg') }}" alt="">
                            </div>
                            <p class="mt-5">Страница, которую вы ищете, могла быть удалена, если ее название было изменено.</p>
                            <a href="{{ route('mainPage') }}" class="btn btn-error">Вернуться на главную</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection