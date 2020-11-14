@extends('layouts.main')

@section('select2css')
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css" rel="stylesheet" />
   
   <link href="{{ asset('css/select2-bootstrap.min.css') }}" rel="stylesheet">
   <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />-->
   <style>
    .form-group.required .control-label:after {
        content:"*";
        color:red;
      }

      .select2-selection__rendered {
        line-height: 47px !important;
        }
        .select2-container .select2-selection--single {
            height: 51px !important;
        }
        .select2-selection__arrow {
            height: 50px !important;
        }
    </style>
@endsection
@section('content')

<div class="hero-wrap" style="height: 300px; background: #038cfc">
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 300px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 30px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                    <u>Edit Profile Information</u></h1>
              </div>
              <div class="col-md-4 ftco-animate text-center text-md-right mb-5" data-scrollax=" properties: { translateY: '70%' }">
                @if(!empty(Auth::user()->profile->phone_number))
                   {{--<a href="{{route('company.view')}}"><button class="btn btn-danger btn-lg">Edit</button></a>--}}
 
                   <a class="btn btn-warning" href="{{route('user.history',[Auth::user()->id])}}" role="button"><u><strong>Continue</strong></u> &nbsp;&nbsp;<i class="ion-ios-arrow-forward"></i>
                     <br><small>Education & Work History</small></a>
 
                @endif
             </div>
          </div>
    </div>
</div>

