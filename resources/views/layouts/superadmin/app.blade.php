<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    @yield('header')

    <!-- Fontfaces CSS-->
    <link href="{{ url('css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ url('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ url('vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- Main CSS-->
    <link href="{{ url('css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <h3>Sepangan.com</h3>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="#">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="#">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="#">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('/admin/Lapangan')}}">
                                <i class="fas fa-chart-bar"></i>Daftar Lapangan</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/Orders')}}">
                                <i class="fas fa-chart-bar"></i>Daftar Pesanan</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/tempat')}}">
                                <i class="fas fa-chart-bar"></i>Daftar Tempat</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/pengguna')}}">
                                <i class="fas fa-chart-bar"></i>Daftar Pengguna</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/Artikel')}}">
                                <i class="fas fa-chart-bar"></i>Daftar Artikel</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/withdrawal')}}">
                                <i class="fas fa-chart-bar"></i>Pencairan</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <h3 class="text-white">Sepangan.com</h3>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="li-dashboard">
                            <a href="{{ url('/admin/dashboard')}}">
                                <i class="fas fa-chart-bar"></i>Dashboard</a>
                        </li>
                        <li class="li-lapangan">
                            <a href="{{ url('/admin/Lapangan')}}">
                                <i class="fas fa-chart-bar"></i>Daftar Lapangan</a>
                        </li>
                        <li class="li-pesanan">
                            <a href="{{ url('/admin/Orders')}}">
                                <i class="fas fa-chart-bar"></i>Daftar Pesanan</a>
                        </li>
                        <li class="li-tempat">
                            <a href="{{ url('/admin/Tempat')}}">
                                <i class="fas fa-chart-bar"></i>Daftar Tempat</a>
                        </li>
                        <li class="li-pengguna">
                            <a href="{{ url('/admin/Pengguna')}}">
                                <i class="fas fa-chart-bar"></i>Daftar Pengguna</a>
                        </li>
                        <li class="li-artikel">
                            <a href="{{ url('/admin/Artikel')}}">
                                <i class="fas fa-chart-bar"></i>Daftar Artikel</a>
                        </li>
                        <li class="li-pencairan">
                            <a href="{{ url('/admin/withdrawal')}}">
                                <i class="fas fa-chart-bar"></i>Pencairan</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button ml-auto">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{ url('images/icon/avatar-01.jpg') }}" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ auth()->user()->name }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{ url('images/icon/avatar-01.jpg') }}" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ auth()->user()->name }}</a>
                                                    </h5>
                                                    <span class="email">{{ auth()->user()->email }}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="/admin/profil">
                                                        <i class="zmdi zmdi-account"></i>Edit Profil</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="/logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            @yield('content')
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ url('vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ url('vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ url('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS-->
    <script src="{{ url('vendor/slick/slick.min.js') }}"></script>
    <script src="{{ url('vendor/wow/wow.min.js') }}"></script>
    <script src="{{ url('vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ url('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ url('vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ url('vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ url('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ url('vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ url('vendor/select2/select2.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- Main JS-->
    <script src="{{ url('js/main.js') }}"></script>

    <!-- additional jquery here -->
    @yield('footer')

</body>

</html>
<!-- end document-->
