@extends('layouts.admin')
@section('content')
<div class="wrapper">
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $song->title }}</h1>
          </div>
          <div class="col-sm-6">
          <a class="btn btn-primary float-right" href="{{ route('song.index') }}" role="button">Вернуться</a>
          </div><!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
              <h2>{{ $song->title }}</h2>
              </div><!-- /.card-header -->
              <div class="card-body">
                <pre>
                  <p>
                  {{ $song->text }}
                  </p>
                </pre>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-3">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Ритм и размер</h3>
                </div>
                <div class="ritm-wrap">
                  <p>Ритм: {{ $song->dpm }} dpm</p>
                  <p>Размер: {{ $song->size }}</p>
                </div>
              </div>

              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Вокальные партии</h3>
                </div>
                @forelse ($song->vocals as $vocal)
                <div class="vocal-wrapp">
                  <p>{{ $vocal->title }}</p>
                  <audio controls="controls" src="{{ asset("uploads/{$vocal->vocal}") }}" ></audio>
                </div>
                <hr>
                @empty
                  <p>Партий еще нет</p>
                @endforelse
              </div>

              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Форма песни</h3>
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