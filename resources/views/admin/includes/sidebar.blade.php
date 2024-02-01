
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.main.index')}}" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">АДМИН</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <ul class=" pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      
    <li class="nav-item">
              <a href="{{route('main.index')}}" class="nav-link">
                <i class=" nav-icon fas fa-pager"></i>
                <p>
                  Сайт
                </p>
              </a>
          </li>
          
    <li class="nav-item">
              <a href="{{route('admin.user.index')}}" class="nav-link">
                <i class=" nav-icon fas fa-users"></i>
                <p>
                  Пользователи
                </p>
              </a>
          </li>
    
    <li class="nav-item">
              <a href="{{route('admin.proj.index')}}" class="nav-link">
                <i class=" nav-icon fas fa-project-diagram"></i>
                <p>
                  Проекты
                </p>
              </a>
          </li>

          <li class="nav-item">
              <a href="{{route('admin.category.index')}}" class="nav-link">
                <i class=" nav-icon fas fa-th-list"></i>
                <p>
                  Категории
                </p>
              </a>
          </li>

          <li class="nav-item">
                <a href="{{route('admin.tag.index')}}" class="nav-link">
                  <i class=" nav-icon fas fa-tags"></i>
                  <p>
                    Тэги
                  </p>
                </a>
          </li>
    </ul>
    </div>
    <!-- /.sidebar -->
  </aside>