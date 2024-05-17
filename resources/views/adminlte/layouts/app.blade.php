<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monitoring Tugas Akhir</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
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
      <li class="nav-item">
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
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-building"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  D3-A
                  <span class="float-right text-sm text-info"><i class="fas fa-check"></i></span>
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  D3-B
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  D4-A
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  D4-B
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-chart-bar"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <h3 class="dropdown-item-title">
              Seminar 1
            </h3>          
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <h3 class="dropdown-item-title">
              Seminar 2
              <span class="float-right text-sm text-info"><i class="fas fa-check"></i></span>          
            </h3>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <h3 class="dropdown-item-title">
              Seminar 3
            </h3>          
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <h3 class="dropdown-item-title">
              Sidang 
            </h3>          
          </a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <div class=" media user-panel d-flex" data-toggle="dropdown">
          <div class="image">
            <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
          </div>
        </div>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <div class="image text-center">
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                <a href="#" class="d-block">211511048</a>
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
              </div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger ml-auto" style="color: white;">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
          </div>
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

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if (auth()->user()->role=="1" || auth()->user()->role == "2" || auth()->user()->role == "3")
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
                <span class="right badge badge-danger">New</span>
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
                <span class="right badge badge-info">5</span>
              </p>
            </a>
          </li>
          @endif
          @if (auth()->user()->role == "1" ||  auth()->user()->role == "2" || auth()->user()->role == "3")
          <li class="nav-item">
            <a href="{{ route('timeline') }}" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Timeline
                <span class="right badge badge-success">Updated</span>
              </p>
            </a>
          </li>
          @endif
          @if (auth()->user()->role=="1" ||  auth()->user()->role == "3")
          <li class="nav-item">
            <a href="{{ route('artefak') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Artefak
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          @endif
          @if (auth()->user()->role=="1" ||  auth()->user()->role == "3")
          <li class="nav-item">
            <a href="{{ route('jadwal') }}" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Jadwal Penguji
                <span class="right badge badge-success">Updated</span>
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

  @yield('content')

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<!-- <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> -->
<!-- Bootsrap 5-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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
</script
</body>
</html>
