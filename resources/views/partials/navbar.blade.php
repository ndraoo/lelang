  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('logout') }}" class="nav-link">Logout</a>
          </li>

    {{-- @if (Auth::user()->role == 'administrator')
                  <div class="text-bg-dark p-3">Menu Admin</div>
                  @endif
                  @if (Auth::user()->role == 'petugas')
                  Menu Petugas
                  @endif
                  @if (Auth::user()->role == 'masyarakat')
                  Menu Masyarakat
                  @endif --}}
    </ul>
</nav>
  <!-- /.navbar -->
