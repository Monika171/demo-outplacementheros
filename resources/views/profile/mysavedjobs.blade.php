@extends('layouts.main')

@section('content')

{{--<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Welcome {{Auth::user()->name}}</h1>
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
                 <u>My Saved Jobs</u></h1>
              </div>
          </div>
    </div>
</div>

<section class="ftco-section bg-light">
	<div class="container">
				{{--<div class="row justify-content-center mb-1 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <!--<span class="subheading">Registered Candidates</span>-->
                    <h2><span>Saved</span> Jobs</h2>
                </div>
                </div>--}}
		
		<div class="row">
      @if(count($jobs)>0)
      @foreach($jobs as $job)
          <div class="col-md-12 ftco-animate">
                   
					<div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
                       
                            <div class="col-4 col-md-3 text-center">
                              <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}"> 
                                <div class="d-flex">                                                               
                                  @if(empty($job->company->logo))
                                  <img width=50% src="{{asset('profile_pic/logo.jpg')}}" class="img-fluid mx-auto">
                                  @else
                                  <img width=50% src="{{asset('uploads/logo')}}/{{$job->company->logo}}" class="img-fluid mx-auto">
                                  @endif                                                                                             
                                </div>
                                <small class="text-muted"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Company</small>
                            </a>
                            </div>
                            <div class="col-8 col-md-7">                                
                              <div class="mb-2 mb-md-0 mr-5">
                                <div class="job-post-item-header d-flex align-items-center">
                                <h4 class="mr-3 text-black">{{$job->position}}</h4>                                        
                                </div>
                                <div class="mx-0 text-black"><i class="fa fa-cubes" aria-hidden="true"></i>&nbsp;
                                      Industry:&nbsp; 
                                        @foreach(App\Industry::all() as $cat)
                                        {{$cat->id==$job->category_id?$cat->industry:''}}         
                                        @endforeach
                                  </div>
                            
                                <div class="job-post-item-body d-block d-md-flex">  
                                  <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}">                                        
                                    <div style="color:#868e96;" class="mr-3"><i class="fa fa-building" aria-hidden="true"></i>&nbsp;{{$job->company->cname}}</div>
                                  </a>
                                  <div class="mr-3"><span class="icon-my_location"></span> {{$job->city}},&nbsp;{{$job->state}}</div>
                                  <div class="mr-3"><span class="icon-money mr-1"></span>{{$job->salary}}</div>                                          
                                </div>                                                                                       
                              </div>         
                            </div>                           
                    
                            <div class="col-6 col-md-2">
                              <div class="ml-auto d-flex">
                                <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="btn btn-info btn-sm active"  role="button" aria-pressed="true">View</a>
                               </div>
      
                               <div class="mt-1"><small>
                                <i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;Posted:<br>{{$job->created_at->diffForHumans()}}
                              </small></div>
                            </div>
                </div>	  
			  
			</div>
          
          @endforeach
          @else
          
          <div class="col-md-12 text-center ftco-animate">
            <!--<span class="subheading">No Saved Jobs!</span>-->
            <h6 class="mt-5 mb-0">Oops! There are no saved job posts or the same must have expired. </h6>                
          </div>
          @endif
        </div>
		  <!-- end -->
 
                
         <div class="row mt-5">
            <div class="col text-center">
                <div class="pagination center">                   
                            {{$jobs->links()}}                
                </div>
            </div>
          </div>
                  
			</div>
		</section>
@endsection
