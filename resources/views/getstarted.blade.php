@extends('layouts.app')

@section('content')
<main id="main">
        <!-- <div class="overlay background-g" style="position: unset;"></div> -->
        <!-- ======= Intro Single ======= -->
        <section class="header-section mb-20">
            <div class="margin-l-50 margin-r-50 mt-10">
                <div class="row">
                    <div class="col-md-2 text-center">
                        <a class="navbar-brand text-brand" href="{{ route('index') }}"><img src="assets/img/chiroonelogo.svg" alt="logo" id="chiroonelogo"></a>
                    </div>
                    <div class="col-md-8">
                        <h1 class="color-b text-center special-font">What Brings You Here Today?</h1>
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
        <section class="news-grid grid background-g" style="padding-bottom: 414px;">
            <div class="container pt-20">
                <div class="row color-w">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="text-center">
                            <p>We realize that health is a prioirty to so many right now. We want to ensure our doctors and clinical team are available to help you with accessing your chiroprator wherever you're at. Our expert team is here to help you reduce
                                stress on your body so you can keep your health "in check" and continue to do all the things you do each day!
                            </p>
                            <p>
                                At Chiro One, our clinical care team remains dedicated to providing exceptional healthcare to our patients. These Telehealth sessions are a great supplement to your already existing in-office chiropratic appointments.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>

                <div class="row mt-50">
                    <div class="col-md-2 col-sm-12">
                    </div>
                    <div class="col-md-4 col-sm-12 mobile-response-center">
                        <select class="btn text-center mobile-margin-r-50 h-55 width-80 background-green color-w" style="font-size: larger; text-align:center; text-align-last: center;" data-style="btn-primary">
                          <option value="0">Select Provider...</option>
                          <option value="1">Dr.Johns</option>
                          <option value="2">Dr.Wang</option>
                          <option value="3">Mr.Smith.CA</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-12 text-right mobile-response-center mobile-mt-20">
                        <select class="btn text-center h-55 width-80 background-green color-w" style="font-size: larger; text-align:center; text-align-last: center;" data-style="btn-primary">
                        <option value="0">Select Time...</option>
                        <option value="1">Dr.Johns</option>
                        <option value="2">Dr.Wang</option>
                        <option value="3">Mr.Smith.CA</option>
                      </select>
                    </div>
                    <div class="col-md-2 col-sm-12">
                    </div>
                </div>

                <div class="row mt-50">
                    <div class="col-md-2 col-sm-12">
                    </div>
                    <div class="col-md-4 col-sm-12 mobile-response-center">
                        <a href="https://video.patientconnect.io/"><button class="btn btn-primary text-center mobile-margin-r-50 h-55 background-green width-80"><b class="font-s-18">Consultation/Visit ></b></button></a>
                    </div>
                    <div class="col-md-4 col-sm-12 text-right mobile-response-center mobile-mt-20">
                        <a href="{{ route('individual') }}"><button class="btn btn-primary text-center h-55 background-green width-80"><b class="font-s-18">Self-Directed Visit ></b></button></a>
                    </div>
                    <div class="col-md-2 col-sm-12">
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Grid-->

    </main>
    <!-- End #main -->
@endsection