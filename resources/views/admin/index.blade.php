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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $originalSongCount }}</h3>

                <p>Оригиналы песен</p>
              </div>
              <div class="icon">
                <i class="fas fa-microphone"></i>
              </div>
              <a href="{{ route('originalsong.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $vocalCount }}</h3>

                <p>Партии вокала</p>
              </div>
              <div class="icon">
                <i class="fas fa-music"></i>
              </div>
              <a href="{{ route('vocal.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $songCount }}</h3>

                <p>Песни</p>
              </div>
              <div class="icon">
                <i class="fas fa-compact-disc"></i>
              </div>
              <a href="{{ route('song.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark text-white">
              <div class="inner">
                <h3>{{ $tutorialCount }}</h3>

                <p>Туториалы</p>
              </div>
              <div class="icon text-white-50">
                <i class="fas fa-book"></i>
              </div>
              <a href="{{ route('tutorial.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          @role('admin')
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $userCount }}</h3>

                <p>Пользователи</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="{{ route('user.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endrole
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        
        <!-- /.row (main row) -->
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