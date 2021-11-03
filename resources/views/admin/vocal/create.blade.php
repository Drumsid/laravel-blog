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
                        <h1 class="m-0">Новая вокальная партия</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <a class="btn btn-primary float-right" href="{{ route('vocal.index') }}" role="button">Список
                            партий</a>
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
                        <form method="post" action="{{ route('vocal.store')}}" enctype="multipart/form-data">
                            @csrf
                            <p>Добавляйте партии очень внимательно т.к. редактировать их сложнее. Сложность в том что
                                при
                                редактировании, файл который был прикреплен при создании, будет
                                отсутствовать в форме правки, как будто его нет ,
                                хотя под полем ввода файла, будет видно, что файл есть. Но на самом деле его нужно
                                добавить в любом случае повторно. Это из за безопасности, и ничего пока с этим поделать
                                нельзя. Иногда даже проще просто удалить партию вокала и создать новую чем изменить
                                существующую
                            </p>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="vocalCreate">Название партии</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="vocalCreate"
                                        placeholder="Введите название статьи" value="{{ old('title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Песня</label>
                                    <select class="form-control" id="song_id" name="song_id">
                                        @foreach($songs as $id => $title)
                                        <option value="{{$id}}" @if (old('song_id')==$id) selected @endif>
                                            {{$title}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Аудио партия</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="vocal" class="custom-file-input"
                                                id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Выберите
                                                файл</label>
                                        </div>
                                    </div>
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
