@extends('layouts.app')

@section('content')
<main id="main">
        <!-- ======= Intro Single ======= -->
        <section class="header-section">
            <div class="margin-l-50 margin-r-50 mt-10">
                <div class="row">
                    <div class="col-md-2 text-center">
                        <a class="navbar-brand text-brand" href="{{ route('index') }}"><img src="{{ env('APP_LOGO') }}" alt="logo" id="chiroonelogo"></a>
                    </div>
                    <div class="col-md-8">
                        <h1 class="text-center special-font">Welcome to Chiro One Telehealth</h1>
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
                <div class="row">
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
            </div>
        </section>
        <!-- End Intro Single-->

        <!-- =======  Blog Grid ======= -->
        <section class="news-grid grid background-g">
            <div class="container">
                <div class="row" style="background-image: url('assets/img/shutterstock_130087559.jpg'); height: 74vh; background-size: cover;">
                    <div class="col-md-12 mt-50 text-right">
                        <a href="{{ route('getstarted') }}"><button class="btn btn-primary text-center margin-r-50 h-55 background-c-g"><b class="font-s-18">Begin Telehealth Session</b></button></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Grid-->

    </main>
    <!-- End #main -->
@endsection
