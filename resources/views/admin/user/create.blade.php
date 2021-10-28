@extends('layouts.admin')
@section('content')
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('') }}dist/img/songLogo.jpg" alt="AdminLTELogo" height="60" width="60">
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
            <h1 class="m-0">Новый пользователь</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <a class="btn btn-primary float-right" href="{{ route('user.index') }}" role="button">Список пользователей</a>
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
          <form method="post" action="{{ route('user.store')}}">
              @csrf
              <div class="card-body">
                  <div class="form-group">
                      <label for="tagCreate">Имя</label>
                      <input type="text" name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            id="tagCreate"
                            placeholder="Введите название тега"
                            value="{{ old('name') }}">
                  </div>
                  <div class="form-group">
                      <label for="tagCreate">Email</label>
                      <input type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            id="tagCreate"
                            placeholder="Введите название тега"
                            value="{{ old('email') }}">
                  </div>
                  <div class="form-group">
                      <label for="tagCreate">Пароль</label>
                      <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="tagCreate"
                            placeholder="Введите название тега"
                            value="{{ old('password') }}">
                  </div>
                  <div class="form-group">
                      <label for="tagCreate">Подтверждение пароля</label>
                      <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="tagCreate"
                            placeholder="Введите название тега"
                            value="{{ old('password_confirmation') }}">
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