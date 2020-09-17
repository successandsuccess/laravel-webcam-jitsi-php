@extends('layouts.admin')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

    <style>
        #example1_filter input {
            height: 50px;
            font-size: 19px;
        }
        #example1_filter label {
            font-size: 19px;
        }

        #example1_length label {
            font-size: 18px;
        }

        #example1_length select {
            height: 45px;
            width: 100px;
            font-size: 18px;
        }
    </style>
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
              <p>
                Appointment
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.dashboard.patientqueue') }}" class="nav-link">
                  <p>
                    Patient Queue
                    <span class="right badge badge-danger">12</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.dashboard.selfdirectedvisits') }}" class="nav-link">
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
                <a href="{{ route('admin.dashboard.patientdirectory') }}" class="nav-link active">
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
            <h1 class="m-0 custom-h1">Patient Directory</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Patient Directory</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container pb-50">
        <div class="row">
          <div class="col-lg-12">
            <div>
            <table id="example1" class="table background-w yajra-datatable">
                  <thead>
                  <tr>
                    <th>PATIENT</th>
                    <th>LAST TELEHEATH SESSION</th>
                    <th>ACTIONS</th>
                  </tr>
                  </thead>
                  <tbody>
                  <!-- <tr>
                    <td class="table-p color-blue">Trident</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Emily London</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Emily London</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Emily London</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Emily London</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Emily London</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                   
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                   
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                   
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                    
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                   
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                    
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                    
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                    
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                   
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                    
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                    
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                    
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                   
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                    
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                   
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                   
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Mike Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Bob Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                   
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Bob Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Bob Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                   
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Bob Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Bob Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                   
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Bob Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Bob Doe</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Alexander Pierc</td>
                    <td class="table-p">10/10/20 - Self-Directed</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                    
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Alexander Pierc</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Alexander Pierc</td>
                    <td class="table-p">10/10/20 - One on one</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                   
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Alexander Pierc</td>
                    <td class="table-p">10/10/20 - Self-Directed</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                   
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Alexander Pierc</td>
                    <td class="table-p">10/10/20 - Self-Directed</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Alexander Pierc</td>
                    <td class="table-p">10/10/20 - Self-Directed</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Alexander Pierc</td>
                    <td class="table-p">10/10/20 - Self-Directed</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Alexander Pierc</td>
                    <td class="table-p">10/10/20 - Self-Directed</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                   
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Alexander Pierc</td>
                    <td class="table-p">10/10/20 - Self-Directed</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Alexander Pierc</td>
                    <td class="table-p">10/10/20 - Self-Directed</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Rachel Green</td>
                    <td class="table-p">10/10/20 - Self-Directed</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                   
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Rachel Green</td>
                    <td class="table-p">10/10/20 - Self-Directed</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                   
                  </tr>
                  <tr>
                    <td class="table-p color-blue">Rachel Green</td>
                    <td class="table-p">10/10/20 - Self-Directed</td>
                    <td><a href="{{ route('admin.patientdirectory.manage') }}"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a></td>
                  
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

  @section('javascript')
  <!-- DataTables -->
    <script src="{{ asset('admin_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $("#example1").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.dashboard.patientdirectory') }}",
                "responsive": true,
                "autoWidth": false,
                columns: [
                  { data: 'name', name: 'name' },
                  { data: 'email', email: 'email' },
                  { data: 'action', name: 'action' }
                ]
            });
    </script>
  @endsection

</div>
@endsection