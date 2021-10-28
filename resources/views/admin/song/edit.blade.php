@extends('layouts.admin')
@section('content')

<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('') }}dist/img/songLogo.jpg" alt="AdminLTELogo" height="60"
            width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admin.includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Изменить песню</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <a class="btn btn-primary float-right" href="{{ route('song.index') }}" role="button">Список
                            песен</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ route('song.update', $song)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="songCreate">Название песни</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="songCreate"
                                        placeholder="Введите название песни" value="{{ $song->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCat3">Текст песни</label>
                                    <textarea name="text" rows="5"
                                        class="form-control @error('content') is-invalid @enderror" id="songTextInput"
                                        placeholder="Введите текст песни">{{ $song->text }}</textarea>
                                    <p>Никаких табов, только пробелы, после набора текста в ворде открываем простой
                                        текстовый редактор и форматируем там пробелы между аккордами</p>
                                    <p>В строке с аккордами не должно быть никаких лишних символов!</p>
                                    <p>Вот так вот не надо!!! <br><span style="color:red;">кода: Am F C G 2 раза</span>
                                    </p>
                                    <p>Надо вот так!!! <br><span style="color:green;">кода: 2 раза<br>Am F C G </span>
                                    </p>

                                </div>
                                <div class="form-group">
                                    <label for="tags">Тональность</label>
                                    <select class="select2" id="tonica" name="tonica"
                                        data-placeholder="Выбрать тональность" style="width: 100%;">
                                        <option value="A" @if ($song->tonica === 'A') selected @endif>A</option>
                                        <option value="Bb" @if ($song->tonica === 'Bb') selected @endif>Bb</option>
                                        <option value="B" @if ($song->tonica === 'B') selected @endif>B</option>
                                        <option value="C" @if ($song->tonica === 'C') selected @endif>C</option>
                                        <option value="C#" @if ($song->tonica === 'C#') selected @endif>C#</option>
                                        <option value="D" @if ($song->tonica === 'D') selected @endif>D</option>
                                        <option value="Eb" @if ($song->tonica === 'Eb') selected @endif>Eb</option>
                                        <option value="E" @if ($song->tonica === 'E') selected @endif>E</option>
                                        <option value="F" @if ($song->tonica === 'F') selected @endif>F</option>
                                        <option value="F#" @if ($song->tonica === 'F#') selected @endif>F#</option>
                                        <option value="G" @if ($song->tonica === 'G') selected @endif>G</option>
                                        <option value="G#" @if ($song->tonica === 'G#') selected @endif>G#</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCat3">Описание песни</label>
                                    <textarea name="description" rows="5"
                                        class="form-control @error('content') is-invalid @enderror"
                                        id="exampleInputCat3"
                                        placeholder="Введите описание песни">{{ $song->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="songCreate">dpm</label>
                                    <input type="text" name="dpm"
                                        class="form-control @error('dpm') is-invalid @enderror" id="songCreate"
                                        placeholder="Введите dpm песни" value="{{ $song->dpm }}">
                                </div>
                                <div class="form-group">
                                    <label for="songCreate">Размер</label>
                                    <input type="text" name="size"
                                        class="form-control @error('size') is-invalid @enderror" id="songCreate"
                                        placeholder="Введите размер песни" value="{{ $song->size }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCat3">Форма песни</label>
                                    <textarea name="form" rows="5"
                                        class="form-control @error('form') is-invalid @enderror" id="exampleInputCat3"
                                        placeholder="Введите форму песни">{{ $song->form }}</textarea>
                                </div>
                                <!-- <div class="form-group">
                      <label for="songCreate">Оригинал песни</label>
                      <input type="text" name="original_song"
                            class="form-control @error('original_song') is-invalid @enderror"
                            id="songCreate"
                            placeholder="Введите размер песни"
                            value="{{ old('original_song') }}">
                  </div> -->
                                <!-- <div class="form-group">
                                    <label for="exampleInputCat3">Комментарии к песне</label>
                                    <textarea name="description" rows="5"
                                        class="form-control @error('description') is-invalid @enderror"
                                        id="exampleInputCat3"
                                        placeholder="Введите описание песни">{{ old('description') }}</textarea>
                                </div>
                            </div> -->
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>SongBase</strong>
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
@endsection
