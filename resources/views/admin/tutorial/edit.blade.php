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
                        <h1 class="m-0">Редактировать туториал</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <a class="btn btn-primary float-right" href="{{ route('tutorial.index') }}" role="button">Список
                            туториалов</a>
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
                        <form method="post" action="{{ route('tutorial.update', $tutorial)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tutorialCreate">Название туториала</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="tutorialCreate"
                                        placeholder="Введите название туториала" value="{{ $tutorial->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="song_id">Песня</label>
                                    <select class="form-control" id="song_id" name="song_id">
                                        @foreach($songs as $id => $title)
                                        <option value="{{$id}}" @if ($tutorial->song_id == $id) selected @endif>
                                            {{$title}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tutorialCreate">Ссылка на туториал</label>
                                    <input type="text" name="link"
                                        class="form-control @error('link') is-invalid @enderror" id="tutorialCreate"
                                        placeholder="Ссылка с ютуба на туториал" value="{{ $tutorial->link }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCat3">Описание туториала</label>
                                    <textarea name="description" rows="5"
                                        class="form-control @error('description') is-invalid @enderror" id="exampleInputCat3"
                                        placeholder="Введите описание">{{ $tutorial->description }}</textarea>
                                </div>
                            </div>

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
@section('scriptBottom')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });

</script>
@endsection
