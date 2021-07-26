<!-- Sidebar -->
<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('asset/dist/img/user8-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
          @if($menu == 'dashboard')
            <a href="/dashboard" class="nav-link active">
          @else
            <a href="/dashboard" class="nav-link">
          @endif
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
          @if($menu == 'user')
            <a href="/user" class="nav-link active">
          @else
            <a href="/user" class="nav-link">
          @endif
              <i class="nav-icon fas fa-user"></i>
              <p>
              User
              </p>
            </a>
          </li>

          <li class="nav-item">
          @if($menu == 'lhp')
            <a href="/lhp" class="nav-link active">
          @else
            <a href="/lhp" class="nav-link">
          @endif
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
              LHP
              </p>
            </a>
          </li>

          <li class="nav-item">
          @if($menu == 'temuan')
            <a href="/temuan" class="nav-link active">
          @else
            <a href="/temuan" class="nav-link">
          @endif
              <i class="nav-icon fas fa-search"></i>
              <p>
              Temuan
              </p>
            </a>
          </li>

          <li class="nav-item">
          @if($menu == 'cetak')
            <a href="/cetak" class="nav-link active">
          @else
            <a href="/cetak" class="nav-link">
          @endif
              <i class="nav-icon fas fa-print"></i>
              <p>
              Cetak
              </p>
            </a>
          </li>

          @can('update-role')
          <li class="nav-item">
            <a href="/cetak" class="nav-link">
          
              <i class="nav-icon fas fa-book"></i>
              <p>
              Update Role
              </p>
            </a>
          </li>
          @endcan
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->