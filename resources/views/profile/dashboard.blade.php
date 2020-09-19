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
                    Welcome {{Auth::user()->name}}</h1>
              </div>
          </div>
    </div>
</div>

<section class="ftco-section bg-light">
    <div class="container">
    
      @if(Session::has('message'))
    
      <div class="alert alert-success">{{Session::get('message')}}</div>
      @endif
      
      <div class="row justify-content-center mt-0 mb-2 pt-0 pb-2">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <!--<span class="subheading">Registered Candidates</span>-->
            <h2 class="mb-4"><u><span>Your Recent</span> Job Applications</u></h2>
            <span class="subheading">
              <i class="fa fa-cubes" aria-hidden="true"></i>
              Total Applications: <strong>{{count($jobs)}}</strong></span>
        </div>
        </div>
    
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 mb-5">  
              
              @if(count($jobs)>0)
    
                      <div class="table-responsive-sm">
                        <table class="table table-striped table-dark table-bordered table-hover text-center">
                            <thead>
                              <tr>
                                <th scope="col">S.No.</th>
                                <th scope="col">TITLE</th>      
                                <th scope="col">POSITION</th>
                                <th scope="col">LOCATION</th>
                                <th scope="col">COMPANY<br>NAME</th>
                                <th scope="col">DATE OF<br>APPLICATION</th>                                                            
                                
                                
                              </tr>
                            </thead>
                            <tbody>
                            
                             @foreach($jobs as $job)
                             
                              <tr>
                                <th scope="row">
                                {{ $loop->iteration }}
                              </th> 
                                <td>
                                  <a href="{{route('jobs.show',[$job->id,$job->slug])}}">{{$job->title}}</a>
                                  <br> <small>
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;posted
                                    {{$job->created_at->diffForHumans()}}
                                    </small>
                                </td> 
    
                                <td>{{$job->position}}
                                {{--<br> <small>
                                <i class="fa fa-hourglass-half" aria-hidden="true"></i></i>&nbsp;                            
                                {{$job->type}}</small>--}}
                                </td>
    
                                <td><i class="fa fa-map-marker" aria-hidden="true"></i>
                                  &nbsp;{{$job->city}},<br>&nbsp;{{$job->state}} </td>
    
                                <td>{{$job->company->cname}}</td>
    
                                <td>{{ date('F d, Y', strtotime($job->pivot->created_at)) }}</td>                  

                              </tr> 
                            @endforeach	
                            </tbody>
                          </table>
                      </div>
    
                          <div class="pagination center">                   
                            {{$jobs->links()}}                
                          </div>
    
              @else
                <div class="text-center ftco-animate">
                  <!--<span class="subheading">Registered Candidates</span>-->
                  <h6 class="mt-5 mb-0">All Your Job Applications will be Listed Here.</h6>
                  <p class="mt-0 mb-5">Have a nice day!</p>
                </div>
              @endif
                
            </div>
        </div>
    </div>
    </section>
@endsection
