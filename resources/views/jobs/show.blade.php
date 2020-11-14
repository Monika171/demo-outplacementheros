@extends('layouts.main')

@section('select2css')  
<style>
p {
  font-size: 18px;
}

.badge {
    position: relative;
    top: -25px;
    left: -23px;
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
               <h1  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$job->title}}</h1>           
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
                <u>{{$job->title}}</u></h1>
            </div>
        </div>
  </div>
</div>

    <div class="ftco-section bg-light">
      <div class="container">
	  
	        @if(Session::has('message'))

      <div class="alert alert-success">{{Session::get('message')}}</div>
      @endif
        @if(Session::has('err_message'))

      <div class="alert alert-danger">{{Session::get('err_message')}}</div>
      @endif
      @if(isset($errors)&&count($errors)>0)
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>

      @endif
        <div class="row" id="app">               
          <div class="col-md-12 col-lg-8 mb-5 p-5 bg-white">  

              <div class="row form-group mb-2">
                <div class="col-md-12"><h5>
                  <i class="fa fa-sticky-note" aria-hidden="true" style="color: rgb(107, 107, 150); font-size: 20px;"></i>
                  &nbsp;&nbsp; Description</h5></div>
                <div class="col-md-12 my-0 mb-md-0">
                  <p> {{$job->description}}</p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  
                  <div class="row form-group mb-2">
                    <div class="col-md-12"><h5><i class="fa fa-briefcase" aria-hidden="true" style="color: rgb(107, 107, 150); font-size: 20px;"></i>
                      &nbsp;&nbsp; Position:</h5></div>
                    <div class="col-md-12 my-0 mb-md-0">
                      <p>{{$job->position}}</p>
                    </div>
                  </div>

                </div>
                <div class="col-md-6">

                  <div class="row form-group mb-2">
                    <div class="col-md-12"><h5><i class="fa fa-briefcase" aria-hidden="true" style="color: rgb(107, 107, 150); font-size: 20px;"></i>
                      &nbsp;&nbsp; Industry:</h5></div>
                    <div class="col-md-12 my-0 mb-md-0">
                      <p>@foreach(App\Models\Industry::all() as $cat)
                      {{$cat->id==$job->category_id?$cat->industry:''}}         
                      @endforeach
                    </p> 
                    </div>
                  </div>
                
                
                </div>
              </div>

              <div class="row form-group mb-2">
                <div class="col-md-12"><h5><i class="fa fa-briefcase" aria-hidden="true" style="color: rgb(107, 107, 150); font-size: 20px;"></i>
                  &nbsp;&nbsp; Experience Required:</h5></div>
                <div class="col-md-12 my-0 mb-md-0">
                  <p>{{$job->experience}}&nbsp;years</p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">

              <div class="row form-group mb-2">
                <div class="col-md-12"><h5><i class="fa fa-credit-card" aria-hidden="true" style="color: rgb(107, 107, 150); font-size: 20px;"></i>
                  &nbsp;&nbsp; Salary:</h5></div>
                <div class="col-md-12 my-0 mb-md-0">
                  <p>{{$job->salary}}</p>
                </div>
              </div>

            </div>
                <div class="col-md-6">

              <div class="row form-group mb-2">
                <div class="col-md-12"><h5><i class="fa fa-users" style="color: rgb(107, 107, 150); font-size: 20px;"></i>
                  &nbsp;&nbsp; Number of Vacancy:</h5></div>
                <div class="col-md-12 my-0 mb-md-0">
                  <p>{{$job->number_of_vacancy }}</p>
                </div>
              </div>

                </div>
              </div>

              <div class="row form-group mb-2">
                <div class="col-md-12"><h5><i class="fa fa-briefcase" aria-hidden="true"style="color: rgb(107, 107, 150); font-size: 20px;"></i>
                  &nbsp;&nbsp; Notice Period:</h5></div>
                <div class="col-md-12 my-0 mb-md-0">
                  <p>{{$job->notice_period}}</p>
                </div>
              </div>

              <div class="row form-group mb-2">
                <div class="col-md-12"><h5><i class="fa fa-briefcase" aria-hidden="true" style="color: rgb(107, 107, 150); font-size: 20px;"></i>
                  &nbsp;&nbsp; Roles and Responsibilities:</h5></div>
                <div class="col-md-12 my-0 mb-md-0">
                  <p>{{$job->roles}}</p>
                </div>
              </div>

              <div class="row form-group mb-2">
                <div class="col-md-12"><h5><i class="fa fa-briefcase" aria-hidden="true"style="color: rgb(107, 107, 150); font-size: 20px;"></i>
                  &nbsp;&nbsp; Preferences:</h5></div>
                <div class="col-md-12 my-0 mb-md-0">
                  <p>{{$job->preferences}}</p>
                </div>
              </div>

			  {{--<div class="row form-group mb-2">
                <div class="col-md-12"><h5><i class="fa fa-briefcase" aria-hidden="true" style="color: rgb(107, 107, 150); font-size: 20px;"></i>
                  &nbsp;&nbsp; Employment Type:</h5></div>
                <div class="col-md-12 my-0 mb-md-0">
                  <p>{{$job->type}}</p>
                </div>
              </div>

              
			  <div class="row form-group mb-2">
          <div class="col-md-12"><h5><i class="fa fa-briefcase" aria-hidden="true" style="color: rgb(107, 107, 150); font-size: 20px;"></i>
            &nbsp;&nbsp; Function</h5></div>
          <div class="col-md-12 my-0 mb-md-0">
            <p>{{$job->function}} </p>
          </div>
        </div>--}}

        <div class="row">
          <div class="col-md-4">

            <div class="row form-group mb-2">
              <div class="col-md-12"><h5><i class="fas fa-graduation-cap" aria-hidden="true" style="color: rgb(107, 107, 150); font-size: 20px;"></i>
                &nbsp;Qualification:</h5></div>
              <div class="col-md-12 my-0 mb-md-0">
                <p>{{$job->course}} </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">

            <div class="row form-group mb-2">
              <div class="col-md-12"><h5><i class="fa fa-certificate" aria-hidden="true" style="color: rgb(107, 107, 150); font-size: 20px;"></i>
                &nbsp;Specialization:</h5></div>
              <div class="col-md-12 my-0 mb-md-0">
                <p>{{$job->specialization}} </p>
              </div>
            </div>

          </div>
          <div class="col-md-4">

			  <div class="row form-group mb-2">
          <div class="col-md-12"><h5><i class="fa fa-user" aria-hidden="true" style="color: rgb(107, 107, 150); font-size: 20px;"></i>
            &nbsp;Gender:</h5></div>
          <div class="col-md-12 my-0 mb-md-0">
            <p>{{$job->gender}} </p>
          </div>
        </div>

      </div>        
    </div>
  </div>

          <div class="col-lg-4">
		  <div class="p-4 mb-3 bg-white">
                                              
        <small class="badge badge-success mb-2">Posted:&nbsp;{{$job->created_at->diffForHumans()}}
        </small>

        <div class="text-center">
              <h3 class="h5 text-black" style="font-weight: bold;">Last date to apply:</h3>              
              <strong><p class="mb-4">                
                {{ date('F d, Y', strtotime($job->last_date)) }}</p></strong> 
              <hr>   
              
              @if(count($job->skills)>0)
                        <div class="mb-3 p-2 bg-white">                                                                                                          
                                  <h3 class="h5 text-black">
                                    <i class="fa fa-star" aria-hidden="true" style="color: rgb(107, 107, 150); font-size: 20px;"></i>&nbsp;Skills:
                                  </h3> 
                                  <div class="card">
                                    <div class="card-body p-2">
                                      @foreach($job->skills as $skill)
                                      <button type="button" class="btn btn-sm btn-info mt-1">{{$skill->skill}}</button>
                                      @endforeach              
                                    </div>
                                  </div>
                        </div>
                        @endif
            
              <h3 class="h5 text-black">Job Location:</h3>              
              <p class="mb-4">{{$job->address_line1}}&nbsp;{{$job->address_line2}}&nbsp;<br>
                {{$job->city}},&nbsp;{{$job->state}}&nbsp;{{$job->pincode}}</p>            
            
              <h3 class="h5 text-black">Company Name:</h3>              
              <p class="mb-4">{{$job->company->cname}} <br>
              <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}">
                [<i class="fa fa-rocket" aria-hidden="true"></i>
                Visit Company Page]
              </a> </p>
				    {{--<p><a href="{{route('company.index',[$job->company->id,$job->company->slug])}}" class="btn btn-warning" style="width: 100%;">
            Visit Company Page
            </a></p>--}}
        </div>
            </div>
            
            <div class="p-4 mb-3 bg-white">
              <!--<h3 class="h5 text-black mb-3">More Info</h3>-->
            <p>
              @if(Auth::check()&&Auth::user()->user_type=='seeker')            

                  @if(!$job->checkApplication())
                  
                  <apply-component :jobid={{$job->id}}></apply-component>
                  @else
                  <div class="text-center px-1 pb-1 pt-2 bg-secondary text-warning">
                      <h6><strong>Application Sent &nbsp;<i class="fa fa-check" aria-hidden="true"></i></strong></h6>
                  </div>
                  @endif
              <br>
                  <favorite-component :jobid={{$job->id}} :favorited={{$job->checkSaved()?'true':'false'}}  ></favorite-component>                     

              @endif

            

            @if(Auth::check()&&Auth::user()->id==$job->user_id)
            
            {{--<a class="float-left text-success mx-0" href="{{route('job.edit',[$job->id])}}"><strong>
              <i class="fas fa-pencil-alt"></i>&nbsp;E</strong>
            </a>

            <a href="{{route('job.edit',[$job->id])}}"> <button class="btn btn-dark">Edit</button></a>--}}

            <a class="btn btn-dark" href="{{route('job.edit',[$job->id])}}" role="button" style="width: 100%;">
              <i class="fas fa-pencil-alt text-white"></i>&nbsp; &nbsp;Edit </a>

            <br><br>
          <!-- Button trigger modal -->

          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delJob{{$job->id}}" style="width: 100%;">
            <i class="far fa-trash-alt text-white"></i>&nbsp; &nbsp;Delete
          </button>           

             {{--<a class="btn btn-danger" data-toggle="modal" data-target="#delJob{{$job->id}}" role="button">
            <i class="far fa-trash-alt text-white"></i>&nbsp; &nbsp;Delete </a>
            style="font-size: 34px;float:right;color:green;"href="#" 

              <a class="float-right text-danger mx-0" href="#" data-toggle="modal" data-target="#delJob{{$job->id}}">
              <strong><i class="far fa-trash-alt"></i>&nbsp;D</strong>
              </a>--}}

              <!-- Modal -->
              <div class="modal fade" id="delJob{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Job Post</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <form action="{{route('job.destroy',[$job->id])}}" method="POST">@csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal end-->

            @endif



              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

	@endsection	