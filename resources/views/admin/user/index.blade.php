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
                        <h1 class="m-0">Пользователи</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <!-- <a class="btn btn-primary float-right" href="{{ route('user.create') }}" role="button">Добавить
                            партию</a> -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 mb-2">
                        <div class="float-right">
                            <span>Роли:</span>
                            @foreach ($roles as $role )
                            <span class="badge badge-info">{{ $role }}</span>
                            @endforeach
                        </div>
                    </div><!-- /.col -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Все пользователи</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="user-table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Имя</th>
                                            <th>Роль</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $key => $user)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->roles->pluck('name')->join(', ')}}</td>
                                            <td>
                                                @role('admin')
                                                @if ($user->getRoleNames()->first() !== 'admin')
                                                <!-- <a title="Добавить роль writer" href=""
                                                    class="btn btn-info btn-sm float-left mr-1">
                                                    <i class="fas fa-feather-alt"></i>
                                                </a> -->
                                                

                                                <form action="{{ route('setWriter', $user->id) }}" method="post"
                                                    class="float-left mr-1" title="Установить роль writer">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning btn-sm"
                                                        onclick="return confirm('Подтвердите writer')">
                                                        <i class="fas fa-feather-alt"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('unsetWriter', $user->id) }}" method="post"
                                                    class="float-left mr-1" title="Удалить роль writer">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Подтвердите writer')">
                                                        <i class="fas fa-angry"></i>
                                                    </button>
                                                </form>
                                                                                                    

                                                <form action="{{ route('user.destroy', $user) }}" method="post"
                                                    class="float-left" title="Удалить пользователя навсегда">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Подтвердите удаление')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                                @endif
                                                @endrole

                                            </td>
                                        </tr>
                                        @empty
                                        <p>No users</p>
                                        @endforelse

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>№</th>
                                            <th>Имя</th>
                                            <th>Роль</th>
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
