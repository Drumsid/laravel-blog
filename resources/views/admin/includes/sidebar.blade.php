<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('adminIndex') }}" class="brand-link">
      <img src="{{ asset('') }}dist/img/songLogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Song Base</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('') }}dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">A</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item nav-opening">
            <a href="#" class="nav-link nav-isactive">
              <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
              <i class="nav-icon far fa-list-alt"></i>
              <p>
                Категории
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right">{{ $categoryCount }}</span>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Список категорий</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Добавить категорию</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-opening">
                  <a href="#" class="nav-link nav-isactive">
                    <i class="nav-icon far fa-list-alt"></i>
                    <p>
                      Тэги
                      <i class="right fas fa-angle-left"></i>
                      <span class="badge badge-info right">{{ $tagCount }}</span>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                      <a href="{{ route('tag.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Список тэгов</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('tag.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Добавить тэг</p>
                      </a>
                    </li>
                  </ul>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>