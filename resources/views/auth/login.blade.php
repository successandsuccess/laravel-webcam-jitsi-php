@extends('layouts.auth')

@section('content')
 <!-- ======= Intro Single ======= -->
   
    <div class="container">

                <div class="row mt-40px mb-50px">
                    <div class="col-md-12 text-center">
                        <a href="{{ route('index') }}"><img class="height-110px" src="{{ asset('admin_assets/dist/img/PatientConnectLogo.png') }}" alt="logo" id="chiroonelogo"></a>
                    </div>
                </div>

                <div class="row">
                        <div class="col-md-6 m-auto text-center">
                            <h1 class="patient-bold-h1-font mb-20px">Login or Sign Up</h1>
                            <form class="form-a" action="{{ route('login') }}" method="POST">
                                @csrf
                                    <div class="form-group pl-90px pr-90px">
                                        <input type="email" id="email" class="form-control form-control-lg form-control-a @error('email') is-invalid @enderror height-59px custom-16-font" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-0 pl-90px pr-90px">
                                        <input type="password" id="password" class="form-control form-control-lg form-control-a @error('password') is-invalid @enderror height-59px custom-16-font" placeholder="Password" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> 
                                    <div class="form-group text-left pl-105px">
                                        <a href="#" class="login-link-small-font ">Forgot your password?</a>
                                    </div>
                                    <div class="form-group mt-20px">
                                        <button type="submit" class="btn btn-blue custom-btn-text width-328px height-36px">Sign In</button>
                                    </div>      
                            </form>

                            <p class="custom-16-font">New around here? <a href="{{ route('register') }}" class="color-lightblue">Create your account</a></p>
                        </div>
                        <div class="col-md-6">
                            <img class="width-100" src="{{ asset('admin_assets/dist/img/PatientConnectAvatar1.jpg') }}" alt="diagnos image">
                        </div>
                </div>

    </div>
                
 
    <!-- End Intro Single-->


                    

@endsection
