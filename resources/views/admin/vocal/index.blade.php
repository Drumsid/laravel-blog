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
                        <h1 class="m-0">Партии вокала</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <a class="btn btn-primary float-right" href="{{ route('vocal.create') }}" role="button">Добавить
                            партию</a>
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
                                <h3 class="card-title">Все партии вокала</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="vocal-table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Название партии</th>
                                            <th>Принадлежит песне</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($vocals as $key => $vocal)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$vocal->title}}</td>
                                            <td>{{$vocal->song->title}}</td>
                                            <td>
                                                <a href="{{ route('vocal.edit', $vocal) }}"
                                                    class="btn btn-info btn-sm float-left mr-1">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                @role('admin')
                                                <form action="{{ route('vocal.destroy', $vocal) }}" method="post"
                                                    class="float-left">
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
                                        <p>No vocals</p>
                                        @endforelse

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>№</th>
                                            <th>Название партии</th>
                                            <th>Принадлежит песне</th>
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
