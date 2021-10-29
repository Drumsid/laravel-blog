<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('adminIndex') }}" class="brand-link">
        <img src="{{ asset('') }}dist/img/songLogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
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
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>




        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @role('admin')
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
                        <i class="nav-icon fas fa-tags"></i>
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
                <li class="nav-item nav-opening">
                    <a href="#" class="nav-link nav-isactive">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Статьи
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-info right">{{ $postCount }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('post.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список статей</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('post.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить статью</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endrole

                <li class="nav-item nav-opening">
                    <a href="#" class="nav-link nav-isactive">
                        <i class="nav-icon fas fa-microphone"></i>
                        <p>
                            Оригиналы песен
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-info right">{{ $originalCount }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('originalsong.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список песен</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('originalsong.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить песню</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-opening">
                    <a href="#" class="nav-link nav-isactive">
                        <i class="nav-icon fas fa-microphone"></i>
                        <p>
                            Партии вокала
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-info right">{{ $vocalCount }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('vocal.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список партий</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('vocal.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить партию</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-opening">
                    <a href="#" class="nav-link nav-isactive">
                    <i class="nav-icon fas fa-compact-disc"></i>
                        <p>
                            Песни
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-info right">{{ $songCount }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('song.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список песен</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('song.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить песню</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @role('admin')
                <li class="nav-item nav-opening">
                    <a href="#" class="nav-link nav-isactive">
                    <i class="nav-icon fas fa-user"></i>
                        <p>
                            Пользователи
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-info right">{{ $userCount }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список пользователей</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить пользователя</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-opening">
                    <a href="#" class="nav-link nav-isactive">
                        <i class="nav-icon fas fa-check-circle"></i>
                        <p>
                            На одобрение
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-info right">{{ $pendingCount }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('song.pending') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список несен</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endrole
            </ul>
            <div class="fixed-bottom ml-2 mb-2" >
                <a class="btn btn-outline-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    Выйти из акккаунта
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
