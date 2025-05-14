<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

<!-- Google Font: Roboto -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">

<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

<!-- JQVMap -->
<link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css') }}">

<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

<!-- Daterangepicker -->
<link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">

<!-- Summernote -->
<link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.min.css') }}">

<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">

    <style>
      .custom-sidebar {
        background-color: #34396D;
      }
    
      .custom-sidebar .nav-link,
      .custom-sidebar .brand-link,
      .custom-sidebar .user-panel a {
        color: #ffffff;
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 15px;
      }
    
      .custom-sidebar .nav-icon {
        color: #ffffff;
      }
    
      .custom-sidebar .nav-link.active {
        background-color: #2c3160;
        color: #ffffff;
      }
    
      .sidebar-logo-wrapper {
        text-align: center;
        padding: 20px 10px 10px 10px;
      }
    
      .sidebar-logo-wrapper img {
        height: 70px;
        margin: 0 auto 10px auto;
        display: block;
        max-width: 100%; /* tambahkan ini */
        object-fit: contain; /* jaga rasio gambar */
      }
    
      .sidebar-title {
        font-size: 16px;
        font-weight: 700;
        color: #fff;
        text-align: center;
        line-height: 1.4;
        word-break: break-word;
        white-space: normal; /* penting: izinkan pindah baris */
      }

    </style>

    <style>
      body {
        background-color: #EFF0F3 !important;
      }

      .content-wrapper, .main-footer, .main-header {
        background-color: #EFF0F3 !important;
      }

      .navbar {
        background-color: #ffffff !important;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); /* bayangan lembut ke bawah */
        z-index: 1030; /* pastikan di atas konten */
      }

    </style>

  <style>
    .img-size-32 {
      border-radius: 50%;
      object-fit: cover;
    }
  </style>


    


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars"></i>
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
      </li>
    </ul>
  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#" role="button">
          <img src="{{ asset('lte/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-32 img-circle mr-2" style="height:32px; width:32px; object-fit:cover;">
          <span class="text-dark">Yusra Yusuf</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="#">
            <i class="fas fa-user mr-2"></i> Lihat Profil
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>
        </div>
        
      </li>
    </ul>
  </nav>
  





<!-- Main Sidebar Container -->
<aside class="main-sidebar custom-sidebar elevation-4">
  <!-- Brand Logo -->
<!-- Brand Logo -->
  <div class="sidebar-logo-wrapper">
    <img src="{{ asset('lte/dist/img/PoltekLogo.png') }}" alt="Poltek Logo">
    <div class="sidebar-title">
      Sistem Akreditasi Prodi SIB
    </div>
  </div>

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="{{ asset('lte/dist/img/PoltekLogo.png') }}" alt="PoltekLogo" height="70" width="70">
</div>


  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>Dashboard</p>
                    </a>
                  </li>
     
        <!-- USER -->
        <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>User</p>
            </a>
        </li>

            <!-- USER -->
            <li class="nav-item">
              <a href="{{ route('level.index') }}" class="nav-link {{ request()->routeIs('level.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>Level</p>
              </a>
          </li>
  
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>


  <!-- Content Wrapper. Contains page content -->
@yield('content')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- ChartJS -->
<script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>

<!-- Sparkline -->
<script src="{{ asset('lte/plugins/sparklines/sparkline.js') }}"></script>

<!-- JQVMap -->
<script src="{{ asset('lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

<!-- jQuery Knob Chart -->
<script src="{{ asset('lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

<!-- Daterangepicker -->
<script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Summernote -->
<script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>

<!-- overlayScrollbars -->
<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>

<!-- AdminLTE dashboard demo -->
<script src="{{ asset('lte/dist/js/pages/dashboard.js') }}"></script>

</body>
</html>
