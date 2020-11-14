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

{{--<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <p style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Post a Job</p>
              </div>
          </div>
    </div>
</div>--}}


<div class="hero-wrap" style="height: 300px; background:#038cfc">
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 300px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 30px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                    <u>Post a Job</u></h1>
              </div>
          </div>
    </div>
  </div>

<div class="ftco-section bg-light">
<div class="container">
    <div class="row">    

            
            <div class="col-md-12 col-lg-12 mb-5">
                
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            
            @endif
            <div class="card">
                {{--<div class="card-header d-inline-block h5 text-dark font-weight-bold mb-0">Post a New Job</div>--}}
                
                <form action="{{route('job.store')}}" method="POST">@csrf
                    <div class="card-body">

					<div class="form-group required">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{old("title")}}">
                        @if($errors->has('title'))
                         <div class="error" style="color: red;">{{$errors->first('title')}}</div>
                        @endif
                    </div>
					
					
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="4" cols="70" style="width:100"> {{old("description")}}</textarea>
                        @if($errors->has('description'))
                        <div class="error" style="color: red;">{{$errors->first('description')}}</div>
                    @endif                  
                    
                    </div>

                    {{--<div class="form-group">
                        <label for="category">Job Category</label>
							<select name="category" class="form-control">
                                <option value="">Select</option>
							@foreach(App\Industry::all() as $cat)
								<option value="{{$cat->id}}">{{$cat->industry}}</option>
							@endforeach
							</select>
                            @if($errors->has('category'))
                            <div class="error" style="color: red;">{{$errors->first('category')}}</div>
                           @endif                        
                    </div> --}}

                    <div class="form-group">
                        <label for="category">Job Category/Industry</label>
                        <select  class="form-control select1" name="category">
                            <option value=""></option>
                            @foreach(App\Models\Industry::all() as $cat)
                              <option value="{{$cat->id}}">{{$cat->industry}}</option>
                            @endforeach
                          </select>
                          @if($errors->has('category'))
                            <div class="error" style="color: red;">{{$errors->first('category')}}</div>
                           @endif                        
                    </div>
                        
                        

                    <div class="form-group required">
                        <label for="position" class="control-label">Position</label>                        
                        <input class="form-control" value="{{old("position")}}" name="position" list="position">
                            <datalist id="position">
                                @foreach($position as $p)
                                <option value="{{$p}}">
                                @endforeach
                            </datalist>
                        @if($errors->has('position'))
                        <div class="error" style="color: red;">{{$errors->first('position')}}</div>
                        @endif                
                    </div>

					
					<div class="form-group">
                        <label for="role">Roles & Responsibilities</label>
                        <textarea name="roles" class="form-control" rows="3" cols="70" style="width:100"> {{old("roles")}}</textarea>
                        @if($errors->has('roles'))
                        <div class="error" style="color: red;">{{$errors->first('roles')}}</div>
                    @endif                  
                    
                    </div>

                    <!--Function-->

                    {{--<div class="form-group">
                        <label for="function">Function</label>
                        <input type="text" class="form-control" name="function" value="{{old("function")}}">

                        @if($errors->has('function'))
                        <div class="error" style="color: red;">{{$errors->first('function')}}</div>
                        @endif
                      </div>--}}

                    <div class="form-group">
                        <label for="salary">CTC (or Salary/month)</label> &nbsp; &nbsp;
                        <span style="color:red">Please mention Negotiable, if negotiable.</span>
                        <input type="text" class="form-control" name="salary" value="{{old("salary")}}" placeholder="eg: 8 LPA or 80,000/month">
                        @if($errors->has('salary'))
                        <div class="error" style="color: red;">{{$errors->first('salary')}}</div>
                        @endif
                    </div>


                    <div class="form-group required">
                        <label for="experience" class="control-label">Experience</label> &nbsp; &nbsp;
                        <span style="color:red">If no value is selected. 'zero' will be set by default.</span>
                        <select name="experience" class="form-control"> 
                                                    
                                @for ($i = 0; $i <= 50; $i++)
                            <option value="{{ $i }}">{{ $i }} &nbsp; year(s)</option>
                            @endfor
                        </select>
                        @if($errors->has('experience'))
                        <div class="error" style="color: red;">{{$errors->first('experience')}}</div>
                        @endif             
                    </div>

                    <div class="form-group">
                        <label for="course">Qualification/Course</label>
                        <select class="form-control select1" name="course">
                                    <option value=""></option>                               
                                @foreach($course as $co)
                                    <option value="{{$co}}">{{$co}}</option>
                                @endforeach                                  
                        </select>                     

                        @if($errors->has('course'))
                        <div class="error" style="color: red;">{{$errors->first('course')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="specialization">Specialization</label>
                        <select class="form-control select1" name="specialization">
                                <option value=""></option>                            
                                @foreach($specialization as $sp)
                                <option value="{{$sp}}">{{$sp}}</option>
                            @endforeach                                  
                        </select>                     

                        @if($errors->has('specialization'))
                        <div class="error" style="color: red;">{{$errors->first('specialization')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender">
                            <option value="">Select</option>
                            <option value="any">Any</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        @if($errors->has('gender'))
                        <div class="error" style="color: red;">{{$errors->first('gender')}}</div>
                        @endif
                    </div>
                        
                    <div class="form-group">
                        <label for="preferences">Preferences</label>
                        <textarea name="preferences" class="form-control" rows="4" cols="70" style="width:100"> {{old("preferences")}}</textarea>
                        @if($errors->has('preferences'))
                        <div class="error" style="color: red;">{{$errors->first('preferences')}}</div>
                        @endif             
                    </div>
					
		
                    <div class="form-group">
                        <label for="address_line1">Address Line 1</label>
                        <input type="text" class="form-control" name="address_line1" value="{{old("address_line1")}}">
                        @if($errors->has('address_line1'))
                         <div class="error" style="color: red;">{{$errors->first('address_line1')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="address_line2">Address Line 2</label>
                        <input type="text" class="form-control" name="address_line2" value="{{old("address_line2")}}">
                        @if($errors->has('address_line2'))
                         <div class="error" style="color: red;">{{$errors->first('address_line2')}}</div>
                        @endif
                    </div>

                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group required">
                            <label for="country" class="control-label">Select your country</label>                            
                            <select name="country" id="country" class="form-control">
                                <option value="">Select Country</option>
                                @foreach($countries as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('country'))
                            <div class="error" style="color: red;">{{$errors->first('country')}}</div>
                            @endif                                                    
                        </div>
                    </div>

                    <div class="col-md-4">                                                       
                        <div class="form-group required">
                            <label for="state" class="control-label">Select your state</label>                        
                            <select name="state" id="state" class="form-control">
                                <option value="">Select State</option>                        
                            </select>							
                            @if($errors->has('state'))
                            <div class="error" style="color: red;">{{$errors->first('state')}}</div>
                            @endif                                                
                    </div>
                    </div>
                        <div class="col-md-4">                        
                            <div class="form-group required">
                                <label for="city" class="control-label">Select your city</label>                                
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
                        <label for="pincode" class="control-label">{{ __('Pincode') }}</label>
                        
                            <input type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode"  value="{{old("pincode")}}">
                            @error('pincode')
                            <span class="invalid-feedback" role="alert">
                            <strong>Please enter valid 6 digit pincode</strong>
                            </span>
                            @enderror                        
                    </div>                    					 

                    <div class="form-group">
                        <label for="number_of_vacancy">Number of vacancy</label>
                        <input type="text" class="form-control" name="number_of_vacancy" value="{{old("number_of_vacancy")}}">
                        @if($errors->has('number_of_vacancy'))
                            <div class="error" style="color: red;">{{$errors->first('number_of_vacancy')}}</div>
                        @endif                                      
                    </div>		                        

                    {{--<div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" name="type">
                                <option value="">Select</option>
                                <option value="fulltime">Fulltime</option>
                                <option value="parttime">Parttime</option>
                                <option value="volunteer">Volunteer</option>
                            </select>
                            @if($errors->has('type'))
                            <div class="error" style="color: red;">{{$errors->first('type')}}</div>
                            @endif
                    </div>--}}

                        <!--Notice period-->

                    <div class="form-group">
                            <label for="notice_period">Notice Period</label>
                            <select class="form-control" name="notice_period">
                                <option value="">Select</option>
                                <option value="Immediately">Immediately</option>
                                <option value="15 Days or less">15 Days or less</option>
                                <option value="1 Month">1 Month</option>
                                <option value="2 Months">2 Months</option>
                                <option value="3 Months">3 Months</option>
                                <option value="More than 3 Months">More than 3 Months</option>
                            </select>
                            @if($errors->has('notice_period'))
                            <div class="error" style="color: red;">{{$errors->first('notice_period')}}</div>
                            @endif
                    </div>

                    <div class="text-center bg-light">
                        <p style="color:red"><strong>*Jobs will be Recommended to Job Seekers Based on Following Skills.</strong><br>               
                        </p>
                    </div>

                    <div class="form-group required">
                        <label for="skills" class="control-label">Skills</label>
                        <select class="form-control select2" multiple="multiple" placeholder="Select Skill" name="skills[]">
                            <option></option>
                            @foreach($skills as $skill)
                              <option value="{{$skill->id}}">{{$skill->skill}}</option>
                            @endforeach
                          </select>
                          @if($errors->has('skills'))
                          <div class="error" style="color: red;">{{$errors->first('skills')}}</div>
                          @endif                        
                    </div>

					
					<div class="form-group required">            
                        <label for="lastdate" class="control-label">Last Date</label>                        
                            <input type="text" class="form-control datepicker" name="last_date" value="{{old("last_date")}}">    
                            @if($errors->has('last_date'))
                            <div class="error" style="color: red;">{{$errors->first('last_date')}}</div>
                           @endif
                        
                    </div>

                    
					
					{{--<div class="form-group required">
                        <label for="status" class="control-label">Status</label>
                        <select class="form-control" name="status">
                            <option value="">Select</option>
                             <option value="1">Live</option>
                            <option value="0">Draft</option>
                        </select>
                        @if($errors->has('status'))
                        <div class="error" style="color: red;">{{$errors->first('status')}}</div>
                        @endif
                    </div> --}}                   

                    <div class="form-group">
                        <button class="btn btn-dark" type="submit">Submit</button>
                    </div>
                
        
                </div>
            </form>
        </div>

    </div>

        
        <br>
                    
                    {{--<div class="card mb-0">
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
                        <button type="button" class="btn btn-sm btn-warning mt-1"><b>{{$skill->skill}}</b></button>
                        @endforeach

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
                                                                            
                                        <select class="form-control select2" multiple="multiple" placeholder="Select Skill" name="skills[]">
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
                    

                     
                   
    
</div>
</div>
</div>

<br>
<br>
@endsection


@section('jsplugins')
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
 
<script type="text/javascript">

    $(document).ready(function(){

         $('select[name="country"]').on('change', function(){
 
                var country_id = $(this).val();
                if(country_id){
                    //console.log(country_id);
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
                    //console.log(country_id);
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

            $('.select2').css('width','100%');
           
            $('.select2').select2({
            //width: 'resolve', 
            placeholder: "Please select Skills",
            allowClear: true,

            });

            

            $('.select1').select2({
                placeholder: "SELECT",
                allowClear: true,

        });            

    });
    </script>
@endsection