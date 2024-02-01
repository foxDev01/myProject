
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="http://127.0.0.1:8000/proj" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ЛК</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <ul class=" pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    @if(auth()->user()->role === '0')
                             <li class="nav-item">
                                 <a href="{{route('admin.main.index')}}" class="nav-link">
                                  <i class="nav-icon fas fa-user-shield"></i>
                                    <p>
                                      Панель администратора
                                    </p>
                                  </a>
                              </li>
                        @endif
            <li class="nav-item">
              <a href="{{route('main.index')}}" class="nav-link">
                <i class=" nav-icon fas fa-pager"></i>
                <p>
                  Сайт
                </p>
              </a>
          </li>

          <li class="nav-item">
              <a href="{{route('personal.liked.index')}}" class="nav-link">
                <i class=" nav-icon fas fa-heart"></i>
                <p>
                  Мои лайки
                </p>
              </a>
          </li>
    

          <li class="nav-item">
              <a href="{{route('personal.comment.index')}}" class="nav-link">
                <i class=" nav-icon fas fa-comment"></i>
                <p>
                  Коментарии
                </p>
              </a>
          </li>

         
    </ul>
    </div>
    <!-- /.sidebar -->
  </aside>