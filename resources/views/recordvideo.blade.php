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
                        <h1 class="text-center special-font">Record Video Session</h1>
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
        <section class="news-grid grid d-flex" style="height: 80vh;">
            <div class="pt-20 m-auto w-100">
                <div class="container">
                    <div class="row w-100">
                        <div class="col-md-1"></div>
                        <div class="col-md-10 text-center">
                            <p>Now, you will record a video session, performing the exercises that you watched in your individualized care plan.</p>
                            <p>When you're ready, press the "Record Video Session" button below and you will be taken to a video room. Make Sure you have enough space in the room and distance from the camera so that our chiropractors and clinicians can evaluate
                                your range of motion and posture during the exercise.
                            </p>
                            <p>
                                When you launch the video session, you may be prompted to "allow camera access" and/or "allow microphone access" from your web browser. Microphone access is not required but camera access is, please ensure it is allowed and you can see yourself in the
                                preview frame before beginning your exercise.
                            </p>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 text-left-mobile mb-20">
                            <img class="image-w-mobile" src="assets/img/shutterstock_1683359032.jpg" alt="agent-1">
                        </div>
                        <div class="col-md-6 text-right-mobile mb-20">
                            <img  class="image-w-mobile" src="assets/img/shutterstock_792864508.jpg" alt="agent-1">
                        </div>
                    </div>

                    <div class="row mt-50-mobile">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-center">
                            <a href="{{ route('streamrecord') }}"><button class="btn btn-primary h-55 background-green width-80"><b class="font-s-18">Record Video Session</b></button></a>
                            <!-- <button class="btn btn-primary h-55 background-green width-80" data-toggle="modal" data-target="#demo-modal-3">
                              <b class="font-s-18">Record Video Session</b>
                            </button> -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Grid-->

    </main>
    <!-- End #main -->
@endsection
