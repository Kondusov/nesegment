
<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @php
            $data['userName'] = auth()->user()->name;
          @endphp
          <a href="{{ route('personal.main.index') }}" class="d-block">{{ $data['userName'] }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          
               <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Все лоты
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('post.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Активные лоты</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('post.arhiv.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Архивные лоты</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('my.posts') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Мои лоты
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('personal.post.index') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Мои лоты (управление)
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('my.commenting.posts') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Мои заявки
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('personal.post.create') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Создать лот
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>