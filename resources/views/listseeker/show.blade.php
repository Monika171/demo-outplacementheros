@extends('layouts.main')
@section('content')

<div class="hero-wrap" style="height: 300px; background: #038cfc">
  <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 300px" data-scrollax-parent="true">
            <div class="col-md-9 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">                
                <h1 style="font-size: 30px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                  <u>Candidate Name</u>: {{$user->name}}</h1>
            </div>
            <div class="col-md-3 ftco-animate text-center text-md-right mb-5" data-scrollax=" properties: { translateY: '70%' }">
               @if(Auth::check()&&Auth::user()->id==$user->id)
                  {{--<a href="{{route('company.view')}}"><button class="btn btn-danger btn-lg">Edit</button></a>--}}

                  <a class="btn btn-sm" style="background:#0c127d; font-size:18px; color:white;" href="{{route('user.profile',[$user->id])}}" role="button">Edit Details</a>

               @endif
            </div>
        </div>
  </div>
</div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
          
            <div class="col-md-4 px-4 sidebar ftco-animate">                
                <div class="blog-entry align-self-stretch"> 
                        
                        <div class="mt-3 p-3 bg-white text-center">
                          @if(empty($user->profile->profile_pic))
                          <img class="block-20" src="{{asset('profile_pic/man.jpg')}}">
                          @else
                          <img class="block-20" src="{{asset('uploads/profile_pic')}}/{{$user->profile->profile_pic}}">
                          @endif                        
                        </div>                       
                      
                        <div class="text mt-3">

                        <div class="my-3 p-3 bg-white">                          
                        {{--<h3 class="heading">{{$user->name}}</h3>--}}
                        @if(!empty($user->profile->resume))
                            <a href="{{Storage::url($user->profile->resume)}}" class="btn btn-dark btn-sm active"  role="button" aria-pressed="true" style="width:100%;" target="_blank"><strong>VIEW RESUME</strong></a>
                            <br><br>{{--<p style="font-weight: bold; font-size: 18px;"><a href="{{Storage::url($user->profile->resume)}}">VIEW RESUME</a></p>--}}
                          @elseif(Auth::check()&&Auth::user()->id==$user->id)
                              <p style="color: rgb(236, 32, 32); font-weight: bold; font-size: 18px;">Please upload your resume</p>
                        @endif                       

                        @if(empty($user->profile->profile_pic)&&Auth::check()&&Auth::user()->id==$user->id)
                              <p style="color: rgb(236, 32, 32); font-weight: bold; font-size: 18px;">Please upload your profile picture</p>
                        @endif                                               
                        
                        <h3 class="heading"><strong>Email:</strong>&nbsp; &nbsp; {{$user->email}}</h3>
                        <h3 class="heading"><strong>Phone:</strong>&nbsp; &nbsp; {{$user->profile->phone_number}}</h3>
                        <h3 class="heading"><strong>Address:</strong></strong> &nbsp; &nbsp;</h3>
                        <p><h5 class="heading">{{$user->profile->address_line1}}
                        {{$user->profile->address_line2}},
                        {{$user->profile->city}},&nbsp;{{$user->profile->state}},
                        Pincode:&nbsp; {{$user->profile->pincode}}</h5></p>

                        <h3 class="heading"><strong>Gender:</strong>&nbsp; &nbsp; {{$user->profile->gender}}</h3>
                        <h3 class="heading"><strong>Date of Birth:</strong> &nbsp; &nbsp; {{$user->profile->dob}}</h3>

                        @if(!empty($user->profile->preferred_location))
                        <h3 class="heading"><strong>Preferred Location:</strong>&nbsp; &nbsp; {{$user->profile->preferred_location}}</h3>
                        @endif

                        @if(!empty($user->profile->expected_ctc))
                        <h3 class="heading"><strong>Expected CTC:</strong>&nbsp; &nbsp;{{$user->profile->expected_ctc}}&nbsp;Lakh(s)</h3>
                        @endif

                        <hr>
                          <div class="meta">
                          <div>Member since: &nbsp; &nbsp; {{date('F d Y',strtotime($user->created_at))}}</div>                         
                        </div>                       

                        </div>

                        @if(count($user->skills)>0)
                        <div class="mb-3 p-3 bg-white">                                                                            
                                 <h6 class="d-inline-block h6 text-white bg-dark font-weight-bold mb-0">&nbsp;&nbsp;
                                  <i class="fa fa-star" aria-hidden="true"></i>&nbsp;&nbsp;SKILLS&nbsp;&nbsp;</h6>
                                  <br><br>
                                  <div class="card">
                                    <div class="card-body p-2">
                                      @foreach($user->skills as $skill)
                                      <button type="button" class="btn btn-sm btn-info mt-1">{{$skill->skill}}</button>
                                      @endforeach              
                                    </div>
                                  </div>
                        </div>
                        @endif
                    </div>
                </div>                  
            </div>

          <div class="col-md-8 px-4 ftco-animate">
              {{--<h2 class="mb-3">Name:&nbsp; &nbsp;{{$user->name}}</h2>
              <hr>--}}

              <div class="p-3 bg-white mb-3">
              <div class="row mb-2">
              <div class="col-md-6">              
              <h6 class="text-dark"><u>Overall Experience</u>:</h6>
              <p class="text-dark">{{$user->profile->experience_years}}&nbsp; year(s)
                &nbsp; &nbsp;
                @if(!empty($user->profile->experience_months)) 
                {{$user->profile->experience_months}} &nbsp; months(s)
              @endif
              </p>
            </div>
            <div class="col-md-6">              
              <h6 class="text-dark"><u>Notice Period</u>:</h6>
              <p class="text-dark">{{$user->profile->notice_period}}</p>            
            </div></div>

              {{--@if(!empty($user->profile->preferred_location))
              <h5 class="mb-2 mt-2">Preferred Location:</h5>
              <p>{{$user->profile->preferred_location}}</p>
              @endif

              @if(!empty($user->profile->expected_ctc))
              <h5 class="mb-2 mt-2">Expected CTC:</h5>
              <p>{{$user->profile->expected_ctc}}&nbsp;Lakh(s)</p>
              @endif--}}               
                 
                        <h6 class="d-inline-block h6 text-white bg-dark font-weight-bold mb-0">&nbsp;&nbsp;
                          <i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;&nbsp;WORK HISTORY&nbsp;&nbsp;</h6>
                       <br><br>
                 
                    @if(!empty($user->profile->recent_company))
                      <h6 class="h6 text-dark"><i class="fa fa-caret-right" style="color: rgb(158, 158, 176);" aria-hidden="true"></i>
                        <strong>Company (Recent/Current):</strong>&nbsp;{{$user->profile->recent_company}}</h6>
                      @if(!empty($user->profile->industry)) 
                      <h6 class="h6 mb-2 text-muted"><strong>Industry (Recent/Current):</strong>&nbsp;{{$user->profile->industry}}</h6> 
                      @endif
                      @if(!empty($user->profile->recent_designation)) 
                      <h6 class="h6 mb-2 text-muted"><strong>Designation (Recent/Current):</strong>&nbsp;{{$user->profile->recent_designation}}</h6> 
                      @endif
                      {{--<h5 class="h6 mb-2 text-muted"><strong>Function (Recent/Current):</strong>&nbsp;{{$user->profile->function}}</h5>--}}                           
                      
                      <h6 class="h6 mb-2 text-muted"><strong>Started Working From:</strong>&nbsp;{{$user->profile->start_date}}</h6>
                      <h6 class="h6 mb-2 text-muted"><strong>Worked Till:</strong>&nbsp;{{$user->profile->end_date}}</h6>
                      @if(!empty($user->profile->salary_in_lakhs)) 
                      <div class="h6 mb-2 text-muted"><strong>Recent/Current CTC (in INR):</strong>&nbsp;
                                  <p>{{$user->profile->salary_in_lakhs}}&nbsp;Lakh(s)&nbsp;&nbsp;
                                    @if(!empty($user->profile->salary_in_thousands))        
                                    {{$user->profile->salary_in_thousands}}&nbsp; Thousand(s)
                                    @endif
                                  </p>
                      </div>
                      @endif
                      <hr>
                    @endif
                    @foreach($user->works as $work)
                    <div>
                                                                            
                      <h6 class="h6 text-dark"><i class="fa fa-caret-right" style="color: rgb(158, 158, 176);" aria-hidden="true"></i>
                        <strong>Company:</strong>&nbsp;{{$work->company}}</h6>
                      @if(!empty($work->industry)) 
                      <h6 class="h6 mb-2 text-muted"><strong>Industry:</strong>&nbsp;{{$work->industry}}</h6> 
                      @endif
                      @if(!empty($work->designation)) 
                      <h6 class="h6 mb-2 text-muted"><strong>Designation:</strong>&nbsp;{{$work->designation}}</h6>
                      @endif 
                      {{--<h5 class="h6 mb-2 text-muted">{{$work->function}}</h5>--}}  
                      @if(!empty($work->start_date))                          
                      <h6 class="h6 mb-2 text-muted"><strong>Started Working From:</strong>&nbsp;{{ $work->start_date }}</h6> 
                      @endif 
                      @if(!empty($work->end_date))                     
                      <h6 class="h6 mb-2 text-muted"><strong>Worked Till:</strong>&nbsp;{{ $work->end_date }}</h6>
                      {{--<div class="h6 mb-2 text-muted"><strong>Description:</strong>&nbsp;{!! nl2br(e($work->description)) !!}</div>--}}
                      @endif
                      <hr>
                    </div>
                    @endforeach

              </div>

                <div class="p-3 bg-white">
              
                        <h6 class="d-inline-block h6 text-white bg-dark font-weight-bold mb-0">&nbsp;&nbsp;
                          <i class="fas fa-graduation-cap" aria-hidden="true"></i>&nbsp;&nbsp;EDUCATION&nbsp;&nbsp;</h6>                      
                          <br><br>
                  
                    @foreach($user->educations as $education)
                      <div>
                        @if(!empty($education->qualification)) 
                        <h6 class="h6 text-dark"><i class="fa fa-caret-right" style="color: rgb(158, 158, 176);" aria-hidden="true"></i>
                          <strong>Education:</strong>&nbsp;{{$education->qualification}}</h6>
                        @endif
                          @if(!empty($education->course)) 
                        <h6 class="h6 mb-2 text-muted"><strong>Course:</strong>&nbsp;{{$education->course}}</h6> 
                        @endif
                        @if(!empty($education->specialization)) 
                        <h6 class="h6 mb-2 text-muted"><strong>Specialization:</strong>&nbsp;{{$education->specialization}}</h6> 
                        @endif                        
                        <div class="row">
                        <div class="col-md-4">
                            @if(!empty($education->performance)) 
                            <h6 class="h6 mb-2 text-muted"><strong>Performance:</strong>&nbsp;{{ $education->performance }}</h6>
                            @endif
                        </div>
                        <div class="col-md-8">
                        @if(!empty($education->performance_scale)) 
                        <h6 class="h6 mb-2 text-muted"><strong>Performance Scale:</strong>&nbsp;{{ $education->performance_scale }}</h6>
                        @endif
                        </div>                       
                        </div>
                        @if(!empty($education->institute))                             
                        <h6 class="h6 mb-2 text-muted"><strong>Institute:</strong>&nbsp;{{$education->institute}}</h6>
                        @endif
                        <div class="row">
                        <div class="col-md-4">
                        @if(!empty($education->c_type)) 
                        <h6 class="h6 mb-2 text-muted"><strong>Course Type:</strong>&nbsp;{{ $education->c_type }}</h6>
                        @endif  
                      </div>
                      <div class="col-md-8">                      
                        @if(!empty($education->p_year)) 
                        <h6 class="h6 mb-2 text-muted"><strong>Passing Out Year:</strong>&nbsp;{{ $education->p_year }}</h6>
                        @endif
                      </div>
                        </div>
                      <hr>
                      </div>
                    @endforeach

                </div>
            <br> <br>  
          </div>
        </div>
      </div>
</section>

