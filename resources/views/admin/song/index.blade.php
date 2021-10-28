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
                        <h1 class="m-0">Песни</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <a class="btn btn-primary float-right" href="{{ route('song.create') }}" role="button">Добавить
                            песню</a>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Все песни</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="song-table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Название песни</th>
                                            <th>Текст</th>
                                            <!-- <th>Описание</th> -->
                                            <th>Тональность</th>
                                            <th>dpm</th>
                                            <th>Размер</th>
                                            <th>Форма</th>
                                            <th>Партии</th>
                                            <th>Оригинал песни</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($songs as $key => $song)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$song->title}}</td>
                                            <td>{{Str::limit($song->text, 20)}}</td>
                                            <!-- <td>{{$song->description}}</td> -->
                                            <td>{{$song->tonica}}</td>
                                            <td>{{$song->dpm}}</td>
                                            <td>{{$song->size}}</td>
                                            <td>{{Str::limit($song->form, 20)}}</td>
                                            <td>{{$song->vocals->pluck('title')->join(', ')}}</td>
                                            <td>{{$song->original_song}}</td>
                                            <td style="white-space: nowrap; width: 110px" >
                                                <a href="{{ route('song.edit', $song) }}"
                                                    class="btn btn-info btn-sm float-left mr-1"
                                                    title="Редактировать">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="{{ route('song.show', $song) }}"
                                                    class="btn btn-info btn-sm float-left mr-1"
                                                    title="Просмотр">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @role('admin')
                                                <form action="{{ route('song.destroy', $song) }}" method="post"
                                                    class="float-left" title="Удалить">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Подтвердите удаление')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                                @endrole

                                            </td>
                                        </tr>
                                        @empty
                                        <p>No songs</p>
                                        @endforelse

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>№</th>
                                            <th>Название песни</th>
                                            <th>Текст</th>
                                            <!-- <th>Описание</th> -->
                                            <th>Тональность</th>
                                            <th>dpm</th>
                                            <th>Размер</th>
                                            <th>Форма</th>
                                            <th>Партии</th>
                                            <th>Оригинал песни</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
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
