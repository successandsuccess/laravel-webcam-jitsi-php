@extends('layouts.app')

@section('content')

<section class="header-section mb-20">
        <div class="margin-l-50 margin-r-50 mt-10">
            <div class="row">
                <div class="col-md-2 text-center">
                    <a class="navbar-brand text-brand" href="{{ route('index') }}"><img src="assets/img/chiroonelogo.svg" alt="logo" id="chiroonelogo"></a>
                </div>
                <div class="col-md-8">
                    <h1 class="color-b text-center special-font">Patient Intake Form</h1>
                </div>
                <div class="col-md-2 text-center m-auto">
                          <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                    
                                <div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            
                        @endguest
                    </ul>
       
                </div>
            </div>

        </div>
    </section>


    <main id="main">

        <!-- ======= Intro Single ======= -->
        <section class="h-80vh d-flex">
            <div class="container m-auto">
                <div class="row">
                    <div class="container">
                        <!--multisteps-form-->
                        <div class="multisteps-form">
                            <!--form panels-->
                            <div class="row">
                                <div class="col-12 col-lg-8 m-auto">
                                    <form class="multisteps-form__form" action="{{ route('register') }}" method="POST">
                                        @csrf

                                        <!--single form panel-->
                                        <div class="multisteps-form__panel p-4 rounded bg-white js-active" data-animation="scaleIn">
                                            <div class="multisteps-form__title">
                                                <input type="radio" id="male" name="gender" value="1" checked>
                                                <label for="male">Mr.</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="female" name="gender" value="0">
                                                <label for="female">Mrs.</label>
                                            </div>

                                            <div class="multisteps-form__content">
                                                <div class="form-row mt-4">
                                                    <div class="col-12 col-sm-6">
                                                        <input id="name" class="multisteps-form__input form-control @error('name') is-invalid @enderror" name="name" type="text" placeholder="First Name*" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                        <input class="multisteps-form__input form-control" name="lname" type="text" placeholder="Last Name*" required/>
                                                    </div>
                                                </div>

                                                <div class="form-row mt-4">
                                                    <div class="col-12 col-sm-9">
                                                        <input id="street" name="street" class="multisteps-form__input form-control" type="text" placeholder="Street" />
                                                    </div>
                                                    <div class="col-12 col-sm-3 mt-4 mt-sm-0">
                                                        <input id="no" name="no" class="multisteps-form__input form-control" type="text" placeholder="No" />
                                                    </div>
                                                </div>

                                                <div class="form-row mt-4">
                                                    <div class="col-12 col-sm-9">
                                                        <input id="city" name="city" class="multisteps-form__input form-control" type="text" placeholder="City" />
                                                    </div>
                                                    <div class="col-12 col-sm-3 mt-4 mt-sm-0">
                                                        <input id="zip" name="zip" class="multisteps-form__input form-control" type="text" placeholder="Zip" />
                                                    </div>
                                                </div>

                                                <div class="form-row mt-4">
                                                    <div class="col-12 col-sm-6">
                                                        <input id="email" name="email"  class="multisteps-form__input form-control @error('email') is-invalid @enderror" type="email" placeholder="E-Mail*" value="{{ old('email') }}" required autocomplete="email" />
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                        <input id="phone" name="phone" required class="multisteps-form__input form-control" type="text" placeholder="Phone*" />
                                                    </div>
                                                </div>

                                                <div class="form-row mt-4">
                                                    <div class="col-12 col-sm-6">
                                                        <input id="password" name="password" class="multisteps-form__input form-control @error('password') is-invalid @enderror" type="password" placeholder="Enter Password*" required autocomplete="new-password"/>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                        <input id="password-confirm" name="password_confirmation" class="multisteps-form__input form-control" type="password" placeholder="Confirm Password" required autocomplete="new-password"/>
                                                    </div>
                                                </div>

                                                <div class="form-row mt-4">
                                                    <div class="col-12 col-sm-6">
                                                        <input id="insurance_carrier" name="insurance_carrier" class="multisteps-form__input form-control" type="text" placeholder="Insurance Carrier" />
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                        <input id="insurance_phone" name="insurance_phone" class="multisteps-form__input form-control" type="number" placeholder="Insurance Phone*" required/>
                                                    </div>
                                                </div>

                                                <div class="form-row mt-4">
                                                    <div class="col-12 col-sm-6">
                                                        <input id="group" name="group" class="multisteps-form__input form-control" type="text" placeholder="Group#" />
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                        <input id="policy_id" name="policy_id" class="multisteps-form__input form-control" type="text" placeholder="Policy ID#*" />
                                                    </div>
                                                </div>

                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn btn-primary ml-auto js-btn-next" type="submit" title="Next">Register</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Intro Single-->


    </main>
    <!-- End #main -->
@endsection
