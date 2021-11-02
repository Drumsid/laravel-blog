@extends('layouts.front')
@section('transposeStyle')
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
                </section>
                <!-- /.content -->
            </div>

        </div>
    </div>
</div>

@endsection

@section('transpose')
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
