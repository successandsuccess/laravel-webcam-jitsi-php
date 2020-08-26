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
                <div class="container mb-80">
                    <div class="row">

                        <div class="col-md-1"></div>
                        <div class="col-md-10 m-auto">
                            <div class="intro-body">
                                

                                    <div class="row">
                                        <div class="col-md-12 mb-20">
                                            <h1 class="text-center special-font">Welcome!</h1>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <article class="card-body">
                                                <a href="{{ route('register') }}" class="float-right btn btn-outline-primary">Sign up</a>
                                                <h4 class="card-title mb-4 mt-1">Sign in</h4>
                                                <form class="form-a" action="{{ route('login') }}" method="POST">
                                                @csrf
                                                    <div class="form-group">
                                                        <label class="color-b">Your email</label>
                                                        <input type="email" id="email" class="form-control form-control-lg form-control-a @error('email') is-invalid @enderror" placeholder="Your email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                        @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                        @enderror

                                                    </div>

                                                    <div class="form-group">
                                                        <label class="color-b">Your password</label>
                                                        <input type="password" id="password" class="form-control form-control-lg form-control-a @error('password') is-invalid @enderror" placeholder="Your password" name="password" required autocomplete="current-password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div> 

                                                    <br>

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary background-green w-100 h-45">Sign In</button>
                                                    </div>      
                                                </form>
                                                </article>
                                            </div>
                                        </div>
                                         
                                     
                                    </div>
                               
                            </div>

                           
                        </div>
                         <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login Section -->
@endsection
