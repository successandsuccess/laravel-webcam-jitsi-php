@extends('layouts.app')

@section('content')
<style>
    .image-w-mobile{
        width: 80%;
    }
    .mt-50-mobile {
        margin-top: 50px;
    }
    @media (max-height: 800px) {
        .image-w-mobile {
            width: 70%;
        }
        .mt-50-mobile {
            margin-top: 10px;
        }
    }
</style>
<main id="main">
        <!-- ======= Intro Single ======= -->
        <section class="header-section mb-20">
            <div class="margin-l-50 margin-r-50 mt-10">
                <div class="row">
                    <div class="col-md-2 text-center">
                        <a class="navbar-brand text-brand" href="{{ route('index') }}"><img src="assets/img/chiroonelogo.svg" alt="logo" id="chiroonelogo"></a>
                    </div>
                    <div class="col-md-8">
                        <h1 class="text-center special-font">Record Your Session</h1>
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
        <section class="news-grid grid d-flex" style="height: 80vh;">
            <div class="pt-20 m-auto w-100">
                <div class="container">
                    <div class="row w-100">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 text-center">
                            <h2>Next: Record Your Exercises</h2>
                            <p>Now, you will record a video session, performing the exercises that you watched in your individualized care plan.</p>
                  
                            <div class="card custom-card">
                                <div class="card-body text-left">
                                    <h4 class="card-title text-left">1. Allow camera access</h4>
                                    <h6 class="card-subtitle mb-2 text-left">
                                        When you launch the video session, you may be prompted to "allow camera access" and/or "allow microphone access" from your web browser.
                                    </h6>

                                    <h4 class="card-title text-left mt-10">
                                        2. Make sure you are in the frame
                                    </h4>
                                    <h6 class="card-subtitle mb-2 text-left">
                                        It's important that you have enough space in the room and distance from the camera so that our chiropractors 
                                        and clinicians can fully see you and evaluate your range of motion and posture during the exercise.
                                    </h6>

                                    <h4 class="card-title text-left mt-10">
                                        3. Download a copy for yourself
                                    </h4>
                                    <h6 class="card-subtitle mb-2 text-left">
                                        Your video will automatically be sent to your doctor but if you want a copy for yourself, be sure to click Download after you finish recording.
                                    </h6>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>

                    <div class="row mt-50-mobile">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-center">
                            <a href="{{ route('streamrecord') }}"><button class="btn btn-primary h-55 background-green w-100"><b class="font-s-18">Start Video Session</b></button></a>
                            <!-- <button class="btn btn-primary h-55 background-green width-80" data-toggle="modal" data-target="#demo-modal-3">
                              <b class="font-s-18">Record Video Session</b>
                            </button> -->
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Grid-->

    </main>
    <!-- End #main -->
@endsection
