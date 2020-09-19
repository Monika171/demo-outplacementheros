@extends('layouts.main')

@section('select2css')
  
<style>

/*.table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
  background-color: rgb(149, 151, 163);
}

.table-bordered > thead > tr > th {
    border: none;
}*/

</style>

@endsection

@section('content')

{{--<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-9 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="{{route('company')}}">Companies <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                  <h1  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Welcome {{$company->user->name}}</h1>
              </div>
              <div class="col-md-3 ftco-animate text-center text-md-right mb-5" data-scrollax=" properties: { translateY: '70%' }">
                 @if(Auth::check()&&Auth::user()->id==$company->user_id &&(count($jobs)>0))                  
                    <a class="btn btn-warning btn-lg" href="{{route('applicant')}}" role="button">View Applicants &nbsp; &nbsp;<i class="ion-ios-arrow-forward"></i></a>
                 @endif
              </div>
          </div>
    </div>
  </div>--}}


  <div class="hero-wrap" style="height: 300px; background: #038cfc">
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 300px" data-scrollax-parent="true">
              <div class="col-md-9 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="{{route('company')}}">Companies <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                  <h1 style="font-size: 30px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                    Welcome {{$company->user->name}}</h1>
              </div>
              <div class="col-md-3 ftco-animate text-center text-md-right mb-5" data-scrollax=" properties: { translateY: '70%' }">
                 @if(Auth::check()&&Auth::user()->id==$company->user_id &&(count($jobs)>0))                 
  
                    <a class="btn btn-sm" style="background:#0c127d; font-size:18px; color:white;" href="{{route('applicant')}}" role="button">
                      All Applicants &nbsp; &nbsp;<i class="ion-ios-arrow-forward"></i></a>
  
                 @endif
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
        <h2 class="mb-4"><span>All</span> Jobs <span>Posted by You</span></h2>
        <span class="subheading">
          <i class="fa fa-cubes" aria-hidden="true"></i>
          Total: <strong>{{count($jobs)}}</strong></span>
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
                            <th scope="col">POSITION<br><small>(& Vacancy)</small></th>
                            <th scope="col">LOCATION</th>                            
                            <th scope="col">LAST DATE</th>
                            {{--<th scope="col"><small>Click to change</small><br>STATUS</th>--}}
                            <th scope="col">TOTAL<br>APPLICATIONS</th>                          
                            <th scope="col">EDIT/<br>DELETE</th>
                            
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
                                <i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;
                                {{$job->created_at->diffForHumans()}}
                                </small>
                            </td> 

                            <td>{{$job->position}}<br>
                            <small>                                                        
                            ({{$job->number_of_vacancy}})</small>
                            </td>

                            <td><i class="fa fa-map-marker" aria-hidden="true"></i>
                              &nbsp;{{$job->city}},<br>&nbsp;{{$job->state}} </td>                            

                            <td>{{ date('F d, Y', strtotime($job->last_date)) }}</td>

                            {{--<td><h6>
                              <br>
                              @if($job->status=='0')
                              <a href="{{route('job.toggle',[$job->id])}}" class="badge badge-secondary"> Draft</a>
                               @else
                              <a href="{{route('job.toggle',[$job->id])}}" class="badge badge-success"> Live</a>
                              @endif</h6>
                            </td>--}}

                            <td>
                              {{count($job->users)}}

                              @if(count($job->users)>0)
                              <br>
                            <a href="{{route('jobs.applicant',[$job->id,$job->slug])}}">
                                <button type="button" class="btn btn-outline-info btn-sm">
                                <strong>VIEW</strong></button>
                            </a>                           
                            @endif
                            
                              {{--<a href="{{route('jobs.applicant',[$job->id,$job->slug])}}">ViewApp</a>--}}
                            </td>                      

                            <td>
                            <a class="float-left text-success mx-0" href="{{route('job.edit',[$job->id])}}"><strong>
                              <i class="fas fa-pencil-alt"></i>&nbsp;E</strong>
                            </a>
                            <br>
                            <br>
                          <!-- Button trigger modal -->
                             {{--<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delJob{{$job->id}}">
                                Delete
                              </button>--}}

                              <a class="float-right text-danger mx-0" href="#" data-toggle="modal" data-target="#delJob{{$job->id}}">
                              <strong><i class="far fa-trash-alt"></i>&nbsp;D</strong>
                              </a>

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
                          
                            </td>
                          
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
              <h6 class="mt-5 mb-0">Oops! You haven't posted any jobs yet. Post a new job today and get started.</h6>
              <p class="mt-0 mb-5">Have a nice day!</p>
            </div>
          @endif
            
        </div>
    </div>
</div>
</section>
@endsection
