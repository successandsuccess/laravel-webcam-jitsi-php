@extends('layouts.app')

@section('content')
<main id="main">
        <!-- <div class="overlay background-g" style="position: unset;"></div> -->
        <!-- ======= Intro Single ======= -->
        <section class="header-section mb-20">
            <div class="margin-l-50 margin-r-50 mt-10">
                <div class="row">
                    <div class="col-md-2 text-center">
                        <a class="navbar-brand text-brand" href="{{ route('index') }}"><img src="{{ env('APP_LOGO') }}" alt="logo" id="chiroonelogo"></a>
                    </div>
                    <div class="col-md-8">
                        <h1 class="text-center special-font">What Brings You Here Today?</h1>
                    </div>
                    <div class="col-md-2 text-center m-auto">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            <div>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();" class="head-logout">
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
        <section class="news-grid grid background-g">
            <div class="container pt-20">
                <div class="row color-w">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="text-center mt-10">
                            <p class="mb-0 font-19">Welcome!</p>
                            <p class="font-19">Select which type of session you'd like to do today.</p>
                        </div>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>

                <div class="row margin-t-10">
                    <div class="col-md-2 col-sm-12">
                    </div>
                    <div class="col-md-4 col-sm-12 mobile-response-center">

                        <div class="card custom-card">
                            <div class="card-body text-center">
                                <h4 class="card-title text-center" style="color: #fff9f9;">Time For Your Appointment</h4>
                                <h6 class="card-subtitle mb-2 text-center" style="color: #fff9f9;">Select the physician you're here to see.</h6>

                                <div class="mb-10 mt-10">
                                    @if (isset($providerId) && $providerId != 0)
                                        <select name="provider" id="provider" class="btn text-center h-55 w-100 background-white color-b" style="font-size: larger; text-align:center; text-align-last: center;" data-style="btn-primary">
                                            <option value="0">Select Provider</option>
                                            @foreach($providers as $provider)
                                                @if($provider->id == $providerId)
                                                <option value="<?php echo $provider->id; ?>" selected><?php echo $provider->name; ?></option>
                                                @else
                                                <option value="<?php echo $provider->id; ?>"><?php echo $provider->name; ?></option>
                                                @endif
                                            @endforeach
                                        </select>
                                    @else
                                        <select name="provider" id="provider" class="btn text-center h-55 w-100 background-white color-b" style="font-size: larger; text-align:center; text-align-last: center;" data-style="btn-primary">
                                            <option value="0">Select Provider</option>
                                            @foreach($providers as $provider)
                                            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                                <div class="mb-10">
                                    @if( isset($timeId) && $timeId != 0 )
                                    <select name="time" id="time" class="btn text-center h-55 w-100 background-white color-b" style="font-size: larger; text-align:center; text-align-last: center;" data-style="btn-primary">
                                        @foreach($times as $index => $time)
                                            @if( $index == $timeId )
                                                <option value="<?php echo $index; ?>" selected><?php echo $time;?></option>
                                            @else
                                                <option value="<?php echo $index; ?>"><?php echo $time;?></option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @else
                                    <select name="time" id="time" class="btn text-center h-55 w-100 background-white color-b" style="font-size: larger; text-align:center; text-align-last: center;" data-style="btn-primary">
                                        <option value="0">Select Time...</option>
                                        <option value="1">1:45pm</option>
                                        <option value="2">2:00pm</option>
                                        <option value="3">3:00pm</option>
                                    </select>
                                    @endif
                                </div>

                                <div>
                                    <button class="btn btn-primary text-center h-55 background-green w-100" id="consultation"><b class="font-s-18">Enter Waiting Room</b></button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-4 col-sm-12 text-right mobile-response-center mobile-mt-20">

                        <div class="card custom-card">
                            <div class="card-body text-center">
                                <h4 class="card-title text-center" style="color: #fff9f9;">Self Directed Visit</h4>
                                <h6 class="card-subtitle mb-2 text-center" style="color: #fff9f9;">Consistency is the key to recovery.</h6>
                                <h6 class="card-subtitle mb-2 text-center mt-54" style="color: #fff9f9;">
                                    Here you can view videos of your prescribed exercises and then record your self
                                    to send to your doctor with questions you have.
                                </h6>


                                <div class="mt-58">
                                    <a href="{{ route('individual') }}"><button class="btn btn-primary text-center h-55 background-green w-100"><b class="font-s-18">Start Session</b></button></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-2 col-sm-12">
                    </div>
                </div>

                <div class="row mt-50">
                    <div class="col-md-3 col-sm-12">
                    </div>
                    <div class="col-md-6 col-sm-12 text-center">
                        <p class="color-w font-12"> 
                            We realize that health is a priority to so many right now. We want to ensure our doctors and clinical team are available to help you with accesssing your
                            chiroprator wherever you're at.
                            Our expert team is here to help you reduce stress on your body so you can keep your health "in check" and continue to do all the things you do each day!
                        </p>

                        <p class="color-w font-12">
                            At Chiro One, our clinical care team remains dedicated to providing exceptional healthcare to our patients. These Telehealth sessions are a great supplement to your 
                            already existing in-office chiropratic appointments.
                        </p>
                       
                    </div>
                    <div class="col-md-3 col-sm-12">
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
    console.log("JavaScript Running now!");
    $('#consultation').click(function () {
        console.log('Consultation Clicked');
        console.log($('#provider').val());
        console.log($('#time').val());
        var provider = $('#provider').val();
        var time = $('#time').val();
        if (provider == 0 || time == 0) {
            window.alert('Please choose the Provider and the time you want.');
        } else {
            window.location = '/waiting?provider='+provider+'&time='+time;
        }
    });
</script>
@endsection