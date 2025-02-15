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
                <img src="{{ asset('admin_assets/dist/img/henry.png') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
                <a href="{{ route('admin.dashboard.exercises') }}" class="nav-link active">
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
              <li class="breadcrumb-item active">Exercises</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content-header pt-0">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 custom-h1">Exercises</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 text-right">
            <button class="btn btn-primary btn-blue w-100px">ADD EXERCISE</button>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
         
            <div class="col-md-6">
                <div class="input-group search-div">
                    <input class="form-control py-2 border-right-0 border custom-search" id="searchExercises" onkeyup="searchExercises()" placeholder="Search by tutorial Name" name="search">
                    <span class="input-group-append background-w">
                        <div class="input-group-text bg-transparent"><i class="fa fa-search blue-color"></i></div>
                    </span>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-2">
                   
                        <label class="custom-label">Sort by</label>
                        <select class="myselect" onchange="selectSort()" id="selectSort">
                          <option value="0">Select Option</option>
                          <option value="1">A-Z</option>
                          <option value="2">Z-A</option>
                        </select>
                     
            </div>
           
          
        </div>
        
        <!-- /.row -->
        <div class="row">
                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="card card-solid custom-card">
                        <div class="card-body pb-0 pr-7 pl-7">
                            <div class="row d-flex align-items-stretch" id="myParent">
                                @foreach( $rxs as $rx )
                                <div class="col-12 col-sm-6 col-md-6">
                                    <div class="card bg-light">
                                        <div class="card-header text-muted">
                                            <h2 class="lead custom-h2">{{ $rx->rx_name }}</h2>
                                            <p class="text-muted text-sm mb-0">{{ $rx->type }}</p>
                                        </div>
                                        <div class="card-body pt-0 pb-0 padding-none">
                                            <div class="row">
                                                <div class="col-12">
                                                    <!-- <img src="{{ asset('assets/img/shutterstock_725473423.jpg') }}" alt="" class="img-fluid">
                                                 -->
                                                 <iframe width="100%" height="248" src="{{ $rx->rx_link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="card-footer footer-border background-none mt-minus-6px min-height-139px">
                                            <div class="row mt-10">
                                                    <div class="col-12">
                                                        <p class="text-muted text-sm">
                                                            {{ $rx->rx_note }}
                                                        </p>
                                                    </div>
                                                    
                                                </div>
                                            <div class="text-left">
                                                <a href="#" class="special-p">
                                                    Manage
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    
                    </div>
                    <!-- /.card -->

                </section>
                <!-- /.content -->
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


</div>
@endsection

@section('javascript')
<script>
// filter 
function searchExercises() {
  let input, filter, parent, child, a, i, txtValue;
    input = document.getElementById("searchExercises");
    filter = input.value.toUpperCase();
    // console.log(filter);
    parent = document.getElementById('myParent');
    child = document.querySelectorAll('#myParent .col-12.col-sm-6.col-md-6');
    // console.log(child.length);
    for ( i=0; i<child.length; i++ ) {
      a = child[i].querySelector('.lead.custom-h2');
      txtValue = a.textContent || a.innerText;
      // console.log(txtValue);
      if ( txtValue.toUpperCase().indexOf(filter) > -1 ) {
        child[i].style.display = "";
      } else {
        child[i].style.display = "none";
      }
    }
}

// select box changed function
function selectSort() {
  let selectedValue = document.getElementById('selectSort').value;
  console.log(selectedValue);
  if ( selectedValue == 1 ) {
    sortList(1);
  } else if (selectedValue == 2) {
    sortList(2);
  }
}

// sorting A-Z
function sortList(order) {
  
  let list, i, switching, b, shouldSwitch, a, txtValue;
  list = document.getElementById("myParent");
  switching = true;
  // sort increasing by alphabetically
  if ( order == 1 ) {
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
      // start by saying: no switching is done:
      switching = false;
      b = document.querySelectorAll("#myParent .col-12.col-sm-6.col-md-6");
      // Loop through all list-items:
      for (i = 0; i < (b.length - 1); i++) {
        // start by saying there should be no switching:
        shouldSwitch = false;
        /* check if the next item should
        switch place with the current item: */
        if (b[i].querySelector('.lead.custom-h2').innerHTML.toLowerCase() > b[i + 1].querySelector('.lead.custom-h2').innerHTML.toLowerCase()) {
          /* if next item is alphabetically
          lower than current item, mark as a switch
          and break the loop: */
          shouldSwitch = true;
          break;
        }
      }
      if (shouldSwitch) {
        /* If a switch has been marked, make the switch
        and mark the switch as done: */
        b[i].parentNode.insertBefore(b[i + 1], b[i]);
        switching = true;
      }
    }
  } 
  else // decrease sorting alphabetically
  {
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
      // start by saying: no switching is done:
      switching = false;
      b = document.querySelectorAll("#myParent .col-12.col-sm-6.col-md-6");
      // Loop through all list-items:
      for (i = 0; i < (b.length - 1); i++) {
        // start by saying there should be no switching:
        shouldSwitch = false;
        /* check if the next item should
        switch place with the current item: */
        if (b[i].querySelector('.lead.custom-h2').innerHTML.toLowerCase() < b[i + 1].querySelector('.lead.custom-h2').innerHTML.toLowerCase()) {
          /* if next item is alphabetically
          lower than current item, mark as a switch
          and break the loop: */
          shouldSwitch = true;
          break;
        }
      }
      if (shouldSwitch) {
        /* If a switch has been marked, make the switch
        and mark the switch as done: */
        b[i].parentNode.insertBefore(b[i + 1], b[i]);
        switching = true;
      }
    }
  }
  
}
</script>
@endsection