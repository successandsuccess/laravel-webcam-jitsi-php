@extends('layouts.admin')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
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
                    <img src="{{ asset('admin_assets/dist/img/henry.png') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
                <a href="{{ route('admin.dashboard.patientqueue') }}" class="nav-link active">
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
                <a href="{{ route('admin.dashboard.selfdirectedvisits') }}" class="nav-link">
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
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 custom-h1">Welcome back Dr. Johns</h1>
            <p class="sub-title-p">Get yourself camera ready, there are patients waiting.</p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Patient Queue</li>
            </ol> -->
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
            <h3 class="custom-h3">Patient Queue ({{ $patientQueueCount }})</h3>
            <div class="card">
              <div class="card-body d-grid p-50">
                <h5 class="card-title custom-h5">FIRST APPOINTMENT</h5>
                @if ( isset($currentQueues[0]) )
                <div class="row mb-50">
                    <div class="col-md-6 m-auto">
                        <!-- <p class="card-text d-flex normal-p">
                        3:30 PM - <span class="speci-p">&nbsp;Joey Tribbiani</span>
                        </p> -->
                        <p class="card-text d-flex normal-p">
                        {{ $currentQueues[0]->appoint_time }} - <span class="speci-p">&nbsp;{{ $currentQueues[0]->getUser->name }}</span>
                        </p>
                    </div>
                    <div class="col-md-6 text-right">
                        <button class="btn btn-default w-100px">MESSAGE</button>
                        <a href="{{ $currentQueues[0]->getMeetings->meetUrl }}" target="_blank"><button class="btn btn-primary btn-blue w-100px">START</button></a>
                    </div>
                </div>
                @else
                <div class="row mb-50">
                  <div class="col-md-12 text-center" >
                    <p class="card-text text-center">
                        No queues to view now
                    </p>
                  </div>
                </div>
                @endif
                

                <h5 class="card-title custom-h5">UP NEXT</h5>

                @for( $i = 1; $i < count($currentQueues); $i++ )
                <div class="row mb-10">
                    <div class="col-md-6 m-auto">
                        <p class="card-text d-flex normal-p">
                        {{ $currentQueues[$i]->appoint_time }} - <span class="speci-p">&nbsp;{{ $currentQueues[$i]->getUser->name }}</span>
                        </p>
                    </div>
                    <div class="col-md-6 text-right">
                        <button class="btn btn-default w-100px">MESSAGE</button>
                    </div>
                </div>
                @endfor

              </div>
            </div>

            <div>
                <h3 class="custom-h3">Past Appointments</h3>
                <table class="table table-hover text-nowrap background-w" id="pastqueues">
                  <thead>
                    <tr>
                      <th>DATE</th>
                      <th>TIME</th>
                      <th>PATIENT</th>
                      <th>DURATION</th>
                      <th>ACTIONS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- <tr>
                      <td class="table-p">10/10/20</td>
                      <td class="table-p">10:00 PM</td>
                      <td class="table-p color-blue">Emily London</td>
                      <td class="table-p">8:45 mins</span></td>
                      <td><button class="btn btn-default w-110 color-blue">DETAILS</button></td>
                    </tr> -->
                  </tbody>
                </table>
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

@section('javascript')
<script src="{{ asset('admin_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
  // patient queue log yajra datatable
  $('#pastqueues').DataTable({
    processing: true,
    serverSide: true,
    "responsive": true,
    "autoWidth": false,
    ajax: "{{ route('admin.dashboard.patientqueue') }}",
    columns: [
      {data: 'appoint_date', name: 'date'},
      {data: 'appoint_time', name: 'time'},
      {data: 'patient', name: 'patient'},
      {data: 'length', name:'duration'},
      {data: 'action', name: 'actions'}
    ]
  });
</script>
@endsection