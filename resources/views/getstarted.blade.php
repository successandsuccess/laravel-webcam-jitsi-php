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
                        <h1 class="text-center special-font">What Brings You Here Today?</h1>
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
        <section class="news-grid grid background-g h-80vh">
            <div class="container pt-20">
                <div class="row color-w">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="text-center mt-50">
                            <p class="mb-0 font-19">Welcome!</p>
                            <p class="font-19">Select which type of session you'd like to do today.</p>
                        </div>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>

                <div class="row mt-50">
                    <div class="col-md-2 col-sm-12">
                    </div>
                    <div class="col-md-4 col-sm-12 mobile-response-center">

                        <div class="card custom-card">
                            <div class="card-body text-center">
                                <h4 class="card-title text-center" style="color: #fff9f9;">Chat with your doctor</h4>
                                <h6 class="card-subtitle mb-2 text-center" style="color: #fff9f9;">Schedule a remote one on one with your physician.</h6>

                                <div class="mb-10 mt-10">
                                    @if (isset($providerId) && $providerId != 0)
                                        <select name="provider" id="provider" class="btn text-center h-55 w-100 background-white color-b" style="font-size: larger; text-align:center; text-align-last: center;" data-style="btn-primary">
                                        @foreach($providers as $index => $provider)
                                            @if($index == $providerId)
                                            <option value="<?php echo $index; ?>" selected><?php echo $provider; ?></option>
                                            @else
                                            <option value="<?php echo $index; ?>"><?php echo $provider; ?></option>
                                            @endif
                                        @endforeach
                                        </select>
                                    @else
                                        <select name="provider" id="provider" class="btn text-center h-55 w-100 background-white color-b" style="font-size: larger; text-align:center; text-align-last: center;" data-style="btn-primary">
                                            <option value="0">Select Provider...</option>
                                            <option value="1">Dr.Johns</option>
                                            <option value="2">Dr.Wang</option>
                                            <option value="3">Mr.Smith.CA</option>
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
                                    <button class="btn btn-primary text-center h-55 background-green w-100" id="consultation"><b class="font-s-18">Schedule Session</b></button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-4 col-sm-12 text-right mobile-response-center mobile-mt-20">

                        <div class="card custom-card">
                            <div class="card-body text-center">
                                <h4 class="card-title text-center" style="color: #fff9f9;">Self Directed Visit</h4>
                                <h6 class="card-subtitle mb-2 text-center" style="color: #fff9f9;">Consistency is the key to recovery.</h6>
                                <h6 class="card-subtitle mb-2 text-center mt-10" style="color: #fff9f9;">
                                    Here you can view videos of your prescribed exercises and then record your self
                                    to send to your doctor with questions you have.
                                </h6>


                                <div class="mt-54">
                                    <a href="{{ route('individual') }}"><button class="btn btn-primary text-center h-55 background-green width-80"><b class="font-s-18">Self-Directed Visit ></b></button></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-2 col-sm-12">
                    </div>
                </div>

                <!-- <div class="row mt-50">
                    <div class="col-md-2 col-sm-12">
                    </div>
                    <div class="col-md-4 col-sm-12 mobile-response-center">
                        <button class="btn btn-primary text-center mobile-margin-r-50 h-55 background-green width-80" id="consultation"><b class="font-s-18">Consultation/Visit ></b></button>
                    </div>
                    <div class="col-md-4 col-sm-12 text-right mobile-response-center mobile-mt-20">
                        <a href="{{ route('individual') }}"><button class="btn btn-primary text-center h-55 background-green width-80"><b class="font-s-18">Self-Directed Visit ></b></button></a>
                    </div>
                    <div class="col-md-2 col-sm-12">
                    </div>
                </div> -->
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