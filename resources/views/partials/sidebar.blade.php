 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('AdminLTE-3.2.0')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Pelelangan</span>Online
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

        </div>
        <div class="info">
          {{-- @if (Auth::user()->role == 'administrator')
          <div class="text-bg-light">Menu Admin</div>
          @endif
          @if (Auth::user()->role == 'petugas')
          Menu Petugas
          @endif
          @if (Auth::user()->role == 'masyarakat')
          Menu Masyarakat
          @endif --}}

        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          <li class="nav-header">LELANG</li>
        @if (Auth::user()->level == 'admin')
          <li class="nav-item">
            <a href="{{ route('admin.petugas.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Petugas
              </p>
            </a>
          </li>
          @endif

          @if (Auth::user()->level == 'admin')
          <li class="nav-item">
            <a href="{{ route('admin.barang.index') }}" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Barang
              </p>
            </a>
          </li>
          @endif

          @if (Auth::user()->level == 'petugas')
          <li class="nav-item">
            <a href="{{ route('petugas.barang.index') }}" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Barang
              </p>
            </a>
          </li>
          @endif

          @if (Auth::user()->level == 'admin')
          <li class="nav-item">
            <a href="{{ route('admin.lelang.index') }}" class="nav-link">
              <i class="nav-icon fas fa-cart-arrow-down"></i>
              <p>
                Pelelangan
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
