<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Biofarmaka</title>
      <base href="/SIMPEL/Pemantauan/">
      <!-- Styles -->
      <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
      <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/modules/data.js"></script>
      <script src="https://code.highcharts.com/modules/drilldown.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>

  </head>

  <body class="hold-transition skin-blue sidebar-mini fixed">
    <div class="wrapper" id="app">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo">
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SIMPEL</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                  <!-- User Account Menu -->
                  <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <!-- The user image in the navbar-->
                      <img src="{{asset('images/logoipb.png')}}" class="user-image" alt="User Image">
                      <!-- hidden-xs hides the username on small devices so only the image appears. -->
                      <span class="hidden-xs">{{Auth::user()->username}}</span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- The user image in the menu -->
                      <li class="user-header">
                        <img src="{{asset('images/logoipb.png')}}" class="img-circle" alt="User Image">

                        <p>
                          {{Auth::user()->username}}
                        </p>
                      </li>
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        {{-- <div class="pull-left">
                          <a href="#" class="btn btn-default btn-flat">Profile</a>
                        </div> --}}
                        <div class="pull-right">
                          <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                        </div>
                      </li>
                    </ul>
                  </li>
              </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('images/logoipb.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{Auth::user()->username}}</p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li class="treeview">
              <a href="{{ route('home') }}">
                <i class="fa fa-dashboard"></i><span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{ route('peneliti') }}">
                <i class="fa fa-user"></i> <span>Peneliti</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{ route('publikasi') }}">
                <i class="fa fa-book"></i> <span>Publikasi</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{ route('penelitian') }}">
                <i class="fa fa-th-list"></i> <span>Penelitian</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{ route('kerjasama') }}">
                <i class="fa fa-th-list"></i> <span>Kerja Sama</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{ route('seminar_workshop') }}">
                <i class="fa fa-th-list"></i> <span>Seminar Ilmiah</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{ route('pengmas') }}">
                <i class="fa fa-th-list"></i> <span>Pengabdian masyarakat</span>
              </a>
            </li>
          </ul>
          <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('title-page-header')
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            @yield('breadcrumb')
          </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
          @yield('content')
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- Default to the left -->
        <strong>aldisolihin 2018</strong>
      </footer>
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>
    @yield('script')
  </body>
</html>
