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
                        <h1 class="text-center special-font">Waiting the Meet with Provider</h1>
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
                <div class="contianer">

                    <div class="col-md-6 m-auto">

                        <div class="row mb-50 ">
                            <div class="col-md-2 text-right-mobile">
                                <h2>Provider:</h2>
                            </div>
                            <div class="col-md-10">
                                <h2>{{ $provider }}</h2>
                            </div>
                        </div>

                        <div class="row mb-50">
                            <div class="col-md-2 text-right-mobile">
                                <h2>Time:</h2>
                            </div>
                            <div class="col-md-10">
                                <h2>{{ $time }}</h2>
                                <p>This is the time to take meeting with your provider {{ $provider }}</p>
                            </div>
                        </div>

                        <div class="row mb-50">
                            <div class="col-md-2 text-right-mobile">
                                <i class="fa fa-check-circle-o" style="color: #004eff; font-size: 44px;" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-10">
                                <h2 id="jitsimeet" class="special-font" style="cursor:pointer; color:red;">Meet Now</h2>
                                <p>This is the meeting link. you can click to go to meet</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6 text-right-mobile">
                                <a href="{{ route('getstarted', ['provider' => $providerId, 'time' => $timeId]) }}"><button class="btn btn-primary  h-55 background-green width-80"><b class="font-s-18">Go Back ></b></button></a>
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