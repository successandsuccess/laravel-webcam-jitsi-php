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
            <h1 class="m-0 custom-h1">
              {{ $patient? $patient->name : 'Template Name' }}
            </h1>
            <p class="sub-title-p">Last active on 10/10/20, 8:04 AM</p>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     <!-- Main content -->
     <div class="content pb-50">
      <div class="container">
            <div class="row">
              <div class="col-md-12">
                  <h3 class="custom-h3">Patient Activity</h3>
                  <div class="card boxshadow-none mt-10">
                      <div class="card-header p-50 pb-20 border-none">
                          <div class="row">
                              <div class="col-md-12">
                                 
                                  <p class="custom-h5 mb-05rem">THIS WEEK</p>
                                
                              </div>
                          </div>
                      </div>
                      <div class="card-body p-50 border-none pt-0 pb-35">
                          <div class="row">
                              
                                  <div class="col-md-4 col-sm-12">
                                    <p class="big-muted-text">4</p>
                                  </div>
                                  <div class="col-md-4 col-sm-12">
                                    <p class="big-muted-text">24:34 mins</p>
                                  </div>
                                  <div class="col-md-4 col-sm-12">
                                    <p class="big-muted-text">0</p>
                                  </div>
                          
                                  <div class="col-md-4 col-sm-12">
                                    <p class="custom-p">Completed Sessions</p>
                                  </div>
                                  <div class="col-md-4 col-sm-12">
                                    <p class="custom-p">Average Session Time</p>
                                  </div>
                                  <div class="col-md-4 col-sm-12">
                                    <p class="custom-p">Incompleted Exercises</p>
                                  </div>
                            
                          </div>

                      </div>
                      <div class="card-footer p-50 mycardfooter border-none pt-0">
                          <p class="custom-h5">SELF DIRECTED SESSIONS OVER TIME</p>
                          <img class="width-100" src="{{ asset('admin_assets/dist/img/patternedchart.png') }}" alt="charts">
                      </div>
                    </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-50px">
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
                                        <div class="card-header p-50 border-none pb-0">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="custom-h5 uppercase">Overview</p>
                                                    <div class="row">
                                                      <div class="col-md-6">
                                                        <h4 class="normal-black-text">{{ $patient->getDx1->dx_name ? $patient->getDx1->dx_name : 'template dx name'  }}</h4>
                                                      </div>
                                                      <div class="col-md-6 d-flex justify-content-end">
                                                        <a href="#"><p class="table-p color-blue pt-0 mb-05rem font-14"><i class="fas fa-archive"></i>&nbsp;ARCHIVE</p></a>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-pen color-blue font-18"></i>
                                                      </div>
                                                    </div>
                                                    <p class="custom-p font-18 mb-05rem">{{ $patient->getDx1->created_at ? 'Created: '.$patient->getDx1->created_at : 'Created: 10/02/20' }}</p>
                                                    <p class="custom-p font-18 mb-05rem">Length: 6 weeks</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body d-grid p-50">
                                            <div class="row">
                                                <div class="col-md-12 pb-50">
                                                    <p class="custom-h5 pt-0 mb-05rem">DX TAGS</p>
                                                    <div class="row">
                                                      <div class="col-md-5">
                                                        <select onchnage="dxsChange()" class="admin-select custom-16-font" name="dxs" id="dxs">
                                                          <option value="0">Select diagnosis</option>
                                                          <option value="1" selected>Lumbar Stenosis</option>
                                                          <option value="2">Cervical Stenosis </option>
                                                          <option value="3">Front Stenosis </option>
                                                          <option value="4">Back Stenosis </option>
                                                          <option value="5">Spine Stenosis </option>
                                                        </select>
                                                      </div>
                                                      <div class="col-md-7 m-auto d-flex" >
                                                        
                                                        <div class="col-md-12">
                                                          <div class="row" id="dxs_show">
                                                                <div class="col-md-6 mb-10" id="1">
                                                                  <div class="custom-rounded-tag normal-white-text-14 d-flex">Lumbar Stenosis <span onclick="remove_dxs(1)"><i class="far fa-times-circle"></i></span></div>
                                                                </div>
                                                          </div>
                                                        </div>
                                                       
                                                        
                                                      
                                                      </div>
                                                    </div>
                                                      
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                      <div class="col-md-6">
                                                        <p class="custom-h5 pt-0 mb-05rem">PRACTITIONER NOTES</p>
                                                      </div>
                                                      <div class="col-md-6 text-right">
                                                        <i class="fas fa-pen color-blue font-18"></i>
                                                      </div>
                                                    </div>
                                                    <p class="custom-16-font">
                                                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in commodo tellus. Nam velit diam, eleifend non est a, convallis elementum libero. Nam finibus lacus a metus hendrerit sollicitudin.
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer p-50 mycardfooter">
                                            <p class="custom-h5">TREATMENT</p>
                                            <button class="btn btn-default color-blue mb-25" type="button" data-backdrop="static" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-plus"></i>&nbsp;&nbsp;ADD EXERCISE</button>
                                            
                                            @for ( $i = 1; $i <=5; $i++ )
                                              @if ( isset($patient['getRx'.$i]) )
                       
                                              <div class="row mb-10 border-1-b-gainsboro">
                                                  <div class="col-md-6 m-auto d-flex">
                                                      <iframe width="150" height="80" src="{{ $patient['getRx'.$i]->rx_link ? $patient['getRx'.$i]->rx_link : 'https://www.youtube.com/embed/vuGnzLxRvZM' }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                      <div class="d-block">
                                                          <p class="table-p color-blue pt-0 mb-05rem ml-19">{{ $patient['getRx'.$i]->rx_name ? $patient['getRx'.$i]->rx_name : 'template rx name' }}</p>
                                                          <ul>
                                                              <!-- <li class="text-muted">4x weekly for 20 minutes</li> -->
                                                              <!-- <li class="text-muted">Continue for 3 weeks</li> -->
                                                              <li class="text-muted">{{ $patient['getRx'.$i]->frequency ? $patient['getRx'.$i]->frequency : 'template rx frequency' }}</li>
                                                              <li class="text-muted">{{ $patient['getRx'.$i]->duration ? $patient['getRx'.$i]->duration : 'template rx duration' }}</li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6 text-right">
                                                          <h4 class="small-black-text uppercase">{{ $patient['getRx'.$i]->type ? $patient['getRx'.$i]->type : 'unkown' }}</h4>
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
                                              @endif
                                            @endfor

                                            
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
                                            <button class="btn btn-default color-blue mb-25" type="button" data-backdrop="static" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-plus"></i>&nbsp;&nbsp;ADD EXERCISE</button>
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
                <table class="table table-hover text-nowrap background-w margin-bottom-0">
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