<section class="ftco-section bg-light">
<div class="container">
    <div class="row">

        <div class="col-md-3 px-4">
            @if(empty(Auth::user()->profile->profile_pic))
            <img src="{{asset('profile_pic/man.jpg')}}" width="100" style="width: 100%;">
            @else
            <img src="{{asset('uploads/profile_pic')}}/{{Auth::user()->profile->profile_pic}}" width="100" style="width: 100%;">

            @endif

            <br>
            <br>
            

                <div class="card">
                    <div class="card-header d-inline-block text-dark font-weight-bold font-size: 12px; mb-0">Update profile picture</div>
                    <div class="card-body">
                        <form action="{{route('profile_pic')}}" method="POST" enctype="multipart/form-data">@csrf
                        <input type="file" class="form-control" name="profile_pic">
                        <br>
                        <button class="btn btn-info btn-sm float-left" type="submit">Update</button>
                    
                        @if($errors->has('profile_pic'))
                            <div class="error" style="color: red;">{{$errors->first('profile_pic')}}</div>
                        @endif
                        </form>

                        <!-- Button trigger modal -->
                        @if(!empty(Auth::user()->profile->profile_pic))
                        <button type="button" class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#pic{{Auth::user()->profile->id}}">
                            Remove
                        </button>
                        @endif
                        
                        
                        <!-- Modal -->
                        <div class="modal fade" id="pic{{Auth::user()->profile->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Profile Picture</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                Your profile picture will be removed. Are you sure?
                                </div>
                                <div class="modal-footer">
                                <form action="{{route('spic.delete')}}" method="POST">@csrf
                                    <input type="hidden" name="id" value="{{Auth::user()->profile->id}}">
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!-- End Button trigger modal -->



                    </div>
                </div>
            
    
            
            <br>
           
            <div class="card">
                <div class="card-header d-inline-block text-dark font-weight-bold font-size: 12px; mb-0">Update Resume</div>
                <div class="card-body">
                    <form action="{{route('resume')}}" method="POST" enctype="multipart/form-data">@csrf
                        <input type="file" class="form-control" name="resume">
                        <br>
                        <p style="color: rgb(236, 32, 32); font-weight: bold; font-size: 12px;">*[FILE-FORMAT: ONLY PDF]</p>
                        <button class="btn btn-info btn-sm float-left" type="submit">Update</button>
                
                     @if($errors->has('resume'))
                    <div class="error" style="color: red;">{{$errors->first('resume')}}</div>
                     @endif
                     </form>

                <!-- Button trigger modal -->
               @if(!empty(Auth::user()->profile->resume))
                <button type="button" class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#res{{Auth::user()->profile->id}}">
                    Remove
                </button>
                @endif
                
                
                <!-- Modal -->
                <div class="modal fade" id="res{{Auth::user()->profile->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Resume</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        Your resume will be removed. Are you sure?
                        </div>
                        <div class="modal-footer">
                        <form action="{{route('resume.delete')}}" method="POST">@csrf
                            <input type="hidden" name="id" value="{{Auth::user()->profile->id}}">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- End Button trigger modal -->
                
                </div>
            </div>
            
            <br>
            <div class="card">
                <div class="card-header d-inline-block text-dark font-weight-bold font-size: 12px; mb-0">About me (preview)</div>
                <div class="card-body">
                @if(!empty(Auth::user()->profile->resume))
                    <p style="font-weight: bold; font-size: 18px;"><a href="{{Storage::url(Auth::user()->profile->resume)}}">View Resume</a></p>
                @else
                    <p style="color: rgb(236, 32, 32); font-weight: bold; font-size: 18px;">Please upload your resume</p>
                @endif

                @if(empty(Auth::user()->profile->profile_pic))
                    <p style="color: rgb(236, 32, 32); font-weight: bold; font-size: 18px;">Please upload your profile picture</p>
                @endif
               
                <p><strong>Member since:</strong> &nbsp; &nbsp; {{date('F d Y',strtotime(Auth::user()->created_at))}}</p>
                <p><strong>Name:</strong> &nbsp; &nbsp; {{Auth::user()->name}}</p>
                <p><strong>Gender:</strong> &nbsp; &nbsp; {{Auth::user()->profile->gender}}</p>
                <p><strong>Date of Birth:</strong> &nbsp; &nbsp; {{Auth::user()->profile->dob}}</p>
                <p><strong>Email:</strong> &nbsp; &nbsp; {{Auth::user()->email}}</p>
                <p><strong>Phone:</strong> &nbsp; &nbsp; {{Auth::user()->profile->phone_number}}</p>
                <p><strong>Address:</strong> &nbsp; &nbsp; {{Auth::user()->profile->address_line1}},
                {{Auth::user()->profile->address_line2}}<br>
                {{Auth::user()->profile->city}},&nbsp;{{Auth::user()->profile->state}},
                {{Auth::user()->profile->country}}</p>
                <p>Pincode:&nbsp; &nbsp; {{Auth::user()->profile->pincode}}</p>
                <p><strong>Experience:</strong> &nbsp; &nbsp;<br>
                    {{Auth::user()->profile->experience_years}}year(s)
                    &nbsp;{{Auth::user()->profile->experience_months}}months(s)</p>
                <p><strong>Company (Recent/Current):</strong><br>{{Auth::user()->profile->recent_company}}</p>
                <p><strong>Designation (Recent/Current):</strong><br>{{Auth::user()->profile->recent_designation}}</p>
                <p><strong>Start Date:</strong><br>{{Auth::user()->profile->start_date}}<strong>,
                    &nbsp; &nbsp; <br>End Date:</strong><br>{{Auth::user()->profile->end_date}}</p>
                {{--<p><strong>Function:</strong><br>{{Auth::user()->profile->function}}</p>--}}
                <p><strong>Industry (Recent/Current):</strong><br>{{Auth::user()->profile->industry}}</p>              
                <p><strong>Recent/Current CTC (in INR):</strong><br>{{Auth::user()->profile->salary_in_lakhs}}&nbsp;Lakh(s) 
                    &nbsp;{{Auth::user()->profile->salary_in_thousands}}Thousand(s)</p>
                <p><strong>Expected CTC:</strong><br>{{Auth::user()->profile->expected_ctc}}&nbsp;</p>
                <p><strong>Preferred Location:</strong><br>{{Auth::user()->profile->preferred_location}}</p>
                <p><strong>Notice Period:</strong><br>{{Auth::user()->profile->notice_period}}</p>
            </div>
            </div>
            <br>
 
        </div>

        <div class="col-md-9 px-4">

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            
            @endif
            
            <div class="card">
                <div class="card-header d-inline-block h5 text-dark font-weight-bold mb-0">Primary Information</div>
                
                <form  id="frmParameter" action="{{route('profile.create')}}" method="POST">@csrf
                    <div class="card-body">
                    <div class="form-group required">
                        <label for=""  class="control-label h6">Phone number</label>
                        <input type="text" class="form-control" name="phone_number" value="{{Auth::user()->profile->phone_number?Auth::user()->profile->phone_number:old("phone_number")}}">
                        {{-- <input type="text" class="form-control" name="phone_number"> --}}
                        @if($errors->has('phone_number'))
                            <div class="error" style="color: red;">{{$errors->first('phone_number')}}</div>
                        @endif
                                      
                    </div>

                    <div class="form-group required">
                        <label for="" class="control-label h6">Address Line 1</label>
                        <input type="text" class="form-control" name="address_line1" value="{{Auth::user()->profile->address_line1?Auth::user()->profile->address_line1:old("address_line1")}}">
                        @if($errors->has('address_line1'))
                         <div class="error" style="color: red;">{{$errors->first('address_line1')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="" class="h6">Address Line 2</label>
                        <input type="text" class="form-control" name="address_line2" value="{{Auth::user()->profile->address_line2?Auth::user()->profile->address_line2:old("address_line2")}}">
                        @if($errors->has('address_line2'))
                         <div class="error" style="color: red;">{{$errors->first('address_line2')}}</div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                        <div class="form-group required">
    
                            <label for="country" class="control-label h6">Select your country</label>
                            
                            <select name="country" id="country" class="form-control">
                                <option value="">Select Country</option>
                                @foreach($countries as $key => $value)
                                <option value="{{$key}}" {{Auth::user()->profile->country==$value?'selected':''}}>{{$value}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('country'))
                            <div class="error" style="color: red;">{{$errors->first('country')}}</div>
                            @endif
                                                    
                        </div>
                        </div>
                        <div class="col-md-4">                           
                                                        
                        <div class="form-group required">    
                              <label for="state" class="control-label h6">Select your state</label>                            
                            <select name="state" id="state" class="form-control">
                                <option value="">Select state</option>                            
                            </select>
                                
                            @if($errors->has('state'))
                            <div class="error" style="color: red;">{{$errors->first('state')}}</div>
                            @endif
                                                    
                        </div>
                    </div>
                    <div class="col-md-4">
                            
                        <div class="form-group required">    
                            <label for="city" class="control-label h6">Select your city</label>                            
                            <select name="city" id="city" class="form-control">
                                <option value="">Select City</option>
                            </select>
                            @if($errors->has('city'))
                            <div class="error" style="color: red;">{{$errors->first('city')}}</div>
                            @endif
                                                    
                        </div>
    
                    </div>
                </div>
                        

                    <div class="form-group required">
                        <label for="pincode" class="control-label h6">{{ __('Pincode') }}</label>
                        
                            <input type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode"  value="{{Auth::user()->profile->pincode?Auth::user()->profile->pincode:old("pincode")}}">
                            @error('pincode')
                            <span class="invalid-feedback" role="alert">
                            <strong>Please enter valid 6 digit pincode</strong>
                            </span>
                            @enderror
                        
                    </div>
                    
                    <br>
                    <p class="mb-0"> <label for="experience" class="h6">Overall Experience<span style="color:red">*</span></label> &nbsp; &nbsp;
                    <span style="color:red">If no value is selected. 0 year(s) will be set by default.</span></p>
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <span class="my-0" style="color:rgb(42, 57, 195);">Years</span> 
                        <select name="experience_years" class="form-control">                         
                             @for ($i = 0; $i <= 50; $i++)
                            <option value="{{ $i }}" {{Auth::user()->profile->experience_years==$i?'selected':''}}>{{ $i }} &nbsp; year(s)</option>
                            @endfor
                        </select>
                        @if($errors->has('experience_years'))
                        <div class="error" style="color: red;">{{$errors->first('experience_years')}}</div>
                        @endif

                    </div>
                    </div>
                    <div class="col-md-6">

                    <div class="form-group">
                        <span class="my-0" style="color:rgb(42, 57, 195);">Months</span> 
                        <select name="experience_months" class="form-control">
                            <option value="">Select</option>
                             @for ($i = 1; $i <= 11; $i++)
                            <option value="{{ $i }}" {{Auth::user()->profile->experience_months==$i?'selected':''}}>{{ $i }} &nbsp; month(s)</option>
                            @endfor
                        </select>
                        @if($errors->has('experience_months'))
                        <div class="error" style="color: red;">{{$errors->first('experience_months')}}</div>
                        @endif

                    </div>
                    </div>
                    </div>

                    <hr>

                    <div class="form-group">
                    <h6 style="color:rgb(42, 57, 195); font-weight: bold;">
                        <input type="checkbox" style= "transform: scale(1.7);"  class="checkdisplay" name="fresher" value="fresher" />
                        &nbsp;&nbsp; Fresher <span style="color: rgb(236, 32, 32); font-weight: bold;"> [Please check this box if you are a fresher] </span>
                        </h6>
                        @if($errors->has('fresher'))
                         <div class="error" style="color: red;">{{$errors->first('fresher')}}</div>
                        @endif
                        </div>

                        <div id="todisplay">
                        <p class="mb-0"> <h5><u><strong>Most Recent/Current Employment Details: </strong></u></h5>
                        <span style="color:rgb(209, 39, 39)">
                        For work history details prior to 'most recent/current' employment,
                        please visit the link ('<strong>Education & Work History</strong>') which will appear on top, after this form is submitted.
                        </span></p>
                        <br>
                        <div class="form-group">

                        <label for="" class="h6">Company Name (Recent/Current)</label>
                        <input type="text" class="form-control" name="recent_company" value="{{Auth::user()->profile->recent_company?Auth::user()->profile->recent_company:old("recent_company")}}">
                        @if($errors->has('recent_company'))
                        <div class="error" style="color: red;">{{$errors->first('recent_company')}}</div>
                        @endif
                    </div>

                    {{--<div class="form-group">
                        <label for="">Designation (Current/Previous)</label>
                        <input type="text" class="form-control" name="recent_designation" value="{{Auth::user()->profile->recent_designation?Auth::user()->profile->recent_designation:old("recent_designation")}}">
                        @if($errors->has('recent_designation'))
                        <div class="error" style="color: red;">{{$errors->first('recent_designation')}}</div>
                        @endif
                    </div>--}}


                    <div class="form-group">

                        <label for="recent_designation" class="h6">Designation (Recent/Current)</label>


                          <select class="form-control select1" name="recent_designation">
                            <option></option>
                            @foreach($recent_designation as $rd)
                              <option value="{{$rd}}" {{Auth::user()->profile->recent_designation==$rd?'selected':''}}>{{$rd}}</option>
                            @endforeach
                          </select>
                        
                       {{-- <input class="form-control" value="{{Auth::user()->profile->recent_designation?Auth::user()->profile->recent_designation:old("recent_designation")}}" name="recent_designation" list="recent_designation">
                            <datalist id="recent_designation">
                                @foreach($recent_designation as $rd)
                                <option value="{{$rd}}">
                                @endforeach
                            </datalist>--}}
                        @if($errors->has('recent_designation'))
                        <div class="error" style="color: red;">{{$errors->first('recent_designation')}}</div>
                        @endif
                
                    </div>

                     {{--
                        <div class="form-group">

                        <label for="function" class="h6">Function (Recent/Current)</label>              
                        
                        <input type="text" class="form-control" name="function" value="{{Auth::user()->profile->function?Auth::user()->profile->function:old("function")}}">
                        @if($errors->has('function'))
                        <div class="error" style="color: red;">{{$errors->first('function')}}</div>
                        @endif
                        </div>--}}

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
            
                        <label for="" class="h6">Started Working From:</label>
    
                        
                            <input type="text" id="date_sd" class="form-control datepicker-YM" name="start_date" value="{{Auth::user()->profile->start_date?Auth::user()->profile->start_date:old("start_date")}}">
    
                            @if($errors->has('start_date'))
                            <div class="error" style="color: red;">{{$errors->first('start_date')}}</div>
                           @endif
                        
                    </div>
                    </div>
                    <div class="col-md-6">

                    <div class="form-group">
            
                        <label for="" class="h6">Worked Till:</label>
                    
                        <input type="text" id="date_ed" class="form-control datepicker-YM" name="end_date" value="{{Auth::user()->profile->end_date?Auth::user()->profile->end_date:old("end_date")}}">
    
                         <br>   
                        <h6 style="color:rgb(42, 57, 195); font-weight: bold;">
                        <input type="checkbox"  style= "transform: scale(1.7);" name="currently_working_here" value="Currently working here" />
                        &nbsp;&nbsp; Currently working here
                        </h6>
                        
                        @if($errors->has('end_date'))
                        <div class="error" style="color: red;">{{$errors->first('end_date')}}</div>
                       
                        @elseif($errors->has('currently_working_here'))
                        <div class="error" style="color: red;">{{$errors->first('currently_working_here')}}</div>
                       @endif
                        
                    </div>

                    </div>
                    </div>

                    {{--   
                        <input class="form-control" value="{{Auth::user()->profile->recent_designation?Auth::user()->profile->recent_designation:old("recent_designation")}}" name="recent_designation" list="recent_designation">
                            <datalist id="recent_designation">
                                @foreach($recent_designation as $rd)
                                <option value="{{$rd}}">
                                @endforeach
                            </datalist>--}}

                    <div class="form-group">
                        <label for="industry" class="h6">Industry (Recent/Current)</label>
                        
                        <select class="form-control select1" name="industry">
                            <option></option>
                            @foreach($industry as $ind)
                              <option value="{{$ind}}" {{Auth::user()->profile->industry==$ind?'selected':''}} >{{$ind}}</option>
                            @endforeach
                          </select>
                        
                        {{--<input class="form-control" value="{{Auth::user()->profile->industry?Auth::user()->profile->industry:old("industry")}}"  name="industry" list="industry">
                            <datalist id="industry">
                                @foreach($industry as $ind)
                                <option value="{{$ind}}">
                                @endforeach
                            </datalist>--}}
                            @if($errors->has('industry'))
                            <div class="error" style="color: red;">{{$errors->first('industry')}}</div>
                           @endif
                        
                    </div>

                    <br>
                    <p class="mb-0"> <label for="salary_in_lakhs" class="h6">Recent/Current CTC (in INR):</label> &nbsp; &nbsp;
                    <span style="color:red">If no value is selected. 0 Lakh(s) will be set by default.</span></p>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            
                            <span class="my-0" style="color:rgb(42, 57, 195);">Salary (in Lakhs)</span>                            
                            <select name="salary_in_lakhs" class="form-control">
                                @for ($i = 0; $i <= 99; $i++)
                               <option value="{{ $i }}" {{Auth::user()->profile->salary_in_lakhs==$i?'selected':''}}>{{ $i }} &nbsp; Lakh(s)</option>
                               @endfor
                           </select>
                           @if($errors->has('salary_in_lakhs'))
                           <div class="error" style="color: red;">{{$errors->first('salary_in_lakhs')}}</div>
                           @endif
                        </div>

                    </div>
                    <div class="col-md-6">
                        
                    <div class="form-group">
                        <span class="my-0" style="color:rgb(42, 57, 195);">Salary (in Thousands)</span>
                        <input type="text" class="form-control" name="salary_in_thousands" value="{{Auth::user()->profile->salary_in_thousands?Auth::user()->profile->salary_in_thousands:old("salary_in_thousands")}}">
                        @if($errors->has('salary_in_thousands'))
                        <div class="error" style="color: red;">{{$errors->first('salary_in_thousands')}}</div>
                        @endif
                    </div>
                    </div>
                    </div>
                        
                </div>
                    <hr>
                    <div class="form-group">
                        <label for="expected_ctc" class="h6">Expected CTC (in Lakhs):</label>
                        <input type="text" class="form-control" name="expected_ctc" 
                        placeholder="eg: 8 LPA" 
                        value="{{Auth::user()->profile->expected_ctc?Auth::user()->profile->expected_ctc:old("expected_ctc")}}">
                        @if($errors->has('expected_ctc'))
                        <div class="error" style="color: red;">{{$errors->first('expected_ctc')}}</div>
                        @endif
                    </div>

                    
                    
                        {{--Needs dropdown list of states
                        
                        <div class="form-group">
                            <label for="">Preferred Location</label>
                            <input type="text" class="form-control" name="preferred_location" value="{{Auth::user()->profile->preferred_location}}">
                            @if($errors->has('preferred_location'))
                            <div class="error" style="color: red;">{{$errors->first('preferred_location')}}</div>
                            @endif
                        </div>--}}

                        <div class="form-group">

							<label for="preferred_location" class="h6">Preferred location</label>
							
							<input class="form-control" value="{{Auth::user()->profile->preferred_location?Auth::user()->profile->preferred_location:old("preferred_location")}}" name="preferred_location" list="preferred_location">
                                <datalist id="preferred_location">
                                    @foreach($preferred_location as $pl)
                                    <option value="{{$pl}}">
                                    @endforeach
                                </datalist>
                            @if($errors->has('preferred_location'))
                            <div class="error" style="color: red;">{{$errors->first('preferred_location')}}</div>
                            @endif
					
                        </div>
                        
                        <div class="form-group required">
                            <label for="notice_period" class="control-label h6">Notice Period</label>
                            <select class="form-control" name="notice_period">
                                <option value="" {{Auth::user()->profile->notice_period==''?'selected':''}}>Select</option>
                                <option value="Immediately" {{Auth::user()->profile->notice_period=='Immediately'?'selected':''}}>Immediately</option>
                                <option value="15 Days or less" {{Auth::user()->profile->notice_period=='15 Days or less'?'selected':''}}>15 Days or less</option>
                                <option value="1 Month" {{Auth::user()->profile->notice_period=='1 Month'?'selected':''}}>1 Month</option>
                                <option value="2 Months" {{Auth::user()->profile->notice_period=='2 Months'?'selected':''}}>2 Months</option>
                                <option value="3 Months" {{Auth::user()->profile->notice_period=='3 Months'?'selected':''}}>3 Months</option>
                                <option value="More than 3 Months" {{Auth::user()->profile->notice_period=='More than 3 Months'?'selected':''}}>More than 3 Months</option>
                            </select>
                            @if($errors->has('notice_period'))
                            <div class="error" style="color: red;">{{$errors->first('notice_period')}}</div>
                            @endif
                        </div>

                                
                        <div class="text-center bg-light">
                            <p style="color:red"><strong>*Please Share Your Top 5 Key Skills as Jobs will be Recommended Based on your Skills.</strong><br>               
                            </p>
                        </div>

                        <div class="form-group required">
                            <label for="skills" class="control-label h6">Skills</label>                
                            <select class="form-control select2" multiple="multiple" placeholder="Select Skill" name="skills[]">
                                @foreach($skills as $skill)
                                    <option value="{{$skill->id}}" {{ Auth::user()->skills->contains($skill->id) ? 'selected' : '' }}>{{$skill->skill}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('skills'))
                            <div class="error" style="color: red;">{{$errors->first('skills')}}</div>
                            @endif
                        </div>


                    <div class="form-group">
                        <button class="btn btn-info" type="submit">Edit & Update</button>
                    </div>
                </div>
        
            </form>

        </div>
        <br>


        {{--<div>
            <span class="h6" style="color:rgb(209, 39, 39)">
           <strong> *Please Share Your Skills as Jobs will be Recommended Based on your Skills.</strong>
        </span>
        </div>
        
        <div class="card mb-0">
            <div class="card-header">
                <a class="card-title">
                   <h5 class="d-inline-block h5 text-dark font-weight-bold mb-0">Skills <span style="color: red; font-weight: bold;"><small> [Top 5 key skills] </small></span></h5>
                   <button type="button" class="btn btn-default float-right py-0 px-1" data-toggle="modal" data-target="#editskills{{$user->id}}">
                    <i class="far fa-edit text-success"></i> <span class="text-success h6">Edit</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary float-right  py-0 mr-1 px-1" data-toggle="modal" data-target="#addskills{{$user->id}}">
                        <i class="far fa-edit text-primary"></i> <span class="text-primary h6">Add New</span>
                       </button>
                </a>
            </div>
            <div class="card-body">
              @foreach($user->skills as $skill)
               <button type="button" class="btn btn-sm btn-secondary mt-1">{{$skill->skill}}</button>
              @endforeach

            </div>

            <!-- Edit Skills Modal -->
            <div class="modal fade" id="editskills{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <form action="/profile/skills/edit" method="post">@csrf
                 <div class="modal-dialog modal-lg" role="document">
                   <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Edit Skills</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                         <div class="modal-body editskillsbody">
                          <select class="form-control selectedskills" multiple="multiple" name="skills[]">
                             <option></option>
                             @foreach($skills as $skill)
                               <option value="{{$skill->id}}">{{$skill->skill}}</option>
                             @endforeach
                         </select>
               
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Save changes</button>
                           </div>
                       </div>
                   </div>
                   </form>	
                   </div>

            <!-- Add Skills Modal -->
            <div id="addskills{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <form action="/profile/skills/store" method="post">@csrf
                 <div class="modal-dialog modal-lg" role="document">
                   <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Add Skills</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                         <div id="myModalABCD" class="modal-body addskillsbody">
                         
                           <div class="form-group col-xs-12">
                                                                 
                               <select class="form-control select2" multiple="multiple" name="skills[]">
                                 <option></option>
                                 @foreach($skills as $skill)
                                   <option value="{{$skill->id}}">{{$skill->skill}}</option>
                                 @endforeach
                               </select>
                           </div>
               
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Save changes</button>
                           </div>
                       </div>
                   </div>
                   </form>	
                   </div>
        </div>--}}

        
        <div class="mt-5">
            <!--<div class="col-md-3 ftco-animate text-center text-md-right mb-5" data-scrollax=" properties: { translateY: '70%' }">-->
                <div>
                @if(!empty(Auth::user()->profile->phone_number))
                   {{--<a href="{{route('company.view')}}"><button class="btn btn-danger btn-lg">Edit</button></a>--}}
 
                   <a class="btn btn-warning float-right" href="{{route('user.history',[Auth::user()->id])}}" role="button"><u><strong>Continue<strong></u> &nbsp;&nbsp;<i class="ion-ios-arrow-forward"></i>
                     <br><small>Education & Work History</small></a>
 
                @endif
             </div>

            </div>
</div>

</div>
        </div>

        <br>
        <br>

</section> 
@endsection

@section('jsplugins')

<script defer src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
 
<script type="text/javascript">

    $(document).ready(function(){

        var coun_id = @json($coun_id);
        var s_id = @json($s_id);
        var c_id = @json($c_id);


                if(coun_id){
                    $.ajax({
                        
                        url: '/user/location/getStates/'+coun_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            
                            $('select[name="state"]').empty();
                            $.each(data, function(key, value){

                                if(key==s_id){
                                $('select[name="state"]').append('<option value="'+key+'" selected>'+value+'</option>');}
                                else{                                
                                $('select[name="state"]').append('<option value="'+key+'">'+value+'</option>');}                             

                            });
                            
                        }
                        
                    });

                }

            
                if(s_id){
                    //console.log(country_id);
                    $.ajax({
                        
                        url: '/user/location/getCities/'+s_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            
                            $('select[name="city"]').empty();
                            $.each(data, function(key, value){
                                
                                if(key==c_id){
                                $('select[name="city"]').append('<option value="'+key+'" selected>'+value+'</option>');}
                                else{ 
                                $('select[name="city"]').append('<option value="'+key+'">'+value+'</option>');}
                            });
                            
                        }
                        
                    });

                }            
            
            //console.log(coun_id);

            $('select[name="country"]').on('change', function(){
 
                var country_id = $(this).val();
                if(country_id){
                    
                    $.ajax({
                        
                        url: '/user/location/getStates/'+country_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            
                            $('select[name="state"]').empty();
                            $.each(data, function(key, value){
                                
                                $('select[name="state"]').append('<option value="'+key+'">'+value+'</option>');
                            });
                            
                        }
                        
                    });

                }
                
                else{
                    
                    $('select[name="state"]').empty();
                }
                
            });
                
                $('select[name="state"]').on('change', function(){
                
                var state_id = $(this).val();
                if(state_id){
                   
                    $.ajax({
                        
                        url: '/user/location/getCities/'+state_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            
                            $('select[name="city"]').empty();
                            $.each(data, function(key, value){
                                
                                $('select[name="city"]').append('<option value="'+key+'">'+value+'</option>');
                            });
                            
                        }
                        
                    });

                }
                
                else{
                    
                    $('select[name="city"]').empty();
                }
                
                //console.log('LISTENING')
                
            });
            
            $("input[name='fresher']").on("click",function(){
            //console.log('clicked');
          if ($(this).hasClass("checkdisplay") && this.checked) // or $(this).is(":checked")
            $("#todisplay").fadeOut('slow');
        else
            $("#todisplay").fadeIn('slow');
      });

        $('.select2').css('width','100%');       
        $('.select2').select2({
          //width: 'resolve', 
          placeholder: "Please select Skills",
          allowClear: true,

        });      

        //$("#select-Des").css('width','100%');
        $('.select1').select2({
          //width: 'resolve', 
          //theme: "bootstrap",
          placeholder: "SELECT",
          allowClear: true,

        });

        //$("#select-Des").select2();

    });
    </script>
