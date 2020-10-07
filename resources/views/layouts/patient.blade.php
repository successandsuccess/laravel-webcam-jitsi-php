<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Telehealth PatientConnect | Admin Dashboard</title>

  <!-- Font Awesome Icons -->
  <!-- <link rel="stylesheet" href="{{ asset('admin_assets/plugins/fontawesome-free/css/all.min.css') }}"> -->
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/adminlte.min.css') }}">

  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('admin_assets/plugins/toastr/toastr.min.css') }}">

  <!-- Google Font: Source Sans Pro -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://use.typekit.net/jbm8ofu.css">
  <link rel="stylesheet" href="{{ asset('admin_assets/patient.css') }}">
  @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<main id="main" class="background-g">
        <!-- ======= Header-Section ======= -->
        <section>
            <div class="header-section">
                <div class="row header-container">
                    <div class="col-md-6 m-auto">
                        <a class="navbar-brand text-brand" href="{{ route('index') }}"><img class="width-150px" src="{{ env('APP_LOGO') }}" alt="logo" id="chiroonelogo"></a>
                    </div>
                    <div class="col-md-6 header-right-section">
                            <!-- Messages Dropdown Menu -->
                            <a class="nav-link color-blue" href="#">
                                My Account
                            </a>
                            <!-- Notifications Dropdown Menu -->
                            <div class="nav-item dropdown">
                                <a class="nav-link p-0" data-toggle="dropdown" href="#">
                                    <img src="{{ asset('admin_assets/dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right mw-150px">
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-user mr-2"></i> Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Header-section-->
        @yield('content')

  </main>
<!-- jQuery -->
<script src="{{ asset('admin_assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin_assets/dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('admin_assets/plugins/toastr/toastr.min.js') }}"></script>

@yield('javascript')

</body>
</html>