<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header border-none pl-40 pb-0 pr-40">
              <h4 class="modal-title custom-h3">Assign Exercises</h4>
              <button type="button" class="close exercise-modal-close" data-dismiss="modal" onclick="handleCloseModal()" aria-label="Close">
                <span aria-hidden="true" class="blue-color">&times;</span>
              </button>
            </div>
            <div class="modal-body pt-0 pl-25 pr-25">

                            <ul class="nav nav-tabs-custom" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active  font-16" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">RELATED EXERCISES</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  font-16" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">PROGRAMS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  font-16" id="custom-tabs-three-exercises-tab" data-toggle="pill" href="#custom-tabs-three-exercises" role="tab" aria-controls="custom-tabs-three-exercises" aria-selected="false">ALL EXERCISES</a>
                                </li>
                            </ul>
                        
                       
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                    <div class="card boxshadow-none mt-10">
                                        <div class="card-header border-b-none">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4 class="custom-h5 mt-4px mb-11px">PROGRAMS - {{ $patient->getDx1->dx_name ? $patient->getDx1->dx_name : 'Template Dx Name' }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body d-grid border-1-gasinsboro m-18 mb-30 max-width-635">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="small-custom-text mt-0 mb-0">(3) EXERCISES</p>
                                                    <div class="row">
                                                      <div class="col-md-6"> 
                                                        <h3 class="normal-custom-text">{{ $patient->getDx1->dx_name ? $patient->getDx1->dx_name : 'Template Dx Name' }} PROGRAM</h3>
                                                      </div>
                                                      <div class="col-md-6 text-right">
                                                        <button class="btn btn-primary btn-blue w-109px h-36px blue-btn-font">ASSIGN</button>
                                                      </div>
                                                    </div>
                                                   
                                                    <p class="semi-samll-text mb-0"><i class="fas fa-video"></i>&nbsp;Upper Back Stretches</p>
                                                    <p class="semi-samll-text mb-0"><i class="fas fa-video"></i>&nbsp;SI Joint Extensions</p>
                                                    <p class="semi-samll-text mb-10"><i class="fas fa-video"></i>&nbsp;Lumbar Stenosis Stretches</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer mycardfooter mt-5px">
                                                      <div class="row mb-25 mt-30">
                                                          <div class="col-md-6">
                                                            <!-- <p class="custom-h5 mt-5px">EXERCISES - UPPER BACK(6)</p> -->
                                                            <p class="custom-h5 mt-5px">EXERCISES - {{ $patient->getDx1->dx_name ? $patient->getDx1->dx_name : 'Template Dx Name' }} ({{ count($dxRxs) }})</p> 
                                                          </div>
                                                          <div class="col-md-6 text-right">
                                                            <button class="btn btn-primary btn-blue w-135px h-36px blue-btn-font">ASSIGN ALL</button>
                                                          </div>
                                                      </div>

                                            @foreach ( $dxRxs as $rx )

                                                      @if ( $rx->rx_id == $patient->rx_1 )
                                                        <div class="row mb-10 border-1-b-gainsboro min-height-100px">
                                                            <div class="col-md-6 m-auto d-flex">
                                                                <iframe width="150" height="85" src="{{ $rx->rx_link ? $rx->rx_link : '' }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                <div class="d-block">
                                                                    <!-- <p class="exercise-blue-small-font pt-0 mb-0 ml-19">Upper Back Stretches</p> -->
                                                                    <p class="exercise-blue-small-font pt-0 mb-0 ml-19">{{ $rx->rx_name }}</p>
                                                                    <ul>
                                                                        <li class="exercise-li-muted-font">{{ $rx->frequency }}</li>
                                                                        <li class="exercise-li-muted-font">{{ $rx->duration }}</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 text-right">
                                                                    <h4 class="small-black-text uppercase">{{ $rx->type }}</h4>
                                                                    <br>
                                                                    <div class="d-inline-flex" id="related1">
                                                                        <p class="exercise-assigned-italic m-auto">Assigned</p> 
                                                                        <button class="btn btn-default w-90px h-36px white-btn-font ml-20" onclick="handleRemove(<?php echo $patient->id ?> ,1, <?php echo $rx->rx_id ?>)">Remove</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                      @elseif ( $rx->rx_id == $patient->rx_2 )
                                                        <div class="row mb-10 border-1-b-gainsboro min-height-100px">
                                                            <div class="col-md-6 m-auto d-flex">
                                                                <iframe width="150" height="85" src="{{ $rx->rx_link ? $rx->rx_link : '' }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                <div class="d-block">
                                                                    <!-- <p class="exercise-blue-small-font pt-0 mb-0 ml-19">Upper Back Stretches</p> -->
                                                                    <p class="exercise-blue-small-font pt-0 mb-0 ml-19">{{ $rx->rx_name }}</p>
                                                                    <ul>
                                                                        <li class="exercise-li-muted-font">{{ $rx->frequency }}</li>
                                                                        <li class="exercise-li-muted-font">{{ $rx->duration }}</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 text-right">
                                                                    <h4 class="small-black-text uppercase">{{ $rx->type }}</h4>
                                                                    <br>
                                                                    <div class="d-inline-flex" id="related2">
                                                                        <p class="exercise-assigned-italic m-auto">Assigned</p> 
                                                                        <button class="btn btn-default w-90px h-36px white-btn-font ml-20" onclick="handleRemove(<?php echo $patient->id ?> ,2, <?php echo $rx->rx_id ?>)">Remove</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                      @elseif ( $rx->rx_id == $patient->rx_3 )
                                                        <div class="row mb-10 border-1-b-gainsboro min-height-100px">
                                                            <div class="col-md-6 m-auto d-flex">
                                                                <iframe width="150" height="85" src="{{ $rx->rx_link ? $rx->rx_link : '' }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                <div class="d-block">
                                                                    <!-- <p class="exercise-blue-small-font pt-0 mb-0 ml-19">Upper Back Stretches</p> -->
                                                                    <p class="exercise-blue-small-font pt-0 mb-0 ml-19">{{ $rx->rx_name }}</p>
                                                                    <ul>
                                                                        <li class="exercise-li-muted-font">{{ $rx->frequency }}</li>
                                                                        <li class="exercise-li-muted-font">{{ $rx->duration }}</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 text-right">
                                                                    <h4 class="small-black-text uppercase">{{ $rx->type }}</h4>
                                                                    <br>
                                                                    <div class="d-inline-flex" id="related3">
                                                                        <p class="exercise-assigned-italic m-auto">Assigned</p> 
                                                                        <button class="btn btn-default w-90px h-36px white-btn-font ml-20" onclick="handleRemove(<?php echo $patient->id ?> ,3, <?php echo $rx->rx_id ?>)">Remove</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                      @elseif ( $rx->rx_id == $patient->rx_4 )
                                                        <div class="row mb-10 border-1-b-gainsboro min-height-100px">
                                                            <div class="col-md-6 m-auto d-flex">
                                                                <iframe width="150" height="85" src="{{ $rx->rx_link ? $rx->rx_link : '' }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                <div class="d-block">
                                                                    <!-- <p class="exercise-blue-small-font pt-0 mb-0 ml-19">Upper Back Stretches</p> -->
                                                                    <p class="exercise-blue-small-font pt-0 mb-0 ml-19">{{ $rx->rx_name }}</p>
                                                                    <ul>
                                                                        <li class="exercise-li-muted-font">{{ $rx->frequency }}</li>
                                                                        <li class="exercise-li-muted-font">{{ $rx->duration }}</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 text-right">
                                                                    <h4 class="small-black-text uppercase">{{ $rx->type }}</h4>
                                                                    <br>
                                                                    <div class="d-inline-flex" id="related4">
                                                                        <p class="exercise-assigned-italic m-auto">Assigned</p> 
                                                                        <button class="btn btn-default w-90px h-36px white-btn-font ml-20" onclick="handleRemove(<?php echo $patient->id ?> ,4, <?php echo $rx->rx_id ?>)">Remove</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                      @elseif ( $rx->rx_id == $patient->rx_5 )
                                                        <div class="row mb-10 border-1-b-gainsboro min-height-100px">
                                                            <div class="col-md-6 m-auto d-flex">
                                                                <iframe width="150" height="85" src="{{ $rx->rx_link ? $rx->rx_link : '' }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                <div class="d-block">
                                                                    <!-- <p class="exercise-blue-small-font pt-0 mb-0 ml-19">Upper Back Stretches</p> -->
                                                                    <p class="exercise-blue-small-font pt-0 mb-0 ml-19">{{ $rx->rx_name }}</p>
                                                                    <ul>
                                                                        <li class="exercise-li-muted-font">{{ $rx->frequency }}</li>
                                                                        <li class="exercise-li-muted-font">{{ $rx->duration }}</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 text-right">
                                                                    <h4 class="small-black-text uppercase">{{ $rx->type }}</h4>
                                                                    <br>
                                                                    <div class="d-inline-flex" id="related5">
                                                                        <p class="exercise-assigned-italic m-auto">Assigned</p> 
                                                                        <button class="btn btn-default w-90px h-36px white-btn-font ml-20" onclick="handleRemove(<?php echo $patient->id ?> ,5, <?php echo $rx->rx_id ?>)">Remove</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                      @endif
                                                      
                                              @endforeach

                                              @foreach ( $dxRxs as $rx )
                                                      @if ( 
                                                        $rx->rx_id != $patient->rx_1 && 
                                                        $rx->rx_id != $patient->rx_2 && 
                                                        $rx->rx_id != $patient->rx_3 &&
                                                        $rx->rx_id != $patient->rx_4 &&
                                                        $rx->rx_id != $patient->rx_5 
                                                        )
                                                        <div class="row mb-10 border-1-b-gainsboro min-height-100px">
                                                          <div class="col-md-6 m-auto d-flex">
                                                              <iframe width="150" height="85" src="{{ $rx->rx_link ? $rx->rx_link : '' }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                              <div class="d-block">
                                                                  <p class="exercise-blue-small-font pt-0 mb-0 ml-19">{{ $rx->rx_name }}</p>
                                                                  <ul>
                                                                      <li class="exercise-li-muted-font">{{ $rx->frequency }}</li>
                                                                      <li class="exercise-li-muted-font">{{ $rx->duration }}</li>
                                                                  </ul>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-6 text-right">
                                                                  <h4 class="small-black-text uppercase">{{ $rx->type }}</h4>
                                                                  <br>
                                                                  <div class="d-inline-flex" id="relatedAssign<?php echo $rx->rx_id?>">
                                                                      <button class="btn btn-primary btn-blue w-90px h-36px blue-btn-font ml-20" onclick="handleAssign(<?php echo $patient->id ?>,<?php echo $rx->rx_id ?>)">Assign</button>
                                                                  </div>
                                                          </div>
                                                        </div>
                                                      @endif
                                                      

                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                    <div class="card boxshadow-none mt-10">
                                        <div class="card-header border-b-none">
                                            <div class="row mt-5px mb-25">
                                                <div class="col-md-12">
                                                  <div class="input-group search-div">
                                                      <input class="form-control py-2 border-right-0 border custom-search" type="search" placeholder="Search Program Name" name="search">
                                                      <span class="input-group-append background-w">
                                                          <div class="input-group-text bg-transparent"><i class="fa fa-search blue-color"></i></div>
                                                      </span>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        @foreach ( $allDxs as $dx )

                                        <div class="card-body d-grid border-1-gasinsboro m-18 mb-25 max-width-635">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="small-custom-text mt-0 mb-0">(3) EXERCISES</p>
                                                    <div class="row">
                                                      <div class="col-md-6"> 
                                                        <!-- <h3 class="normal-custom-text">UPPER BACK PROGRAM</h3> -->
                                                          <h3 class="normal-custom-text uppercase">{{ $dx->dx_name }} PROGRAM</h3> 
                                                      </div>
                                                      <div class="col-md-6 text-right">
                                                        <button class="btn btn-primary btn-blue w-109px h-36px blue-btn-font">ASSIGN</button>
                                                      </div>
                                                    </div>
                                                   
                                                    <p class="semi-samll-text mb-0"><i class="fas fa-video"></i>&nbsp;Upper Back Stretches</p>
                                                    <p class="semi-samll-text mb-0"><i class="fas fa-video"></i>&nbsp;SI Joint Extensions</p>
                                                    <p class="semi-samll-text mb-10"><i class="fas fa-video"></i>&nbsp;Lumbar Stenosis Stretches</p>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach


                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-exercises" role="tabpanel" aria-labelledby="custom-tabs-three-exercises-tab">
                                    <div class="card boxshadow-none mt-10">
                                        <div class="card-header border-b-none">
                                            <div class="row">
                                                <div class="col-md-12">
                                                  <div class="row mt-5px mb-25">
                                                    <div class="col-md-12">
                                                      <div class="input-group search-div">
                                                          <input class="form-control py-2 border-right-0 border custom-search" type="search" placeholder="Search Program Name" name="search">
                                                          <span class="input-group-append background-w">
                                                              <div class="input-group-text bg-transparent"><i class="fa fa-search blue-color"></i></div>
                                                          </span>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer mycardfooter mt-5px border-none">

                                              @foreach ( $allRxs as $rx )

                                                      @if ( $rx->rx_id == $patient->rx_1 )
                                                        <div class="row mb-10 border-1-b-gainsboro min-height-100px">
                                                            <div class="col-md-6 m-auto d-flex">
                                                                <iframe width="150" height="85" src="{{ $rx->rx_link ? $rx->rx_link : '' }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                <div class="d-block">
                                                                    <!-- <p class="exercise-blue-small-font pt-0 mb-0 ml-19">Upper Back Stretches</p> -->
                                                                    <p class="exercise-blue-small-font pt-0 mb-0 ml-19">{{ $rx->rx_name }}</p>
                                                                    <ul>
                                                                        <li class="exercise-li-muted-font">{{ $rx->frequency }}</li>
                                                                        <li class="exercise-li-muted-font">{{ $rx->duration }}</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 text-right">
                                                                    <h4 class="small-black-text uppercase">{{ $rx->type }}</h4>
                                                                    <br>
                                                                    <div class="d-inline-flex" id="related1">
                                                                        <p class="exercise-assigned-italic m-auto">Assigned</p> 
                                                                        <button class="btn btn-default w-90px h-36px white-btn-font ml-20" onclick="handleRemove(<?php echo $patient->id ?> ,1, <?php echo $rx->rx_id ?>)">Remove</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                      @elseif ( $rx->rx_id == $patient->rx_2 )
                                                        <div class="row mb-10 border-1-b-gainsboro min-height-100px">
                                                            <div class="col-md-6 m-auto d-flex">
                                                                <iframe width="150" height="85" src="{{ $rx->rx_link ? $rx->rx_link : '' }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                <div class="d-block">
                                                                    <!-- <p class="exercise-blue-small-font pt-0 mb-0 ml-19">Upper Back Stretches</p> -->
                                                                    <p class="exercise-blue-small-font pt-0 mb-0 ml-19">{{ $rx->rx_name }}</p>
                                                                    <ul>
                                                                        <li class="exercise-li-muted-font">{{ $rx->frequency }}</li>
                                                                        <li class="exercise-li-muted-font">{{ $rx->duration }}</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 text-right">
                                                                    <h4 class="small-black-text uppercase">{{ $rx->type }}</h4>
                                                                    <br>
                                                                    <div class="d-inline-flex" id="related2">
                                                                        <p class="exercise-assigned-italic m-auto">Assigned</p> 
                                                                        <button class="btn btn-default w-90px h-36px white-btn-font ml-20" onclick="handleRemove(<?php echo $patient->id ?> ,2, <?php echo $rx->rx_id ?>)">Remove</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                      @elseif ( $rx->rx_id == $patient->rx_3 )
                                                        <div class="row mb-10 border-1-b-gainsboro min-height-100px">
                                                            <div class="col-md-6 m-auto d-flex">
                                                                <iframe width="150" height="85" src="{{ $rx->rx_link ? $rx->rx_link : '' }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                <div class="d-block">
                                                                    <!-- <p class="exercise-blue-small-font pt-0 mb-0 ml-19">Upper Back Stretches</p> -->
                                                                    <p class="exercise-blue-small-font pt-0 mb-0 ml-19">{{ $rx->rx_name }}</p>
                                                                    <ul>
                                                                        <li class="exercise-li-muted-font">{{ $rx->frequency }}</li>
                                                                        <li class="exercise-li-muted-font">{{ $rx->duration }}</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 text-right">
                                                                    <h4 class="small-black-text uppercase">{{ $rx->type }}</h4>
                                                                    <br>
                                                                    <div class="d-inline-flex" id="related3">
                                                                        <p class="exercise-assigned-italic m-auto">Assigned</p> 
                                                                        <button class="btn btn-default w-90px h-36px white-btn-font ml-20" onclick="handleRemove(<?php echo $patient->id ?> ,3, <?php echo $rx->rx_id ?>)">Remove</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                      @elseif ( $rx->rx_id == $patient->rx_4 )
                                                        <div class="row mb-10 border-1-b-gainsboro min-height-100px">
                                                            <div class="col-md-6 m-auto d-flex">
                                                                <iframe width="150" height="85" src="{{ $rx->rx_link ? $rx->rx_link : '' }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                <div class="d-block">
                                                                    <!-- <p class="exercise-blue-small-font pt-0 mb-0 ml-19">Upper Back Stretches</p> -->
                                                                    <p class="exercise-blue-small-font pt-0 mb-0 ml-19">{{ $rx->rx_name }}</p>
                                                                    <ul>
                                                                        <li class="exercise-li-muted-font">{{ $rx->frequency }}</li>
                                                                        <li class="exercise-li-muted-font">{{ $rx->duration }}</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 text-right">
                                                                    <h4 class="small-black-text uppercase">{{ $rx->type }}</h4>
                                                                    <br>
                                                                    <div class="d-inline-flex" id="related4">
                                                                        <p class="exercise-assigned-italic m-auto">Assigned</p> 
                                                                        <button class="btn btn-default w-90px h-36px white-btn-font ml-20" onclick="handleRemove(<?php echo $patient->id ?> ,4, <?php echo $rx->rx_id ?>)">Remove</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                      @elseif ( $rx->rx_id == $patient->rx_5 )
                                                        <div class="row mb-10 border-1-b-gainsboro min-height-100px">
                                                            <div class="col-md-6 m-auto d-flex">
                                                                <iframe width="150" height="85" src="{{ $rx->rx_link ? $rx->rx_link : '' }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                <div class="d-block">
                                                                    <!-- <p class="exercise-blue-small-font pt-0 mb-0 ml-19">Upper Back Stretches</p> -->
                                                                    <p class="exercise-blue-small-font pt-0 mb-0 ml-19">{{ $rx->rx_name }}</p>
                                                                    <ul>
                                                                        <li class="exercise-li-muted-font">{{ $rx->frequency }}</li>
                                                                        <li class="exercise-li-muted-font">{{ $rx->duration }}</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 text-right">
                                                                    <h4 class="small-black-text uppercase">{{ $rx->type }}</h4>
                                                                    <br>
                                                                    <div class="d-inline-flex" id="related5">
                                                                        <p class="exercise-assigned-italic m-auto">Assigned</p> 
                                                                        <button class="btn btn-default w-90px h-36px white-btn-font ml-20" onclick="handleRemove(<?php echo $patient->id ?> ,5, <?php echo $rx->rx_id ?>)">Remove</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                      @endif
                                                    @endforeach

                                                    @foreach ( $allRxs as $rx )
                                                      @if ( 
                                                        $rx->rx_id != $patient->rx_1 && 
                                                        $rx->rx_id != $patient->rx_2 && 
                                                        $rx->rx_id != $patient->rx_3 &&
                                                        $rx->rx_id != $patient->rx_4 &&
                                                        $rx->rx_id != $patient->rx_5 
                                                        )
                                                        <div class="row mb-10 border-1-b-gainsboro min-height-100px">
                                                          <div class="col-md-6 m-auto d-flex">
                                                              <iframe width="150" height="85" src="{{ $rx->rx_link ? $rx->rx_link : '' }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                              <div class="d-block">
                                                                  <p class="exercise-blue-small-font pt-0 mb-0 ml-19">{{ $rx->rx_name }}</p>
                                                                  <ul>
                                                                      <li class="exercise-li-muted-font">{{ $rx->frequency }}</li>
                                                                      <li class="exercise-li-muted-font">{{ $rx->duration }}</li>
                                                                  </ul>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-6 text-right">
                                                                  <h4 class="small-black-text uppercase">{{ $rx->type }}</h4>
                                                                  <br>
                                                                  <div class="d-inline-flex" id="relatedAssign<?php echo $rx->rx_id?>">
                                                                      <button class="btn btn-primary btn-blue w-90px h-36px blue-btn-font ml-20" onclick="handleAssign(<?php echo $patient->id ?>,<?php echo $rx->rx_id ?>)">Assign</button>
                                                                  </div>
                                                          </div>
                                                        </div>
                                                      @endif
                                                            

                                                  @endforeach
                                        </div>
                                      

                                    </div>
                                </div>
                            </div>

            </div>
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection

@section('javascript')
<script>
  // handle close modal
  function handleCloseModal() {
    location.reload();
  }

  // setting toastr options
  toastr.options = {
                  "closeButton": false,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "10",
                  "hideDuration": "1000",
                  "timeOut": "1000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

  // handle the dynamic dxs tag selecting and changing
  var selectedArray = ["1"];
  $('#dxs').on('change', function () {
    let dxsSelect = document.getElementById('dxs');
    let selectedDx = dxsSelect.options[dxsSelect.selectedIndex].text;
    let selectedDxIndex = dxsSelect.options[dxsSelect.selectedIndex].value;
    // console.log(selectedArray);
    // console.log(selectedArray.indexOf(selectedDxIndex));
    if ( selectedDxIndex != 0 && selectedArray.indexOf(selectedDxIndex) === -1) {
      // console.log(selectedDxIndex);
      selectedArray.push(selectedDxIndex);
      $('#dxs_show').append('<div class="col-md-6 mb-10" id="' + selectedDxIndex + '"><div class="custom-rounded-tag normal-white-text-14 d-flex">' + selectedDx + ' <span onclick="remove_dxs('+ selectedDxIndex +')"><i class="far fa-times-circle"></i></span></div></div>');
    }
  });

  // remove the dxs tags when change
  function remove_dxs(removedx) {
    // console.log(removedx);
    $('#'+removedx).remove();
    let dxsSelect = document.getElementById('dxs').selectedIndex = "0";

    let position = selectedArray.indexOf(removedx.toString());

    selectedArray.splice(position, 1);
    // console.log(selectedArray);
  }

  function handleRemove(patientId, index, rx_id) {
    

    let removeData = {
      patientId: patientId,
      index: index,
      rx_id: rx_id
    }

    // console.log(removeData);

     // start post remove
     $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
    $.ajax({
        url: "{{ url('/admin/dashboard/patientdirectory/manage/remove') }}",
        type: 'POST',              
        data: removeData,
        success: function(result)
        {
            if( result == 'Success' ) {
                
                // toastr success
                // window.alert('Removed Successfully!');
                toastr.success('Exercise was successfully removed.');

                $('[id="related' + index + '"]').html('<button class="btn btn-primary btn-blue w-90px h-36px blue-btn-font ml-20" onclick="handleAssign(' + patientId + ',' + rx_id + ')">Assign</button>');
                $('[id="related' + index + '"]').attr('id', 'relatedAssign'+rx_id);
            }
            else {
                console.log('Error Occured In Removing, Retry or Check Network');
                // window.alert('Removing went wrong. Check network and retry.');
                toastr.error('Removing went wrong. Check network and retry.');
            }
        },
        error: function(data)
        {
            console.log('error',data);
            // window.alert('Removing went wrong. Check network and retry.');
            toastr.error('Removing went wrong. Check network and retry.');
        }
    });

  }


  // assign exericses
  function handleAssign(patientId, rx_id) {
    console.log('assign',rx_id);

    let assignData = {
      patientId: patientId,
      rx_id: rx_id
    }
    // start post assign
    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
    $.ajax({
        url: "{{ url('/admin/dashboard/patientdirectory/manage/assign') }}",
        type: 'POST',              
        data: assignData,
        success: function(result)
        {
            console.log(result);
            if( result['info'] == 'Success' ) {

              
                
                toastr.success('Exercise was successfully assigned.');
                $('[id = "relatedAssign' + rx_id + '"]').html('<p class="exercise-assigned-italic m-auto">Assigned</p><button class="btn btn-default w-90px h-36px white-btn-font ml-20" onclick="handleRemove('+ patientId +',' + result['index'] +',' + rx_id + ')">Remove</button>');
                $('[id = "relatedAssign' + rx_id + '"]').attr('id', 'related'+result['index']);

            } else if ( result['info'] == 'Full' ) {
              // window.alert('FAILED ASSIGN! Fully ASSIGNED, SO AS TO ASSIGN THIS EXERCISE, PLEASE REMOVE ONE');
              toastr.warning('FAILED ASSIGN! FULLY ASSIGNED, PLEASE REMOVE ONE')
            }
            else {
                console.log('Error Occured In Assigning, Retry or Check Network');
                // window.alert('Assigning went wrong. Check network and retry.');
                toastr.error('Assigning went wrong. Check network and retry.');
            }
        },
        error: function(data)
        {
            console.log('error',data);
            // window.alert('Assigning went wrong. Check network and retry.');
            toastr.error('Assigning went wrong. Check network and retry.');
        }
    });

  }
</script>
@endsection