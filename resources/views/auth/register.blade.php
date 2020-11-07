@extends('layouts.main')
@section('content')
<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Sign Up</span></p>
                <h1  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Job Seeker Registration</h1>
            </div>
        </div>
    </div>
</div>

    <div class="ftco-section bg-light">
      <div class="container">
        <div class="row">
            @if(Session::has('message'))
                 <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif

          <div class="col-md-12 col-lg-8 mb-5">          
            <form method="POST" action="{{ route('register') }}" class="p-5 bg-white">
                        @csrf

                        <input type="hidden" value="seeker" name="user_type">
                        <input type="hidden" value="immediately" name="notifications_frequency">

                        <div class="form-group row">                    
                            <div class="col-md-12">Name</div>
                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="your name here" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">                    
                            <div class="col-md-12">Email Address</div>
                            <div class="col-md-12">
                                <input id="email" type="text" placeholder="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">                    
                            <div class="col-md-12">Date of Birth</div>
                            <div class="col-md-12">
                            <input type="text" id="date_dob" class="txt form-control datepicker @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required>
                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group row">                    
                            <div class="col-md-12">Password</div>
                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">Confirm password</div>
                            <div class="col-md-12">
                                <input id="password-confirm" placeholder="confirm password" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">                    
                            <div class="col-md-12">Gender</div>
                            <div class="col-md-12">
                                <input type="radio" name="gender" value="male" required="">&nbsp;&nbsp; Male
                                <input type="radio" name="gender" value="female">&nbsp;&nbsp; Female

                                @if ($errors->has('gender'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Register as Job Seeker" class="btn btn-primary  py-2 px-5">
                </div>
              </div>  
            </form>
          </div>

          <div class="col-lg-4">                   
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>Once you create an account a verification link will be sent to your email.</p>
              <!--<p><a href="#" class="btn btn-primary  py-2 px-4">Learn More</a></p>-->
            </div>
          </div>


        </div>
      </div>
    </div>

@endsection
