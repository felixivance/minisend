@extends('layouts.masterLayout')

@section('css-links')
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
@endsection

@section('body')
    <body>
    <!-- Left Panel -->
    <div id="app">
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <router-link to="/client/dashboard"><i class="menu-icon fa fa-dashboard"></i>Dashboard </router-link>
                    </li>
                    <li class="menu-title">View </li><!-- /.menu-title -->
                    <li>
                        <router-link to="/client/emails"> <i class="menu-icon fa fa-envelope"></i>My Emails </router-link>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./">
{{--                        <img src="/images/logo.png" alt="Logo">--}}
                        MiniSend
                    </a>
                    <a class="navbar-brand hidden" href="./">
{{--                        <img src="/images/logo2.png" alt="Logo">--}}
                        MiniSend
                    </a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}
                        </a>

                        <div class="user-menu dropdown-menu">

                            <a class="nav-link" href="/logout"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
      <router-view></router-view>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; {{ now()->year }}  All Rights Reserved.
                    </div>
                      <div class="col-sm-6 text-right">
                            Designed by <a href="mailto:felixrunye@gmail.com" style="color: blue" target="_blank"> Felix </a>
                        </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="/assets/js/main.js"></script>

@endsection
