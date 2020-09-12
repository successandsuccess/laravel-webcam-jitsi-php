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
    <div class="content-header pb-0">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item">Patientdirectory</li>
              <li class="breadcrumb-item active">Manage</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-sm-6">
                <p class="table-p color-blue pt-0 font-w-600"><a href="{{ route('admin.dashboard.patientdirectory') }}"><i class="fas fa-arrow-left"></i>&nbsp;BACK</a></p>
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
            <h1 class="m-0 custom-h1">Rachel Green</h1>
            <p class="sub-title-p">Last active on 10/10/20, 8:04 AM</p>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     <!-- Main content -->
     <div class="content">
      <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="custom-h3">Patient Care Plan</h3>
                
                   
                        
                            <ul class="nav nav-tabs-custom" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Current</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Previous</a>
                                </li>
                            </ul>
                        
                       
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                    <div class="card boxshadow-none mt-10">
                                        <div class="card-header p-50">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4 class="normal-black-text">Back Strengthening&nbsp;&nbsp;<i class="fas fa-pen color-blue font-18"></i></h4>
                                                    <p class="custom-p font-18 mb-05rem">Created 10/02/20</p>
                                                    <a href="#"><p class="table-p color-blue pt-0 mb-05rem font-14"><i class="fas fa-archive"></i>&nbsp;ARCHIVE</p></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body d-grid p-50">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="custom-h5 pt-0 mb-05rem">CONDITION&nbsp;&nbsp;<i class="fas fa-pen color-blue font-18"></i></p>
                                                    <p class="custom-16-font">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in commodo tellus. Nam velit diam, eleifend non est a, convallis elementum libero. Nam finibus lacus a metus hendrerit sollicitudin. Suspendisse maximus at turpis id faucibus. Aenean convallis eros nisl, eu vestibulum orci mattis id.
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer p-50 mycardfooter">
                                            <p class="custom-h5">TREATMENT</p>
                                            <a href="{{ route('admin.dashboard.exercises') }}"><button class="btn btn-default w-160 color-blue mb-25"><i class="fas fa-plus"></i>&nbsp;&nbsp;ADD EXERCISE</button></a>
                                            <div class="row mb-10">
                                                <div class="col-md-6 m-auto d-flex">
                                                    <iframe width="150" height="80" src="https://www.youtube.com/embed/vuGnzLxRvZM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    <div class="d-block">
                                                        <p class="table-p color-blue pt-0 mb-05rem ml-19">Upper Back Stretches</p>
                                                        <ul>
                                                            <li class="text-muted">4x weekly for 20 minutes</li>
                                                            <li class="text-muted">Continue for 3 weeks</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                        <h4 class="small-black-text">VIDEO</h4>
                                                        <br>
                                                        
                                                        <div class="text-right">
                                                            <p class="text-muted d-lineflex align-center">
                                                                <i class="fas fa-pen color-blue font-18"></i>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <i class="fas fa-archive color-blue font-18"></i>
                                                            </p>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="row mb-10">
                                                <div class="col-md-6 m-auto d-flex">
                                                    <iframe width="150" height="80" src="https://www.youtube.com/embed/vuGnzLxRvZM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    <div class="d-block">
                                                        <p class="table-p color-blue pt-0 mb-05rem ml-19">Upper Back Stretches</p>
                                                        <ul>
                                                            <li class="text-muted">4x weekly for 20 minutes</li>
                                                            <li class="text-muted">Continue for 3 weeks</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                        <h4 class="small-black-text">VIDEO</h4>
                                                        <br>
                                                        
                                                        <div class="text-right">
                                                            <p class="text-muted d-lineflex align-center">
                                                                <i class="fas fa-pen color-blue font-18"></i>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <i class="fas fa-archive color-blue font-18"></i>
                                                            </p>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="row mb-10">
                                                <div class="col-md-6 m-auto d-flex">
                                                    <iframe width="150" height="80" src="https://www.youtube.com/embed/vuGnzLxRvZM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    <div class="d-block">
                                                        <p class="table-p color-blue pt-0 mb-05rem ml-19">Upper Back Stretches</p>
                                                        <ul>
                                                            <li class="text-muted">4x weekly for 20 minutes</li>
                                                            <li class="text-muted">Continue for 3 weeks</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                        <h4 class="small-black-text">VIDEO</h4>
                                                        <br>
                                                        
                                                        <div class="text-right">
                                                            <p class="text-muted d-lineflex align-center">
                                                                <i class="fas fa-pen color-blue font-18"></i>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <i class="fas fa-archive color-blue font-18"></i>
                                                            </p>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                    <div class="card boxshadow-none mt-10">
                                        <div class="card-header p-50">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4 class="normal-black-text">Front Strengthening&nbsp;&nbsp;<i class="fas fa-pen color-blue font-18"></i></h4>
                                                    <p class="custom-p font-18 mb-05rem">Created 08/21/20</p>
                                                    <a href="#"><p class="table-p color-blue pt-0 mb-05rem font-14"><i class="fas fa-archive"></i>&nbsp;ARCHIVE</p></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body d-grid p-50">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="custom-h5 pt-0 mb-05rem">CONDITION&nbsp;&nbsp;<i class="fas fa-pen color-blue font-18"></i></p>
                                                    <p class="custom-16-font">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in commodo tellus. Nam velit diam, eleifend non est a, convallis elementum libero. Nam finibus lacus a metus hendrerit sollicitudin. Suspendisse maximus at turpis id faucibus. Aenean convallis eros nisl, eu vestibulum orci mattis id.
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer p-50 mycardfooter">
                                            <p class="custom-h5">TREATMENT</p>
                                            <a href="{{ route('admin.dashboard.exercises') }}"><button class="btn btn-default w-150 color-blue mb-25"><i class="fas fa-plus"></i>&nbsp;&nbsp;ADD EXERCISE</button></a>
                                            <div class="row mb-10">
                                                <div class="col-md-6 m-auto d-flex">
                                                    <iframe width="150" height="80" src="https://www.youtube.com/embed/vuGnzLxRvZM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    <div class="d-block">
                                                        <p class="table-p color-blue pt-0 mb-05rem ml-19">Upper Back Stretches</p>
                                                        <ul>
                                                            <li class="text-muted">4x weekly for 20 minutes</li>
                                                            <li class="text-muted">Continue for 3 weeks</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                        <h4 class="small-black-text">VIDEO</h4>
                                                        <br>
                                                        
                                                        <div class="text-right">
                                                            <p class="text-muted d-lineflex align-center">
                                                                <i class="fas fa-pen color-blue font-18"></i>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <i class="fas fa-archive color-blue font-18"></i>
                                                            </p>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="row mb-10">
                                                <div class="col-md-6 m-auto d-flex">
                                                    <iframe width="150" height="80" src="https://www.youtube.com/embed/vuGnzLxRvZM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    <div class="d-block">
                                                        <p class="table-p color-blue pt-0 mb-05rem ml-19">Upper Back Stretches</p>
                                                        <ul>
                                                            <li class="text-muted">4x weekly for 20 minutes</li>
                                                            <li class="text-muted">Continue for 3 weeks</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                        <h4 class="small-black-text">VIDEO</h4>
                                                        <br>
                                                        
                                                        <div class="text-right">
                                                            <p class="text-muted d-lineflex align-center">
                                                                <i class="fas fa-pen color-blue font-18"></i>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <i class="fas fa-archive color-blue font-18"></i>
                                                            </p>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="row mb-10">
                                                <div class="col-md-6 m-auto d-flex">
                                                    <iframe width="150" height="80" src="https://www.youtube.com/embed/vuGnzLxRvZM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    <div class="d-block">
                                                        <p class="table-p color-blue pt-0 mb-05rem ml-19">Upper Back Stretches</p>
                                                        <ul>
                                                            <li class="text-muted">4x weekly for 20 minutes</li>
                                                            <li class="text-muted">Continue for 3 weeks</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                        <h4 class="small-black-text">VIDEO</h4>
                                                        <br>
                                                        
                                                        <div class="text-right">
                                                            <p class="text-muted d-lineflex align-center">
                                                                <i class="fas fa-pen color-blue font-18"></i>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <i class="fas fa-archive color-blue font-18"></i>
                                                            </p>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                       
                    <!-- /.card -->
                </div>
            </div>
          <div class="col-lg-12">
                <h3 class="custom-h3">Patient Log</h3>
                <table class="table table-hover text-nowrap background-w">
                  <thead>
                    <tr>
                      <th>DATE</th>
                      <th>TIME</th>
                      <th>SESSION TYPE</th>
                      <th>PHYSICIAN</th>
                      <th>DURATION</th>
                      <th>ACTIONS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="table-p">10/10/20</td>
                      <td class="table-p">2:45 PM</td>
                      <td class="table-p color-blue">Self Directed</td>
                      <td class="table-p">Dr.Johns</td>
                      <td class="table-p">16:45 mins</span></td>
                      <td><a href="{{ route('admin.selfdirectedvisits.view') }}"><button class="btn btn-default w-110 color-blue btn-p">VIEW</button></a></td>
                    </tr>
                    <tr>
                        <td class="table-p">10/10/20</td>
                      <td class="table-p">2:45 PM</td>
                      <td class="table-p color-blue">Self Directed</td>
                      <td class="table-p">Dr.Johns</td>
                      <td class="table-p">16:45 mins</span></td>
                      <td><a href="{{ route('admin.selfdirectedvisits.view') }}"><button class="btn btn-default w-110 color-blue btn-p">VIEW</button></a></td>
                    </tr>
                    <tr>
                        <td class="table-p">10/10/20</td>
                      <td class="table-p">2:45 PM</td>
                      <td class="table-p color-blue">Self Directed</td>
                      <td class="table-p">Dr.Johns</td>
                      <td class="table-p">16:45 mins</span></td>
                      <td><a href="{{ route('admin.selfdirectedvisits.view') }}"><button class="btn btn-default w-110 color-blue btn-p">VIEW</button></a></td>
                    </tr>
                    <tr>
                        <td class="table-p">10/10/20</td>
                      <td class="table-p">2:45 PM</td>
                      <td class="table-p color-blue">Self Directed</td>
                      <td class="table-p">Dr.Johns</td>
                      <td class="table-p">16:45 mins</span></td>
                      <td><a href="{{ route('admin.selfdirectedvisits.view') }}"><button class="btn btn-default w-110 color-blue btn-p">VIEW</button></a></td>
                    </tr>
                    <tr>
                        <td class="table-p">10/10/20</td>
                      <td class="table-p">2:45 PM</td>
                      <td class="table-p color-blue">Self Directed</td>
                      <td class="table-p">Dr.Johns</td>
                      <td class="table-p">16:45 mins</span></td>
                      <td><a href="{{ route('admin.selfdirectedvisits.view') }}"><button class="btn btn-default w-110 color-blue btn-p">VIEW</button></a></td>
                    </tr>
                  </tbody>
                </table>
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