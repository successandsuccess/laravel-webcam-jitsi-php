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
                        <h1 class="text-center special-font">Your Care Plan</h1>
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
            <div class="pt-20 m-auto w-100 mobile-response-center">
                <div class="row w-100">

                    <div class="col-md-3">
                    </div>

                    <div class="col-md-6">

                        <div class="row mb-50">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-2 text-right-mobile">
                                <i class="fa fa-check-circle-o" style="color: #004eff; font-size: 44px;" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-6">
                                <h2>Upper Back Stretches</h2>
                                <p>These exercises will loosen tension in your upper back and help maintain fluidity and motion etc. etc.</p>
                                <iframe width="358" height="167" src="https://www.youtube.com/embed/vuGnzLxRvZM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>

                        <div class="row mb-50">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-2 text-right-mobile">
                                <i class="fa fa-check-circle-o" style="color: #004eff; font-size: 44px;" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-6">
                                <h2>SI Joint Exercises</h2>
                                <p>These exercises will help relieve pressure on your scientic nerve and open your hips for a greater range of motion etc. etc.</p>
                                <iframe width="358" height="167" src="https://www.youtube.com/embed/mTFxY_HS8OM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                       
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>

                        <div class="row mb-50">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-2 text-right-mobile">
                                <i class="fa fa-check-circle-o" style="color: #004eff; font-size: 44px;" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-6">
                                <h2>Lumbar Stenosis Exercises</h2>
                                <p>These exercises will help to improve pain in the lower back due to lumbar stenosies etc. etc.</p>
                                <iframe width="358" height="167" src="https://www.youtube.com/embed/XLLBYnVtMcE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>

                        <div class="row mb-50">
                         <div class="col-md-4"></div>
                         <div class="col-md-6 text-left">
                                <a href="{{ route('recordvideo') }}"><button class="btn btn-primary h-55 background-green width-80"><b class="font-s-18">Finished Watching ></b></button></a>
                         </div>
                         <div class="col-md-2"></div>
                        </div>

                    </div>

                    <div class="col-md-3">
                    </div>

                </div>


            </div>
        </section>
        <!-- End Blog Grid-->

    </main>
    <!-- End #main -->

@endsection