@extends('layouts.front')
@section('otherStyle')
<!-- transpose -->
<link rel="stylesheet" href="{{ asset('transpose/jquery.transposer.css') }}">
@endsection
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="wrapper mt-70">

            <style>
                .vocal-wrapp {
                    padding: 20px;
                }

                .vocal-wrapp p {
                    padding-left: 10px;
                    font-weight: bold;
                }

                .voice-form-wrap {
                    font-size: 16px;
                }

                .ritm-wrap {
                    padding: 20px;
                }

                .ritm-wrap p {
                    font-weight: bold;
                }

                .framewrap {
                    overflow: hidden;
                    position: relative;
                    width: 100%;
                }

                .framewrap::after {
                    padding-top: 56.25%;
                    display: block;
                    content: '';
                }

                .framewrap iframe {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                }

            </style>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header p-2 bg-white text-dark">
                                        <h2>{{ $song->title }}</h2>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <pre id="transpose">{{ $song->text }}</pre>
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <div class="card card-primary ">
                                    <div class="card-header bg-primary text-white">
                                        <h4 class="card-title">Оригинал песни</h4>
                                    </div>
                                    <div class="vocal-wrapp">

                                        @if ($song->originalSong)
                                        <p>{{ $song->originalSong->title }}</p>
                                        <audio controls="controls"
                                            src="{{ asset("uploads/{$song->originalSong->song_name}") }}"></audio>
                                        @else
                                        <p>Пока оригинала песни нет</p>
                                        @endif

                                    </div>


                                </div>

                                <div class="card card-primary">
                                    <div class="card-header  bg-primary text-white">
                                        <h4 class="card-title">Ритм и размер</h4>
                                    </div>
                                    <div class="ritm-wrap">
                                        <p>Ритм: {{ $song->dpm }} dpm</p>
                                        <p>Размер: {{ $song->size }}</p>
                                    </div>
                                </div>

                                <div class="card card-primary">
                                    <div class="card-header  bg-primary text-white">
                                        <h4 class="card-title">Вокальные партии</h4>
                                    </div>
                                    @forelse ($song->vocals as $vocal)
                                    <div class="vocal-wrapp">
                                        <p>{{ $vocal->title }}</p>
                                        <audio controls="controls" src="{{ asset("uploads/{$vocal->vocal}") }}"></audio>
                                    </div>
                                    <hr>
                                    @empty
                                    <div class="vocal-wrapp">
                                        <p>Партий еще нет</p>
                                    </div>
                                    @endforelse
                                </div>

                                <div class="card card-primary">
                                    <div class="card-header  bg-primary text-white">
                                        <h4 class="card-title">Форма песни</h4>
                                    </div>
                                    <!-- <h4>Форма песни</h4> -->
                                    <div class="voice-form-wrap">
                                        <pre>
                                            <p>{{ $song->form }}</p>
                                        </pre>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->

                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                    @if ($song->tutorials->count())
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="mb-4">Туториалы</h2>
                                <div id="accordion">
                                    @foreach ($song->tutorials as $tutorial)

                                    <div class="card">
                                        <div class="card-header" id="heading{{$tutorial->slug}}">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link text-dark" data-toggle="collapse"
                                                    data-target="#collapse{{$tutorial->slug}}" aria-expanded="true"
                                                    aria-controls="collapse{{$tutorial->slug}}">
                                                    {{ $tutorial->title }}
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapse{{$tutorial->slug}}" class="collapse"
                                            aria-labelledby="heading{{$tutorial->slug}}" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="row pt-3 pb-3">
                                                    <div class="col-sm-6 mb-4">
                                                        <div class="framewrap">
                                                            {!! $tutorial->iframe !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mb-4">
                                                        <div class="description-tutorial-wrap">
                                                            <h5>Описание Туториала, заметки и тп</h5>
                                                        </div>
                                                        <div class="p-3">
                                                            {{ $tutorial->description }}
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </section>
                <!-- /.content -->
            </div>

        </div>
    </div>
</div>

@endsection

@section('otherScripts')
<!-- transpose -->
<script src="{{ asset('transpose/jquery.transposer.js') }}"></script>
<script>
    $(function () {
        $("pre#transpose").transpose({
            key: '{{$song->tonica}}'
        });
    });

</script>
@endsection
