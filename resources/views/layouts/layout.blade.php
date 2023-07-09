<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PETIR Express</title>

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}"
      alt="Image"
      style="max-width: 300px"
    />
    <!-- Theme style -->
    <link
      rel="stylesheet"
      href="{{ asset('lte/dist/css/adminlte.min.css') }}"
    />
    <!-- Chart style -->
    <link rel="stylesheet" href="{{ asset('css/Chart.min.css') }}">
    

  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"
              ><i class="fas fa-bars"></i
            ></a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-light elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
          <span class="brand-text font-weight-bold">PETIR Express</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="row user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <div class="image">
              <img
                src="{{ asset('images/user.png') }}"
                class="img-circle"
                alt="User Image"
              />
            </div>
            
            <div class="col pt-3">
              <p class="mr-3">{{ Auth::user()->name }} </p>
            </div>

            <div class="col d-block">
                <a data-widget="logout" href="{{ route('logout') }}" role="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
                </form>
            </div>
            </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul
              class="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false"
            >
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item menu-open">
                  <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">
                    <i class="fas fa-chart-line" style="width: 32px"></i>
                      <p>Dashboard</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('pengiriman.index') }}" class="nav-link">
                    <i class="fas fa-truck" style="width: 32px"></i>
                      <p>Pengiriman</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="fas fa-cube" style="width: 32px"></i>
                      <p>Barang</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="fas fa-map-marker-alt" style="width: 32px"></i>
                      <p>Lokasi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="fas fa-users" style="width: 32px"></i>
                      <p>Kurir</p>
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

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              
              @yield('content')

            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">Rahmat Raditya - 411201054</div>
        <!-- Default to the left -->
        <strong>UAS Web Fullstack</strong>
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Chart -->
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
    @yield('custom-page-script')
  </body>
</html>
