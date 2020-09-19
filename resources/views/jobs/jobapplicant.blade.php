@extends('layouts.main')

@section('select2css')
<style>

.badge {
    position: relative;
    top: 10px;
    left: -36px;
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
                 <h1  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Applicants</h1>
              </div>
          </div>
    </div>
</div>--}}


<div class="hero-wrap" style="height: 300px; background: #038cfc;">
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 300px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 30px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                    <u>All&ensp;Applications</u></h1>
              </div>
          </div>
    </div>
  </div>
   
<section class="ftco-section" style="background: rgba(3,2,32,0.9);">
	<div class="container">
				{{--<div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <!--<span class="subheading">Registered Candidates</span>-->
                    <h2 class="mb-4"><span>All</span> Applicants</h2>
                </div>
                </div>--}}
		
		<div class="row">
		<div class="col-md-12 ftco-animate">
       
		
		
        <div class="card border-0" style="background: rgba(3, 2, 32, 0.958);">
            
             <div class="card-header h5 text-capitalize">
                <a href="{{route('jobs.show',[$job->id,$job->slug])}}">                    
                <h5 class="text-white" style="float:left"><i class="fa fa-clone" aria-hidden="true"></i>&emsp;
                    <u>{{$job->title}}</u></h5>
                </a>                
                    <span class="p-1 bg-light text-dark" style="float:right; font-size: 0.563em;">
                        &emsp;Total Applications: <strong>{{$users->total()}}</strong>&emsp;
                    </span>
             </div>

                <div class="card-body p-0" >		
		
            @if(count($users)>0)
			@foreach($users as $user)
          
            <div class="col-md-12 ftco-animate">
                   
                <div class="job-post-item bg-white p-2 d-block d-md-flex align-items-center">  
                    
                    <div class="col-1 col-md-1 mr-0">  
                    <h5 class="text-white"><span class="badge" style="font-weight: bold; background-color: rgba(3, 2, 32, 0.958);">
                        &emsp;&nbsp;{{$loop->iteration}}&nbsp;
                    </span></h5>
                      <small>                        
                        <u>Applied:</u><br>{{ date('F d, Y', strtotime($user->pivot->created_at)) }}
                      </small>
                    </div>

                        <div class="col-4 col-md-3 ml-0 text-center">                           
                            <a href="{{route('seeker.show',[$user->id])}}"> 
                            <div class="d-flex">                                                               
                                @if(empty($user->profile->profile_pic))                                
                                    <img width="45%" src="{{asset('profile_pic/man.jpg')}}" class="pt-2 img-fluid mx-auto">                                    
                                    @else                                    
                                    <img width="45%" src="{{asset('uploads/profile_pic')}}/{{$user->profile->profile_pic}}" class="pt-2 img-fluid mx-auto">                                    
                                @endif                                    
                                                          
                            </div>
                            <small class="text-muted"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Profile</small>
                        </a>
                        </div>
                        <div class="col-7 col-md-6">
                            <a href="{{route('seeker.show',[$user->id])}}"> 
                            <div class="mb-2 mb-md-0 mr-5">
                                <div class="job-post-item-header d-flex align-items-center">
                                
                                <h4 class="mr-3 text-black">{{$user->name}}</h4>
                                                                       
                                </div>
                                <div class="job-post-item-body d-block d-md-flex text-secondary">   
                                    <div class="mr-3"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;{{$user->email}}</div>                                        
                                    <div><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;{{$user->profile->phone_number}}</div>
                                </div>
                                @if(!empty($user->profile->industry))
                                <div class="mx-0 text-secondary"><i class="fa fa-cubes" aria-hidden="true"></i>&nbsp;
                                    Recent Industry:&nbsp;{{$user->profile->industry}}</div> 
                                @endif
                                @if(!empty($user->profile->recent_designation))
                                <div class="mx-0 text-secondary"><i class="fa fa-address-card" aria-hidden="true"></i>&nbsp;
                                    Recent Designation:&nbsp;{{$user->profile->recent_designation}}</div>   
                               @endif
                                <div class="job-post-item-body d-block d-md-flex text-secondary">                                             
                                    <div class="mr-3"><i class="fa fa-briefcase" aria-hidden="true"></i>
                                        Total Experience:&nbsp;{{$user->profile->experience_years}}year(s)</div> 
                                    <div><i class="fa fa-map-marker" aria-hidden="true"></i> {{$user->profile->city}},&nbsp;{{$user->profile->state}}</div>                                 
                                </div>                                                                                                            
                            </div>
                        </a> 
                        </div>                           
                
                        <div class="col-6 col-md-2">
                        <div class="ml-auto d-flex">
                        @if(!empty($user->profile->resume))
                        <a href="{{Storage::url($user->profile->resume)}}">
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

          <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <!--<span class="subheading">Registered Candidates</span>-->
                <h2 class="mb-4"><span>No</span> &nbsp; applications<span>  &nbsp; yet..</span> </h2>
            </div>
        </div>

          @endif
        </div>
		  <!-- end -->
		  
		  </div> 
		  <br>
           
            
            
           
                </div>


            </div>
            
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="pagination center">                   
                                {{$users->links()}}                
                    </div>
                </div>
            </div>

			</div>
		</section>
		
@endsection



    