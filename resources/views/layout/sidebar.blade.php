<!-- Sidebar -->
<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('asset/dist/img/default-user-imge.jpeg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$nama}}</a>
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

        @can('show-menu')
          @can('show-user')
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
          @endcan

          @can('show-user')
          <li class="nav-item">
          @if($menu == 'opd')
            <a href="/opd" class="nav-link active">
          @else
            <a href="/opd" class="nav-link">
          @endif
              <i class="nav-icon fas fa-file"></i>
              <p>
              OPD
              </p>
            </a>
          </li>
          @endcan

          @can('show-user')
          <li class="nav-item">
          @if($menu == 'tugas')
            <a href="/tugas" class="nav-link active">
          @else
            <a href="/tugas" class="nav-link">
          @endif
              <i class="nav-icon fas fa-file"></i>
              <p>
              Tugas SPT
              </p>
            </a>
          </li>
          @endcan

          @can('show-user')
          <li class="nav-item">
          @if($menu == 'jenis_pengawasan')
            <a href="/jenis_pengawasan" class="nav-link active">
          @else
            <a href="/jenis_pengawasan" class="nav-link">
          @endif
              <i class="nav-icon fas fa-file"></i>
              <p>
              Jenis Pengawasan
              </p>
            </a>
          </li>
          @endcan

          @can('show-user')
          <li class="nav-item">
          @if($menu == 'kategori_temuan')
            <a href="/kategori_temuan" class="nav-link active">
          @else
            <a href="/kategori_temuan" class="nav-link">
          @endif
              <i class="nav-icon fas fa-file"></i>
              <p>
              Kategori Temuan
              </p>
            </a>
          </li>
          @endcan

          @can('show-pegawai')
          <li class="nav-item">
          @if($menu == 'pegawai')
            <a href="/pegawai" class="nav-link active">
          @else
            <a href="/pegawai" class="nav-link">
          @endif
              <i class="nav-icon fas fa-users"></i>
              <p>
              Pegawai
              </p>
            </a>
          </li>
          @endcan

          @can('show-spt')
          <li class="nav-item">
          @if($menu == 'spt')
            <a href="/spt" class="nav-link active">
          @else
            <a href="/spt" class="nav-link">
          @endif
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>
              SPT
              </p>
            </a>
          </li>

          <li class="nav-item">
          @if($menu == 'penugasanspt')
            <a href="/penugasan_spt" class="nav-link active">
          @else
            <a href="/penugasan_spt" class="nav-link">
          @endif
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>
              Penugasan SPT
              </p>
            </a>
          </li>
          @endcan

          @can('show-lhp')
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
          @endcan

          @can('show-temuan')
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
          @endcan

          @can('show-cetak')
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
          @endcan

          <!-- @can('show-cetak') -->
          <li class="nav-item">
          @if($menu == 'dupak')
            <a href="/dupak" class="nav-link active">
          @else
            <a href="/dupak" class="nav-link">
          @endif
              <i class="nav-icon fas fa-print"></i>
              <p>
              Dupak
              </p>
            </a>
          </li>
          <!-- @endcan -->

          <!-- @can('show-cetak') -->
          <li class="nav-item">
          @if($menu == 'ppm')
            <a href="/ppm" class="nav-link active">
          @else
            <a href="/ppm" class="nav-link">
          @endif
              <i class="nav-icon fas fa-print"></i>
              <p>
              ppm
              </p>
            </a>
          </li>
          <!-- @endcan -->

          <!-- @can('update-role')
          <li class="nav-item">
            <a href="/validasi" class="nav-link">
          
              <i class="nav-icon fas fa-book"></i>
              <p>
              Update Role
              </p>
            </a>
          </li>
          @endcan -->

        @endcan
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->