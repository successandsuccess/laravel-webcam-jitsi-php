@extends('layouts.app')

@section('content')
 <!-- ======= Intro Single ======= -->
    <section class="header-section mb-20">
        <div class="margin-l-50 margin-r-50 mt-10">
            <div class="row">
                <div class="col-md-2 text-center">
                    <a class="navbar-brand text-brand" href="{{ route('index') }}"><img src="assets/img/chiroonelogo.svg" alt="logo" id="chiroonelogo"></a>
                </div>
                <div class="col-md-8">
                    <h1 class="text-center special-font">Login or Register for Telehealth</h1>
                </div>
                <div class="col-md-2 text-center m-auto">
                </div>
            </div>

        </div>
    </section>
    <!-- End Intro Single-->

    <!-- ======= Login Section ======= -->
    <div class="intro intro-carousel">
        <div class="carousel-item-a intro-item bg-image d-flex">
            <div class="overlay background-g"></div>
            <div class="m-auto">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 m-auto">
                            <div class="intro-body">
                                <form class="form-a" action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12 mb-20">
                                            <h1 class="text-center special-font">Welcome!</h1>
                                        </div>
                                        <div class="col-md-6 mb-2 padding-r-5">
                                            <div class="form-group">
                                                <input type="email" id="email" class="form-control form-control-lg form-control-a @error('email') is-invalid @enderror" placeholder="Your email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2 padding-l-5">
                                            <div class="form-group">
                                                <input type="password" id="password" class="form-control form-control-lg form-control-a @error('password') is-invalid @enderror" placeholder="Your password" name="password" required autocomplete="current-password">
                                            
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-10">
                                            <button type="submit" class="btn btn-primary  w-100 h-45">Sign In</button>
                                        </div>
                                        <div class="col-md-12">
                                            <a href="{{ route('register') }}"><button type="button" class="btn btn-primary  w-100 h-45">Sign Up</button></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-2 middle-none"></div>
                        <div class="col-lg-4 col-sm-12 m-auto">
                            <img src="assets/img/shutterstock_1683359032.jpg" alt="agent" class="w-450 h-300 mobile-none">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login Section -->
@endsection
