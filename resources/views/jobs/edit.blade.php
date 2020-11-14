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

<div class="hero-wrap" style="height: 300px; background:#038cfc">
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 300px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 30px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                    <u>Modify Job Details</u></h1>
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
                {{--<div class="card-header d-inline-block h5 text-dark font-weight-bold mb-0">Create a Job</div>--}}
                
                <form action="{{route('job.update',[$job->id])}}" method="POST">@csrf
                    <div class="card-body">

					<div class="form-group required">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$job->title}}">
                        @if($errors->has('title'))
                         <div class="error" style="color: red;">{{$errors->first('title')}}</div>
                        @endif
                    </div>
					
					
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="4" cols="70" style="width:100"> {{$job->description}}</textarea>
                        @if($errors->has('description'))
                        <div class="error" style="color: red;">{{$errors->first('description')}}</div>
                    @endif                  
                    
                    </div>

                    <div class="form-group">
                        <label for="category">Job Category/Industry</label>
							<select name="category" class="form-control select1">
                                <option value=""></option>
                                @foreach(App\Models\Industry::all() as $cat)
                                <option value="{{$cat->id}}" {{$cat->id==$job->category_id?'selected':''}}>{{$cat->industry}}</option>
                                 @endforeach
							</select>
                            @if($errors->has('category'))
                            <div class="error" style="color: red;">{{$errors->first('category')}}</div>
                           @endif                        
                    </div>

                    <div class="form-group required">
                        <label for="position" class="control-label">Position</label>                        
                        <input class="form-control" value="{{$job->position}}" name="position" list="position">
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
                        <textarea name="roles" class="form-control" rows="3" cols="70" style="width:100"> {{$job->roles}}</textarea>
                        @if($errors->has('roles'))
                        <div class="error" style="color: red;">{{$errors->first('roles')}}</div>
                    @endif                  
                    
                    </div>

                    <!--Function-->

                    {{--<div class="form-group">
                        <label for="function">Function</label>
                        <input type="text" class="form-control" name="function" value="{{$job->function}">

                        @if($errors->has('function'))
                        <div class="error" style="color: red;">{{$errors->first('function')}}</div>
                        @endif
                      </div>--}}

                    <div class="form-group">
                        <label for="salary">CTC (or Salary/month)</label> &nbsp; &nbsp;
                        <span style="color:red">Please mention Negotiable, if negotiable.</span>
                        <input type="text" class="form-control" name="salary" value="{{$job->salary}}" placeholder="eg: 8 LPA or 80,000/month">
                        @if($errors->has('salary'))
                        <div class="error" style="color: red;">{{$errors->first('salary')}}</div>
                        @endif
                    </div>


                    <div class="form-group required">
                        <label for="experience" class="control-label">Experience</label> 
                        <span style="color:red">If no value is selected. 'zero' will be set by default.</span>
                        <select name="experience" class="form-control">  
                                                  
                            @for ($i = 0; $i <= 50; $i++)
                           <option value="{{ $i }}" {{$job->experience==$i?'selected':''}}>{{ $i }} &nbsp; year(s)</option>
                           @endfor
                       </select>
                        @if($errors->has('experience'))
                        <div class="error" style="color: red;">{{$errors->first('experience')}}</div>
                        @endif             
                    </div>

                    <div class="form-group">
                        <label for="course">Qualification/Course</label>
                        <select class="form-control select1" name="course">
                                    <option value="" {{$job->course==''?'selected':''}}></option>                                 
                                @foreach($course as $co)
                                    <option value="{{$co}}" {{$job->course==$co?'selected':''}}>{{$co}}</option>
                                @endforeach                                  
                        </select>                     

                        @if($errors->has('course'))
                        <div class="error" style="color: red;">{{$errors->first('course')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="specialization">Specialization</label>
                        <select class="form-control select1" name="specialization">
                                <option value="" {{$job->specialization==''?'selected':''}}></option>                            
                                @foreach($specialization as $sp)
                                <option value="{{$sp}}" {{$job->specialization==$sp?'selected':''}}>{{$sp}}</option>
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
                            <option value="any"{{$job->gender=='any'?'selected':''}}>Any</option>
                            <option value="male"{{$job->gender=='male'?'selected':''}}>Male</option>
                            <option value="female"{{$job->gender=='female'?'selected':''}}>Female</option>                            
                        </select>
                        @if($errors->has('gender'))
                        <div class="error" style="color: red;">{{$errors->first('gender')}}</div>
                        @endif
                    </div>
                        
                    <div class="form-group">
                        <label for="preferences">Preferences</label>
                        <textarea name="preferences" class="form-control" rows="4" cols="70" style="width:100"> {{$job->preferences}}</textarea>
                        @if($errors->has('preferences'))
                        <div class="error" style="color: red;">{{$errors->first('preferences')}}</div>
                        @endif             
                    </div>
					
		
                    <div class="form-group">
                        <label for="address_line1">Address Line 1</label>
                        <input type="text" class="form-control" name="address_line1" value="{{$job->address_line1}}">
                        @if($errors->has('address_line1'))
                         <div class="error" style="color: red;">{{$errors->first('address_line1')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="address_line2">Address Line 2</label>
                        <input type="text" class="form-control" name="address_line2" value="{{$job->address_line2}}">
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
                                <option value="{{$key}}" {{$job->country==$value?'selected':''}}>{{$value}}</option>
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
                        <label for="pincode" class="control-label">{{ __('Pincode') }}</label>
                        
                            <input type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode"  value="{{$job->pincode}}">
                            @error('pincode')
                            <span class="invalid-feedback" role="alert">
                            <strong>Please enter valid 6 digit pincode</strong>
                            </span>
                            @enderror                        
                    </div>                    					 

                    <div class="form-group">
                        <label for="number_of_vacancy">Number of vacancy</label>
                        <input type="text" class="form-control" name="number_of_vacancy" value="{{$job->number_of_vacancy}}">
                        @if($errors->has('number_of_vacancy'))
                            <div class="error" style="color: red;">{{$errors->first('number_of_vacancy')}}</div>
                        @endif                                      
                    </div>		                        

                    {{--<div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" name="type">
                                <option value="">Select</option>
                                <option value="fulltime"{{$job->type=='fulltime'?'selected':''}}>fulltime</option>
                                <option value="partime"{{$job->type=='partime'?'selected':''}}>partime</option>
                                <option value="casual"{{$job->type=='volunteer'?'selected':''}}>Volunteer</option>
                            </select>
                            @if($errors->has('type'))
                            <div class="error" style="color: red;">{{$errors->first('type')}}</div>
                            @endif
                    </div>--}}

                        <!--Notice period-->

                    <div class="form-group">
                            <label for="notice_period">Notice Period</label>
                            <select class="form-control" name="notice_period">
                                <option value="" {{$job->notice_period==''?'selected':''}}>Select</option>
                                <option value="Immediately" {{$job->notice_period=='Immediately'?'selected':''}}>Immediately</option>
                                <option value="15 Days or less" {{$job->notice_period=='15 Days or less'?'selected':''}}>15 Days or less</option>
                                <option value="1 Month" {{$job->notice_period=='1 Month'?'selected':''}}>1 Month</option>
                                <option value="2 Months" {{$job->notice_period=='2 Months'?'selected':''}}>2 Months</option>
                                <option value="3 Months" {{$job->notice_period=='3 Months'?'selected':''}}>3 Months</option>
                                <option value="More than 3 Months" {{$job->notice_period=='More than 3 Months'?'selected':''}}>More than 3 Months</option>
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
                            @foreach($skills as $skill)
                                <option value="{{$skill->id}}" {{ $job->skills->contains($skill->id) ? 'selected' : '' }}>{{$skill->skill}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('skills'))
                        <div class="error" style="color: red;">{{$errors->first('skills')}}</div>
                        @endif
                    </div>

					
					<div class="form-group required">            
                        <label for="lastdate" class="control-label">Last Date</label>                        
                            <input type="text" class="form-control datepicker" name="last_date" value="{{$job->last_date}}">    
                            @if($errors->has('last_date'))
                            <div class="error" style="color: red;">{{$errors->first('last_date')}}</div>
                           @endif
                        
                    </div>

                    
					
					{{--<div class="form-group required">
                        <label for="status" class="control-label">Status</label>
                        <select class="form-control" name="status">
                            <option value="">Select</option>
                             <<option value="1"{{$job->status=='1'?'selected':''}}>Live</option>
                             <option value="0"{{$job->status=='0'?'selected':''}}>Draft</option>
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
                    {{--
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
                        <button type="button" class="btn btn-sm btn-warning mt-1"><b>{{$skill->skill}}</b></button>
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
                                    <select class="form-control selectedskills" multiple="multiple" placeholder="Select State" name="skills[]">
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
                    </div>
                    

                     
                   --}}
    
</div>
</div>
</div>

<br>
<br>
@endsection


@section('jsplugins')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
 
<script type="text/javascript">

    $(document).ready(function(){

        var coun_id = @json($coun_id);
        var s_id = @json($s_id);
        var c_id = @json($c_id);


                if(coun_id){
                    $.ajax({
                        
                        url: '/getStates/'+coun_id,
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
                    
                    $.ajax({
                        
                        url: '/getCities/'+s_id,
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

         $('select[name="country"]').on('change', function(){
 
                var country_id = $(this).val();
                if(country_id){
                    
                    $.ajax({
                        
                        url: '/getStates/'+country_id,
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
                        
                        url: '/getCities/'+state_id,
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