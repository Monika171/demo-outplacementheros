@extends('layouts.main')

@section('select2css')
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css" rel="stylesheet" />
   
   <link href="{{ asset('css/select2-bootstrap.min.css') }}" rel="stylesheet">
   <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />-->
   <style>
      .select2-selection__rendered {
        line-height: 41px !important;
        }
        .select2-container .select2-selection--single {
            height: 45px !important;
        }
        .select2-selection__arrow {
            height: 44px !important;
        }
    </style>
@endsection

@section('content')

<div class="hero-wrap" style="height: 300px; background: #038cfc;">
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 300px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 30px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                    <u>Registered Job Seekers</u></h1>
              </div>
          </div>
    </div>
</div>
   
<section class="ftco-section" style="background: rgba(3,2,32,0.9);">
	<div class="container">
				{{--<div class="row justify-content-center mb-1 pb-3">
                <div class="col-md-7 heading-section text-center text-white ftco-animate">
                    <!--<span class="subheading">Registered Candidates</span>-->
                    <h2 class="mb-4 text-white"><i class="fa fa-users" aria-hidden="true"></i> 
                        <span>Registered</span> Job Seekers</h2>
                </div>
                </div>--}}
		
		<div class="row">

            <form class="mb-2" action="{{route('seeker.index')}}" method="GET">

                <div class="row">
    
                    <div class="col-md-3">    
                    <div class="form-group">
                        <label class="text-white">Industry</label><br>
                        <select name="industry" class="form-control select1">
                            <option value="">-select-</option>            
                                @foreach($industrylist as $i)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endforeach
                            </select>                            
                    </div>    
                  </div>

                  <div class="col-md-3">    
                    <div class="form-group">
                        <label class="text-white">Position/Designation&nbsp;</label> <br>                  
                        <select name="recent_designation" class="form-control select1">
                            <option value="">-select-</option>            
                                @foreach($designationlist as $d)
                                    <option value="{{$d}}">{{$d}}</option>
                                @endforeach
                        </select>
                    </div>
                  </div>
    
                  <div class="col-md-3">    
                    <div class="form-group">
                      <label for="city" class="text-white">Location</label>  <br>           
                        <select name="city" class="form-control select1">
                            <option value="">-select-</option>            
                                @foreach($citylist as $c)
                                    <option value="{{$c}}">{{$c}}</option>
                                @endforeach
                        </select>
                    </div>
                  </div>
                
                  <div class="col-md-3">    
                    <div class="form-group">
                      <label for="state" class="text-white">State</label>  <br>           
                        <select name="state" class="form-control select1">
                            <option value="">-select-</option>            
                                @foreach($statelist as $s)
                                    <option value="{{$s}}">{{$s}}</option>
                                @endforeach
                        </select>
                    </div>
                  </div>
                  
                </div>

                <div class="row">
    
                    <div class="col-md-3">    
                    <div class="form-group">
                        <label class="text-white">Experience</label><br>
                        <select name="experience_years" class="form-control select1">                                                   
                            <option value="0" selected>Fresher</option>
                            @for ($i = 1; $i <= 50; $i++)
                        <option value="{{ $i }}">{{ $i }} &nbsp; year(s)</option>
                            @endfor
                    </select>                            
                    </div>    
                  </div>

                  <div class="col-md-3">    
                    <div class="form-group">
                        <label class="text-white">Education</label> <br>                  
                        <select class="form-control select1" name="qualification">
                            <option value="">-select-</option>
                            <option value="Doctorate/PhD">Doctorate/PhD</option>
                            <option value="Masters/Post-Graduation">Masters/Post-Graduation</option>
                            <option value="Graduation/Diploma">Graduation/Diploma</option>
                            <option value="12th">12th</option>
                            <option value="10th">10th</option>
                            <option value="Below 10th">Below 10th</option>                           
                        </select>
                    </div>
                  </div>
    
                  <div class="col-md-3">    
                    <div class="form-group">
                      <label for="course" class="text-white">Qualification/Course</label>  <br>           
                      <select class="form-control select1" name="course">
                        <option value="">-select-</option>                               
                            @foreach($courselist as $co)
                                <option value="{{$co}}">{{$co}}</option>
                            @endforeach                                  
                    </select> 
                    </div>
                  </div>
                
                  <div class="col-md-3">    
                    <div class="form-group">
                      <label for="specialization" class="text-white">Specialization</label>  <br>           
                      <select class="form-control select1" name="specialization">
                        <option value="">-select-</option>                            
                        @foreach($specializationlist as $sp)
                        <option value="{{$sp}}">{{$sp}}</option>
                        @endforeach                                  
                    </select>                     

                    </div>
                  </div>
                  
                </div>

                <div class="row mt-3">
                <div class="col-md-12 text-center">                                 
                    <div class="form-group">                      
                      <input type="submit" class="btn btn-success btn-sm text-center" style="width:40%" value="Search">                            
                    </div>                  
                  </div>
                </div>
                </form>
    
                <div class="col-md-12 mb-4 ftco-animate text-center">
                  <a href="{{route('seeker.index')}}"><i class="fa fa-undo text-info" aria-hidden="true" style="font-size: 38px;"></i></a>
                </div>

            <br><br>
            @if(count($seekers)>0)
			@foreach($seekers as $seeker)
          <div class="col-md-12 ftco-animate">
                   
					<div class="job-post-item bg-white p-2 d-block d-md-flex align-items-center">
                       
                            <div class="col-4 col-md-3 text-center">
                                <a href="{{route('seeker.show',[$seeker->user_id])}}"> 
                                <div class="d-flex">                                                               
                                    @if(empty($seeker->profile_pic))                                
                                        <img width="50%" src="{{asset('profile_pic/man.jpg')}}" class="pt-2 img-fluid mx-auto">                                    
                                        @else                                    
                                        <img width="50%" src="{{asset('uploads/profile_pic')}}/{{$seeker->profile_pic}}"  class="pt-2 img-fluid mx-auto">                                    
                                    @endif                                    
                                                              
                                </div>
                                <small class="text-muted"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Profile</small>
                            </a>
                            </div>
                            <div class="col-8 col-md-7">
                                <a href="{{route('seeker.show',[$seeker->user_id])}}"> 
                                <div class="mb-2 mb-md-0 mr-5">
                                    <div class="job-post-item-header d-flex align-items-center">
                                    
                                    <h4 class="mr-3 text-black"><u>{{$seeker->user->name}}</u></h4>
                                                                           
                                    </div>
                                    <div class="job-post-item-body d-block d-md-flex text-secondary">   
                                        <div class="mr-3"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;{{$seeker->user->email}}</div>                                        
                                        <div><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;{{$seeker->phone_number}}</div>
                                    </div>
                                    @if(!empty($seeker->industry))
                                    <div class="mx-0 text-secondary"><i class="fa fa-cubes" aria-hidden="true"></i>&nbsp;
                                        Recent Industry:&nbsp;{{$seeker->industry}}</div> 
                                    @endif
                                    @if(!empty($seeker->recent_designation))
                                    <div class="mx-0 text-secondary"><i class="fa fa-address-card" aria-hidden="true"></i>&nbsp;
                                        Recent Designation:&nbsp;{{$seeker->recent_designation}}</div>   
                                   @endif
                                    <div class="job-post-item-body d-block d-md-flex text-secondary">                                             
                                        <div class="mr-3"><i class="fa fa-briefcase" aria-hidden="true"></i>
                                            Total Experience:&nbsp;{{$seeker->experience_years}}year(s)</div> 
                                        <div><i class="fa fa-map-marker" aria-hidden="true"></i> {{$seeker->city}},&nbsp;{{$seeker->state}}</div>                                 
                                    </div>                                                                                                            
                                </div>
                            </a> 
                            </div>                           
                    
                            <div class="col-6 col-md-2">
                            <div class="ml-auto d-flex">
                            @if(!empty($seeker->resume))
                            <a href="{{Storage::url($seeker->resume)}}">
                                <button type="button" class="btn btn-outline-info btn-sm">
                                <strong><i class="fa fa-link" aria-hidden="true"></i>
                                    &nbsp;RESUME</strong></button>
                            </a>                           
                            @endif
                            </div>
                            </div>
                </div>	  
			  
			</div>
          
          @endforeach
          @else
          
          <div class="col-md-12 text-center ftco-animate">
            <!--<span class="subheading">Registered Candidates</span>-->
            <h6 class="mt-5 mb-0">No Record found. More Job Seekers Will Register Soon..</h6>
            <p class="mt-0 mb-5">Thank You. Have a Nice Day!</p>
          </div>
          @endif
        </div>
		  <!-- end -->
 
                
          <div class="row mt-5">
            <div class="col text-center">
                <div class="pagination center">                                         
                    {{$seekers->appends(Illuminate\Support\Facades\Request::except('page'))->links()}}               
                </div>
            </div>
          </div>
                  
			</div>
		</section>
		
@endsection

@section('jsplugins')

<script defer src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script> 
<script type="text/javascript">

    $(document).ready(function(){      

        
        $('.select1').select2({         
          placeholder: "-select-",
          allowClear: true,
        });        

    });
    </script>
@endsection

 {{--<p style="font-weight: bold; font-size: 18px;"><a href="{{Storage::url($seeker->resume)}}">View Candidate Resume</a></p>--}}                            
{{--<style>

    .im{display:inline-block;
        margin-top:10px;
        margin-left:5px;
        margin-right:5px;
        width: 100px;
        height: 100px;
        border-radius: (50%);
        position: relative;
    }

</style>--}}
    