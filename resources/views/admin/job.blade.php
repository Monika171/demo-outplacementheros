@extends('layouts.main')
@section('content')

{{--<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">My Posts</h1>
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
          <u>All Jobs</u></h1>
        </div>
        
        <div class="col-md-3 ftco-animate text-center text-md-right mb-5" data-scrollax=" properties: { translateY: '70%' }">                            
          <a class="btn btn-sm" style="background:#0c127d; font-size:18px; color:white;" href="{{route('alljobs')}}" role="button">
            <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Job Seeker's View&nbsp;&nbsp;<i class="ion-ios-arrow-forward"></i><br>
           <small>(only available to admin for now)</small>
          </a>             
        </div>
		  </div>
	</div>
  </div>
  <section class="ftco-section bg-light">
    <div class="container">
       <div class="row">
       <div class="col-md-3">
         @include('admin.left-menu')
       </div>
       <div class="col-md-9">

        @if(Session::has('message'))

        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        
        <div class="row justify-content-center mt-0 mb-2 pt-0">
          <div class="heading-section text-center ftco-animate">           
              <h4><span><i class="fa fa-cubes" aria-hidden="true"></i>&nbsp;
                Total Job Postings:</span>&ensp;{{count($jobs)}} </span></h4>                             
          </div>
          </div>

        @if(count($jobs)>0)

        <div class="table-responsive-sm">
          <table class="table table-striped table-dark table-bordered table-hover text-center">
              <thead>
                <tr>
                  <th scope="col">S.No.</th>                        
                  <th scope="col">POSITION<br><small>(& Vacancy)</small></th>
                  <th scope="col">COMPANY</th> 
                  <th scope="col">LOCATION</th>                                                                 
                  <th scope="col">TOTAL<br>APPLICATIONS</th>                          
                  <th scope="col">DELETE</th>
                  {{--<th scope="col"><small>Click to change</small><br>STATUS</th>--}} 
                  
                </tr>
              </thead>
              <tbody>
              
               @foreach($jobs as $job)
               
                <tr>
                  <th scope="row"><br>
                  {{ $loop->iteration }}
                </th> 
                  <td>
                    <a href="{{route('jobs.show',[$job->id,$job->slug])}}" target="_blank"> {{$job->position}}</a>
                    <br>
                  <small>                                                        
                  ({{$job->number_of_vacancy}})</small>                  
                  </td>

                  <td>
                    <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}" target="_blank">{{$job->company->cname}}</a>
                    <br>
                    <small>
                   <i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;Posted on:<br>
                    {{date('F d, Y', strtotime($job->created_at))}}
                    </small>
                  </td>

                  <td><i class="fa fa-map-marker" aria-hidden="true"></i>
                    &nbsp;{{$job->city}},<br>&nbsp;{{$job->state}} </td>                            

                 
                  <td><br>
                    {{count($job->users)}}                   
                  </td>                      

                  <td>
                    <a class="text-danger mx-0" href="#" data-toggle="modal" data-target="#adminDelJob{{$job->id}}">
                    <strong><i class="far fa-trash-alt"></i></strong><br>Delete
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="adminDelJob{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-danger" id="exampleModalLabel">
                              <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Delete Job Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-dark text-center">
                            This job posting for "{{$job->position}}" & all associated job-seeker applications will be <strong>PERMANENTLY REMOVED</strong> from records.
                            <br><strong>Are you sure?</strong>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="{{route('j.destroy',[$job->id])}}" method="POST">@csrf
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal end-->
                
                  </td>

                  {{--<td><h6>
                    <br>
                    @if($job->status=='0')
                    <a href="{{route('job.toggle',[$job->id])}}" class="badge badge-secondary"> Draft</a>
                     @else
                    <a href="{{route('job.toggle',[$job->id])}}" class="badge badge-success"> Live</a>
                    @endif</h6>
                  </td>--}}
                
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
    <h6 class="mt-5 mb-0">Oops! No jobs are posted yet.</h6>
    <p class="mt-0 mb-5">Have a nice day!</p>
  </div>
@endif

        
   </div>
   </div>
</div>

</section>
@endsection