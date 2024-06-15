<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monitoring Tugas Akhir</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Manual CSS -->
  <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}"> -->
  <!-- Bootstrap 5 CSS -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- DataTables -->
  <!-- <link rel="stylesheet" href="{{ asset('plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap5.min.css') }}"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('assets/AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('assets/AdminLTE-3.2.0/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/AdminLTE-3.2.0/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets/AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css') }}">

</head>
<body class="hold-transition sidebar-mini">
<di5 class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    @if (session('success'))
      <div class="toast align-items-center text-white bg-success border-0 position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000" id="toast" style="opacity: 1;">
          <div class="d-flex">
              <div class="toast-body">
                  {{ session('success') }}
              </div>
              <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
      </div>
    @endif
    @if (session('error'))
      <div class="toast align-items-center text-white bg-danger border-0 position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000" id="toast" style="opacity: 1;">
          <div class="d-flex">
              <div class="toast-body">
                  {{ session('error') }}
              </div>
              <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
      </div>
    @endif
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" id="pushMenuIcon""><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">
        {{ request()->route()->getName() }}
        </a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> -->
      

      <!-- Messages Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="far fa-building"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <li><a href="#" class="dropdown-item">D3-A</a></li>
          <li><a href="#" class="dropdown-item">D3-B</a></li>
          <li><a href="#" class="dropdown-item">D4-A</a></li>
          <li><a href="#" class="dropdown-item">D4-B</a></li>
        </ul>
      </li> -->

      <!-- Notifications Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="far fa-chart-bar"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <li><a href="#" class="dropdown-item">Seminar 1</a></li>
          <li><a href="#" class="dropdown-item">Seminar 2</a></li>
          <li><a href="#" class="dropdown-item">Seminar 3</a></li>
          <li><a href="#" class="dropdown-item">Sidang</a></li>
        </ul>
      </li> -->

      <li class="nav-item dropdown dropstart">
        <div class="media user-panel d-flex" data-toggle="dropdown">
          <div class="image">
            <img src="{{ asset('assets/dist/img/user.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
          </div>
        </div>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <li class="dropdown-item">
            <div class="image text-center">
              <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
              <a href="#" class="d-block">{{auth()->user()->nomor_induk }}</a>
              <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
            <br>
            <br>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger ml-auto" style="color: white;">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center">
      <img id="polban-logo" src="{{ asset('assets/dist/img/polban.png') }}" alt="Polban Logo" style="width: 140px; height: auto;">
      <!-- <span class="brand-text font-weight-light">{{ $title ?? "monitoringta" }}</span> -->
    </a>
    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if (auth()->user()->role=="1" || auth()->user()->role == "2" || auth()->user()->role == "3")
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @endif
          @if (auth()->user()->role== "1" || auth()->user()->role == "2")
          <li class="nav-item">
            <a href="{{ route('kota') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                KoTA
                <!-- <span class="right badge badge-info">5</span> -->
              </p>
            </a>
          </li>
          @endif
          @if (auth()->user()->role == "1" ||  auth()->user()->role == "2" )
          <li class="nav-item">
            <a href="{{ route('timeline') }}" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Timeline
                <!-- <span class="right badge badge-success">Updated</span> -->
              </p>
            </a>
          </li>
          @endif
          @if (auth()->user()->role=="1")
          <li class="nav-item">
            <a href="{{ route('artefak') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Artefak
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @endif
          @if (auth()->user()->role == "3")
          <li class="nav-item">
            <a href="#artefakCollapse" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="artefakCollapse">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Artefak
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
            <div class="collapse" id="artefakCollapse">
              <ul class="list-unstyled">
                <li>
                  <a class="nav-link" href="{{ route('artefak') }}">
                    <i class="nav-icon fas fa-arrow"></i>
                    <p>FTA dan Dokumen</p>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="{{ route('resume') }}">
                      <i class="nav-icon fas fa-arrow"></i>
                    <p>Resume Bimbingan</p>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="#">
                    <i class="nav-icon fas fa-arrow"></i>
                    <p>Lain-lain</p>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          @endif
          @if (auth()->user()->role=="1")
          <li class="nav-item">
            <a href="{{ route('jadwal') }}" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Jadwal Penguji
                <!-- <span class="right badge badge-success">Updated</span> -->
              </p>
            </a>
          </li>
          @endif
          @if (auth()->user()->role == "3")
          <li class="nav-item">
            <a href="#jadwalCollapse" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="jadwalCollapse">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Jadwal
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
            <div class="collapse" id="jadwalCollapse">
              <ul class="list-unstyled">
                <li>
                  <a class="nav-link" href="{{ route('jadwal') }}">
                    <i class="nav-icon fas fa-arrow"></i>
                    <p>Jadwal Penguji</p>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="{{ route('kegiatan.index') }}">
                      <i class="nav-icon fas fa-arrow"></i>
                    <p>Jadwal Kegiatan</p>
                  </a>
                </li>
                <!-- <li>
                  <a class="nav-link" href="#">
                    <i class="nav-icon fas fa-arrow"></i>
                    <p>Lain-lain</p>
                  </a>
                </li> -->
              </ul>
            </div>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('content')

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/AdminLTE-3.2.0/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/AdminLTE-3.2.0/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/AdminLTE-3.2.0/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/AdminLTE-3.2.0/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/AdminLTE-3.2.0/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/AdminLTE-3.2.0/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/AdminLTE-3.2.0/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ asset('assets/AdminLTE-3.2.0/dist/js/demo.js') }}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/AdminLTE-3.2.0/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>


<script>
    document.getElementById('pushMenuIcon').addEventListener('click', function() {
        var logoImg = document.getElementById('polban-logo');
        var currentSrc = logoImg.src;
        if (currentSrc.includes('polban.png')) {
            logoImg.src = "{{ asset('assets/dist/img/polban1.png') }}";
            logoImg.style.width = '20px';
            logoImg.style.height = 'auto';
        } else {
            logoImg.src = "{{ asset('assets/dist/img/polban.png') }}";
            logoImg.style.width = '140px';
            logoImg.style.height = 'auto';
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toastEl = document.getElementById('toast');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    });
</script>

</body>
</html>