@endsection

                    {{--   
                        
                            <input name="days" list="days">
                                <datalist id="days">
                                <option value="Sunday">
                                <option value="Monday">
                                <option value="Tuesday">
                                <option value="Wednesday">
                                <option value="Thursday">
                                <option value="Friday">
                                <option value="Saturday"> 
                                </datalist>

                                <input list="job_dept">

                                <datalist id="job_dept">
                                <option value="Internet Explorer">
                                <option value="Firefox">
                                <option value="Chrome">
                                <option value="Opera">
                                <option value="Safari">
                                </datalist>

                                <input list="cars" value="BMW" class="form-control" name="caBrands" style="width:300px;">
                                    <datalist id="cars">
                                    <option value="BMW">
                                    <option value="Toyota">
                                    <option value="Mitsubishi">
                                --}}

                                

                    {{--<div class="form-group">
                        <label for="">Experience Details</label>
                        <textarea name="experience" class="form-control"> {{Auth::user()->profile->experience}} </textarea>
                        @if($errors->has('experience'))
                            <div class="error" style="color: red;">{{$errors->first('experience')}}</div>
                        @endif
                    </div>--}}
                   

                    {{--<div class="form-group">
                        <label for="job_dept">Previous Job Department</label>
                        <input class="form-control" value="{{Auth::user()->profile->job_dept}}" name="job_dept" list="job_dept">
                            <datalist id="job_dept">
                                
                    <div class="form-group">
                    <label for="type">Type:</label>
                    <select class="form-control" name="type">
                        <option value="fulltime"{{$job->type=='fulltime'?'selected':''}}>fulltime</option>
                        <option value="partime"{{$job->type=='partime'?'selected':''}}>partime</option>
                        <option value="casual"{{$job->type=='casual'?'selected':''}}>casual</option>
                    </select>
                    </div>
                    
                                            <div class="form-group">
                            <label for="salary_in_thousands">in Thousand(s):</label>
                            <select class="form-control" name="salary">
                                <option value="5000-10000">5000-10000</option>
                                <option value="10001-15000">10001-15000</option>
                                <option value="15001-20000">15001-20000</option>
                                <option value="20001-30000">20001-30000</option>
                                <option value="30001-40000">30001-40000</option>
                                <option value="40001-50000">40001-50000</option>
                                <option value="50001-60000">50001-60000</option>
                                <option value="60001-70000">60001-70000</option>
                                <option value="70001-80000">70001-80000</option>
                                <option value="80001-90000">80001-90000</option>
                                <option value="90001-100000">90001-100000</option>
                               <option value="100000 plus">100000 plus</option>
                            </select>
                        </div>--}}
                   
                    {{--@for ($i = 0; $i < 10; $i++)
                    The current value is {{ $i }}
                    @endfor--}}

                    

                    {{--<div class="form-group">
                        <label for="">Pillbox</label>
                        <select class="js-example-basic-single" name="state">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyom</option>
                            <option value="WY">W</option>
                            <option value="WY">Wyoming</option>
                          </select>                                      
                    </div>--}}

                    {{--<select class="form-control" name="type">
                        <option value="fulltime"{{$job->type=='fulltime'?'selected':''}}>fulltime</option>
                        <option value="partime"{{$job->type=='partime'?'selected':''}}>partime</option>
                        <option value="casual"{{$job->type=='casual'?'selected':''}}>casual</option>
                    </select>--}}
