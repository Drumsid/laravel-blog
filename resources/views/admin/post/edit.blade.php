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
            <h1 class="m-0">Изменить статью</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <a class="btn btn-primary float-right" href="{{ route('post.index') }}" role="button">Список статей</a>
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
          <form method="post" action="{{ route('post.update', $post)}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                  <div class="form-group">
                      <label for="postCreate">Название статьи</label>
                      <input type="text" name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            id="postCreate"
                            placeholder="Введите название статьи"
                            value="{{ $post->title }}">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputCat3">Контент</label>
                      <textarea name="content" rows="5"
                          class="form-control @error('content') is-invalid @enderror" id="exampleInputCat3"
                          placeholder="Введите описание Статьи">{{ $post->content }}</textarea>
                  </div>
                  <div class="form-group">
                      <label for="category_id">Категория</label>
                      <select class="form-control" id="category_id" name="category_id">
                        @foreach($categories as $id => $title)
                            <option @if ($id === $post->category_id) selected @endif
                            value="{{$id}}">{{$title}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="tags">Тэги</label>
                      <select class="select2" id="tags" name="tags[]" multiple="multiple"
                          data-placeholder="Выбрать тэги" style="width: 100%;">
                          @foreach($tags as $id => $title)
                              <option @if (in_array($id, $post->tags->pluck('id')->all())) selected @endif
                              value="{{$id}}">{{$title}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputFile">Картинка</label>
                      <div class="input-group">
                          <div class="custom-file">
                              <input type="file" name="thumbnail" class="custom-file-input" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                          </div>
                      </div>
                  </div>
                  <img src="{{ $post->getImage() }}" alt="" width="200" class="mt-2 img-thumbnail">
                  <div class="form-group">
                      <label for="exampleInputFile">Аудио</label>
                      <div class="input-group">
                          <div class="custom-file">
                              <input type="file" name="audio" class="custom-file-input" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                          </div>
                      </div>
                  </div>
                  @if ($post->getAudio())
                    <audio controls="controls" src="{{$post->getAudio()}}" ></audio>
                  @else
                    <p>no audio</p>
                  @endif
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