@extends('layouts.app')

@section('content')
    <main id="main">
        <!-- ======= Intro Single ======= -->
        <section class="header-section mb-20">
            <div class="margin-l-50 margin-r-50 mt-10">
                <div class="row">
                    <div class="col-md-2 text-center">
                        <a class="navbar-brand text-brand" href="{{ route('index') }}"><img src="assets/img/chiroonelogo.svg" alt="logo" id="chiroonelogo"></a>
                    </div>
                    <div class="col-md-8">
                        <h1 class="text-center special-font">Appointment Details</h1>
                    </div>
                    <div class="col-md-2 text-center m-auto">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            <div>
                                <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Intro Single-->

        <!-- =======  Blog Grid ======= -->
        <section class="news-grid grid d-flex background-g h-80vh">
            <div class="pt-20 m-auto w-100">
                <div class="contianer">

                    <div class="col-md-4 m-auto">

                        <div class="card custom-card-other">
                            <div class="card-body text-center">
                                <h2 class="card-title text-center" style="color: #fff9f9;">You're all set!</h2>
                                <h5 class="card-subtitle mb-2 text-center mt-10" style="color: #fff9f9;">Provider</h5>
                                <h5 class="card-subtitle mb-2 text-center" style="color: #fff9f9;" >{{ $provider }}</h5>
                                <h5 class="card-subtitle mb-2 text-center mt-10" style="color: #fff9f9;">
                                    Time
                                </h5>
                                <h5 class="card-subtitle mb-2 text-center" style="color: #fff9f9;" >{{ strtoupper($time) }} MDT</h5>
                                <a href="mailto:henry@patientconnect.io?subject=Mail from Patient in telehealth.patientconnect.io&body=Patient First Name: Nick, Patient Last Name: DeVito, Patient Email: hh@mobilehenry.com, Patient Address: ,Patient Phone: 8138434646, Meet URL: PATIENT REQUESTS RESCHEDULE, Meet Time: 2020-08-24 14:00:00"
                                ><h5 class="card-subtitle mb-2 text-center" style="color:#7cb63a; cursor:pointer" ><b>Reschedule</b></h5></a>
                               
                                <div class="mt-54">
                                    <button id="jitsimeet" class="btn btn-primary text-center h-55 background-green width-80"><b class="font-s-18">Start Session</b></button>
                                </div>
                            </div>
                        </div>

                        <div class="row margin-t-13">
                            <div class="text-center col-md-12">
                                <a href="{{ route('getstarted', ['provider' => $providerId, 'time' => $timeId]) }}"><b class="font-s-18" style="color:#7cb63a;">Return to Home</b></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Grid-->

    </main>
    <!-- End #main -->
    @endsection

    @section('javascript')
    <script>
        var jitsimeet = '<?php echo $jitsimeet; ?>';
        console.log(jitsimeet);
        $('#jitsimeet').click(function () {
            window.open(
                jitsimeet,
                '_blank'
            );
        })
    </script>
    @endsection