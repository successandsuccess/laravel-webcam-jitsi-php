@extends('layouts.admin')

@section('content')
<div class="wrapper">


    <nav class="main-header navbar navbar-expand navbar-white navbar-light h-81">


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link color-blue" href="#">
                    My Account
                </a>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link p-0" data-toggle="dropdown" href="#">
                    <img src="{{ asset('admin_assets/dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-45 img-circle mr-3">
                    <!-- <span class="badge badge-warning navbar-badge">15</span> -->
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.logout') }}" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> Logout
                </a>
               
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button" style="visibility: hidden"><i
                    class="fas fa-th-large"></i></a>
            </li>
        </ul>

    </nav>  
    
      <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 background-dark-blue">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link background-w">
      <img src="{{ asset('assets/img/chiroonelogo.svg') }}" alt="AdminLTE Logo" class="w-70 ml-25">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active background-none boxshadow-none cursor-none">
              <p>
                Appointment
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <p>
                    Patient Queue
                    <span class="right badge badge-danger">12</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>
                    Self Directed Visits
                    <span class="right badge badge-danger">7</span>
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active background-none boxshadow-none cursor-none">
              <p>
                Manage
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>
                    Patient Directory
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>
                    Exercises
                  </p>
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 custom-h1">Welcome Back Dr. Johns</h1>
            <p>Get yourself camera ready, there are patients waiting.</p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Appointment Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="custom-h3">Patient Queue (12)</h3>
            <div class="card">
              <div class="card-body d-grid p-50">
                <h5 class="card-title custom-h5">FIRST APPOINTMENT</h5>

                <div class="row mb-50">
                    <div class="col-md-6 m-auto">
                        <p class="card-text">
                        3:30 PM - <span class="color-blue">Joey Tribbiani</span>
                        </p>
                    </div>
                    <div class="col-md-6 text-right">
                        <button class="btn btn-default w-100px">MESSAGE</button>
                        <button class="btn btn-primary w-100px">START</button>
                    </div>

                    
                </div>
                

                <h5 class="card-title custom-h5">UP NEXT</h5>

                <div class="row mb-10">
                    <div class="col-md-6 m-auto">
                        <p class="card-text">
                        3:45 PM - <span class="color-blue">Monica Geller</span>
                        </p>
                    </div>
                    <div class="col-md-6 text-right">
                        <button class="btn btn-default w-100px">MESSAGE</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 m-auto">
                        <p class="card-text">
                        4:00 PM - <span class="color-blue">Chandler Bing</span>
                        </p>
                    </div>
                    <div class="col-md-6 text-right">
                        <button class="btn btn-default w-100px">MESSAGE</button>
                    </div>
                </div>
              </div>
            </div>

            <div>
                <h3 class="custom-h3">Past Appointments</h3>
            </div>
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020-2021 <a href="https://telehealth.patientconnect.io">telehealth.patientconnect.io</a>.</strong> All rights reserved.
  </footer>

</div>
@endsection