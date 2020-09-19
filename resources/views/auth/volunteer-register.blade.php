@extends('layouts.main1')

@section('title')
Mentor Signup
@endsection

  @section('select2css')
   
  <style>
  
  .center {
  
  padding: 10px;
}

    .text
    {
      margin-top: -5%;
      font-size: 30px;
      margin-left: -35%;
    }
    form input[type=submit]
    {
      background: #038CFC;
      border-radius: 30px 5px;
      border: 2px solid white;      
      color: white;
      font-size: 15px;
      width: 100px; 
      font-weight: 700;
      transition: all 0.3s ease 0s;
      cursor: pointer;
      float: left;
      height: 40px;
      margin-left: 25%;
      margin-top: 15%;
      position: relative;
    }
    form input[type="submit"]:hover 
    {
        border-radius:5px 30px;
         color:white;
    }
    form
    {
      border: 2px solid #038cfc;
    }
    .txt
    {
      font-size: 15px;
      border-bottom: 2px solid grey;
      border-right: 2px solid grey;
      opacity: 0.5;
      width: 250px;
      height: 35px;
      border-radius: 10px;
    }
    @media (max-width:900px) 
    {
      .ftco-section
      {
        background-color: white;
      }
      .ftco-section .container
      {
        background-color: white;
      }    
      .ftco-section .container .row
      {
        margin-left: -100%;
        background-color: white;
      }
      .text
      {
        font-size: 25px;
      }
      form p
        {
          margin-left: -110%;
        }
      form
      {
        border: none;
      }
    }
	
	.con1 { 
  position: relative;
}

.cen1 {
  margin: auto;
  position: absolute;
  left: 60%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
  
  </style>

@endsection

@section('content')
    {{--<div class="hero-wrap" style="height: 0px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Sign Up</span></p>
                <h1  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Job Seeker </h1>
            </div>
        </div>
    </div>
</div>--}}

    <div class="ftco-section bg-light">
      <div class="container">
        <div class="row" style="margin-left: 27%;color: black;font-size: 14px;margin-bottom: -10%;">
       
            @if(Session::has('message'))
                 <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
			
		<div class="col-md-12 mt-5">
        <div class="text-center"><h1 class="text">Mentor Signup</h1></div>
        </div>

          <div class="col-md-9 col-lg-8 mb-5 center" style="color: black; font-size: 14px;">
          
            <form method="POST" action="{{ route('vol.register') }}" class="p-5 bg-white">
                @csrf

                <input type="hidden" value="volunteer" name="user_type">
                               <div class="form-group row">
            
                    <div class="col-md-12">Name</div>

                    <div class="col-md-12">
                        <input id="name" type="text" class="txt form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                        <input id="email" type="text" class="txt form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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
                        <input id="password" type="password" class="txt form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>
                       
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
                        <input id="password-confirm" type="password" class="txt form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group row">
            
                    <div class="col-md-12">Gender</div>

                    <div class="col-md-12">
                        <input type="radio" name="gender" value="male" required="">
						&nbsp;&nbsp; Male <br>
                        <input type="radio" name="gender" value="female">
						&nbsp;&nbsp; Female

                        @if ($errors->has('gender'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>




      <div class="row form-group con1 mt-2 mb-0">
        <div class="col-md-12 cen1">
          <input class="text-center" type="submit" value="Register" class="buttonr px-5 py-2" style="font-size: 17px;">
        </div>
      </div>
	  
	
      <p class="text-dark text-center my-0" style="font-size: 14px;">
 	*Verification link will be sent to your email.
	</p>
	
	</form>
	
    </div>

     
    </div>
         
           
    </div>
    </div> 
    @endsection