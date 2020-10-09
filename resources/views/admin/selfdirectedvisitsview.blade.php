@extends('layouts.admin')

@section('css')
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

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
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right mw-150px">
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.logout') }}" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
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
      <img src="{{ asset(env('APP_LOGO')) }}" alt="AdminLTE Logo" class="w-70 ml-25">
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
              <p class="font-18px">
                Appointment
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.dashboard.patientqueue') }}" class="nav-link">
                  <p>
                    Patient Queue
                    @if ( $patientQueueCount == 0 ) 

                    @else 
                      <span class="right badge badge-danger">{{ $patientQueueCount }}</span>
                    @endif
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.dashboard.selfdirectedvisits') }}" class="nav-link active">
                  <p>
                    Self Directed Visits
                    @if ( $recordingsToReview == 0 )
                    @else
                    <span class="right badge badge-danger">{{ $recordingsToReview }}</span>
                    @endif
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active background-none boxshadow-none cursor-none">
              <p class="font-18px">
                Manage
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.dashboard.patientdirectory') }}" class="nav-link">
                  <p>
                    Patient Directory
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.dashboard.exercises') }}" class="nav-link">
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
    <div class="content-header pb-0">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item">Self Directed Visits</li>
              <li class="breadcrumb-item active">View</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-sm-6">
                <p class="table-p color-blue pt-0 font-w-600"><a href="{{ route('admin.dashboard.selfdirectedvisits') }}"><i class="fas fa-arrow-left"></i>&nbsp;BACK</a></p>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <p class="table-p color-blue pt-0 font-w-600 text-right">View Patient Record in EMR</p>
            </div><!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Content Header (Page header) -->
    <div class="content-header pt-0">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 custom-h1">{{ $patientActivity->getUser->name }} - {{ $patientActivity->type == 2? 'Self Directed' : 'One on One' }}, {{ $patientActivity->appoint_time->format('Y-m-d') }}</h1>
            <p class="table-p color-blue pt-0">
                <a href="{{ route('admin.patientdirectory.manage', [ 'id' => $patientActivity->user_id ]) }}">View {{ $patientActivity->getUser->name }}.</a>
            </p>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content pb-50">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="custom-h3">Sessions Details</h3>
            <div class="card">
                <div class="card-header p-50">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="normal-black-text">Session Type - {{ $patientActivity->type == 2? 'Self Directed': 'One on One' }}</h4>
                            <p class="custom-p font-18 mb-05rem">Recorded at {{ $patientActivity->appoint_time }}</p>
                            <p class="custom-p font-18 mb-05rem">Session Length: {{ $patientActivity->length }} min</p>
                            <a href="#"><p class="table-p color-blue pt-0 mb-05rem">View Assessment Form</p></a>
                            <a href="#"><p class="table-p color-blue pt-0 mb-05rem">View Recording</p></a>
                        </div>
                    </div>
                </div>
                <div class="card-body d-grid p-50 pt-20">
                    <p class="table-p color-special mb-50">Patient Care Plan</p>
                    <?php $j = 0; ?>
                    @for ( $i = 1; $i <=5; $i++ )
                      @if( isset($patientActivity->getUser['getRx'.$i]) )
                      <div class="row mb-10">
                          <div class="col-md-6 m-auto d-flex">
                              <iframe width="150" height="80" src="{{ $patientActivity->getUser['getRx'.$i]->rx_link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              <div class="d-block">
                                  <p class="table-p color-blue pt-0 mb-05rem ml-19">{{ $patientActivity->getUser['getRx'.$i]->rx_name }}</p>
                                  <ul>
                                      <li class="text-muted">{{ $patientActivity->getUser['getRx'.$i]->duration }}</li>
                                      <li class="text-muted">{{ $patientActivity->getUser['getRx'.$i]->frequency }}</li>
                                  </ul>
                              </div>
                                  
                                  
                          </div>
                          <div class="col-md-6 text-right">
                                  <h4 class="small-black-text uppercase">{{ $patientActivity->getUser['getRx'.$i]->type }}</h4>
                                  <br>
                                  
                                  <div class="text-right">
                                      <p class="text-muted d-lineflex align-center">
                                          <i class="fa fa-check-circle-o" style="color: #33d847; font-size: 30px;" aria-hidden="true"></i>
                                          <span>&nbsp;Patient Completed</span>
                                      </p>
                                  </div>
                          </div>
                          <?php $j++ ?>
                      </div>
                      @endif
                    @endfor
                    @if ( $j == 0 ) 
                    <div class="row mb-10">
                        <div class="col-md-12 m-auto d-flex text-center justify-content-center">
                          <p class="table-p pt-0 mb-05rem ml-19">No Assigned Exercises</p>
                        </div>
                    </div>
                    @endif
                  

                </div>
                <div class="card-footer p-50 mycardfooter">
                        <div class="col-md-12">
                            <h4 class="normal-black-text">Practioner Review</h4>
                            <p class="custom-p font-18 mb-05rem">Dr.Johns  10/10/20 9:10 AM CT</p>
                            <p class="custom-p font-18 mb-05rem">Dr.Johns  10/10/20 9:10 AM CT</p>
                        </div>
                </div>
            </div>

            
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


</div>
@endsection