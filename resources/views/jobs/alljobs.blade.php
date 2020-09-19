
@extends('layouts.main')
@section('content')

<div class="hero-wrap" style="height: 300px; background:#038cfc">
  <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 300px" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
               <h1  style="font-size: 30px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                <u>All Recent Job Posts</u></h1>
            </div>
        </div>
  </div>
</div>

		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row">

          <form class="mb-2" action="{{route('alljobs')}}" method="GET">

            <div class="row">

                <div class="col-md-4">

                <div class="form-group">
                    <label>Industry</label><br>
                    <select name="category_id" class="form-control">
                        <option value="">-select-</option>
        
                            @foreach(App\Industry::all() as $cat)
                                <option value="{{$cat->id}}">{{$cat->industry}}</option>
                            @endforeach
                        </select>
                        &nbsp;&nbsp;
                </div>

              </div>
              <div class="col-md-4">

                <div class="form-group">
                    <label>Position&nbsp;</label> <br>                   
                    <input class="form-control" name="position" list="position" placeholder="designation">
                    <datalist id="position">
                        @foreach($positionlist as $p)
                        <option value="{{$p}}">
                        @endforeach
                    </datalist>  
                </div>
              </div>

              <div class="col-md-3">

                <div class="form-group">
                  <label for="city">Location</label>  <br>                
                  <input class="form-control" name="city" list="city" placeholder="city">
                    <datalist id="city">
                        @foreach($citylist as $c)
                        <option value="{{$c}}">
                        @endforeach
                    </datalist>              
                </div>
              </div>
            

              <div class="col-md-1">
                             
                <div class="form-group">
                  <i class="fa fa-search mb-3" aria-hidden="true" style="font-size: 24px; float:right; color:rgb(14, 171, 27);"></i> <br>
                  <input type="submit" class="btn btn-outline-success text-center" value="Search">
                        
                </div>
              
              </div>
            </div>
            </form>

            <div class="col-md-12 mb-4 ftco-animate text-center">
              <a href="{{route('alljobs')}}"><i class="fa fa-undo text-success" aria-hidden="true" style="font-size: 38px;"></i></a>
            </div>

          @if(count($jobs)>0)
          @foreach($jobs as $job)

         
            <div class="col-md-12 ftco-animate">
                   
              <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
                           
                
                                <div class="col-4 col-md-3">
                                  <div class="d-flex">
                                    @if(empty($job->company->logo))
                                    <img width=50% src="{{asset('profile_pic/logo.jpg')}}" class="img-fluid mx-auto">
                                    @else
                                    <img width=50% src="{{asset('uploads/logo')}}/{{$job->company->logo}}" class="img-fluid mx-auto">
                                    @endif                                
                                  </div>
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
            </div><!-- end -->
         
          @endforeach
          @else
          <div class="col-md-12 text-center ftco-animate">
            <!--<span class="subheading">Registered Candidates</span>-->
            <h6 class="mt-5 mb-0">New jobs will be posted soon.</h6>
            <p class="mt-0 mb-5">Please Visit Again. Thank You.</p>
          </div>
          
          @endif        
        </div>
        
				<div class="row mt-5">
          <div class="col text-center">
              <div class="pagination center">  
                {{$jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links()}}
              </div>
          </div>
        </div>
			</div>
    </section>
    
    @endsection

    
                        
                {{--<div class="col-md-3">
               
                    <div class="form-group">
                    <label>Keyword&nbsp;</label><br>
                    <input type="text" name="title" class="form-control" placeholder="enter desired keyword">
                    </div>
                    </div>
            <div class="form-group">
                  <label>Employment &nbsp;</label>
                  <select class="form-control" name="type">
                          <option value="">-select-</option>
                          <option value="fulltime">fulltime</option>
                          <option value="parttime">parttime</option>
                          <option value="casual">casual</option>
                      </select>
                      &nbsp;&nbsp;
              </div>--}}
		
	