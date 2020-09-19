
@extends('layouts.main')
@section('content')

<div class="hero-wrap" style="height: 300px; background:#038cfc">
  <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 300px" data-scrollax-parent="true">
            <div class="col-md-9 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
               <h1  style="font-size: 30px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                <u>@if($user_type=='seeker')
                All Job Seekers
                @elseif($user_type=='employer')
                All Hiring Employers
                @elseif($user_type=='semployer')
                All Separating Employers
                @elseif($user_type=='consultant')
                All Consultants
                @elseif($user_type=='volunteer')
                All Mentors
                @elseif($user_type=='jvolunteer')
                All Mentors<br><small>(Job Search Support)</small>
                @endif
              </u>                
                
                </h1>
            </div>
            @if($user_type=='seeker') 
            <div class="col-md-3 ftco-animate text-center text-md-right mb-5" data-scrollax=" properties: { translateY: '70%' }">                            
                 <a class="btn btn-sm" style="background:#0c127d; font-size:18px; color:white;" href="{{route('seeker.index')}}" role="button">
                  Hiring Employer's View&nbsp;&nbsp;<i class="ion-ios-arrow-forward"></i><br><i class="fa fa-eye" aria-hidden="true"></i></a>             
           </div>
           @endif
        </div>
  </div>
</div>

		<section class="ftco-section bg-light">
			<div class="container">
        @if(Session::has('message'))

        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
				<div class="row">

          <div class="col-md-3">
            @include('admin.left-menu')
          </div>
          <div class="col-md-9">

          <form class="mb-2" action="{{route('allusers')}}" method="GET">

            <div class="row">              

                <div class="col-md-9">

                <div class="form-group">
                  <label>User Type:</label><br>
                  <select class="form-control" name="user_type">
                      <option value="">-select-</option>
                      <option value="employer">Hiring Employers</option>
                      <option value="semployer">Separating Employers</option>
                      <option value="consultant">Consultants</option>
                      <option value="volunteer">Mentors</option>
                      <option value="jvolunteer">Mentors(Job-support)</option>
                      <option value="seeker">Job Seekers</option>
                  </select>
                </div>

              </div>
             

              <div class="col-md-3">
                             
                <div class="form-group">
                  <i class="fa fa-search mb-3 text-white" aria-hidden="true" style="font-size: 24px; float:right;"></i> <br>
                  <input type="submit" class="btn btn-info text-center" value="LIST" style="width:100%">
                        
                </div>
              
              </div>
            </div>
            </form>

            <div class="col-md-12 mb-4 ftco-animate text-center">
              <a href="{{route('allusers')}}"><i class="fa fa-undo text-info" aria-hidden="true" style="font-size: 26px;"></i></a>
            </div>
            @if(!empty($user_type))
            @if(count($users)>0)
         
          <div class="col-md-12 text-center ftco-animate">
            <!--<span class="subheading">Registered Candidates</span>-->
            <h6><span><i class="fa fa-cubes" aria-hidden="true"></i>&nbsp;
                Total:</span>&ensp;{{$users->total()}}</span></h6>  
          </div> <br>

    <div class="table-responsive-sm">
      <table class="table table-striped table-dark table-bordered table-hover text-center">
          <thead>
            <tr>
              <th scope="col">S.No.</th>                        
              <th scope="col">Name</th>
              <th scope="col">EMAIL-ID</th> 
              <th scope="col">PHONE</th>                                                                                 
              <th scope="col">REGISTRATION<br>DATE</th>                          
              <th scope="col">DELETE</th>
              {{--<th scope="col"><small>Click to change</small><br>STATUS</th>--}} 
              
            </tr>
          </thead>
          <tbody>

          <!-- mentor(seeker) -->
            @if($user_type=='seeker')
           @foreach($users as $user)
           
            <tr>
              <th scope="row">
              {{ $loop->iteration }}
            </th> 
              <td>
                <a href="{{route('seeker.show',[$user->profile->user_id])}}" target="_blank"> {{$user->name}}
                <br>
              <small>                                                                        
                <i class="fa fa-map-marker" aria-hidden="true"></i> {{$user->profile->city}},&nbsp;{{$user->profile->state}}                    
              </small> 
                </a>                 
              </td>

              <td>
                {{$user->email}}
              </td>

              <td>
                {{$user->profile->phone}}  
              </td>                        

             
              <td>
                {{ date('F d, Y', strtotime($user->created_at)) }}                
              </td>                      

              <td>
                <a class="text-danger mx-0" href="#" data-toggle="modal" data-target="#adminDelSeeker{{$user->id}}">
                <strong><i class="far fa-trash-alt"></i></strong><br>Delete
                </a> 
                
                  <!-- Modal -->
                  <div class="modal fade" id="adminDelSeeker{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-danger" id="exampleModalLabel">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Delete Job Seeker?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-center text-dark">
                          This user "{{$user->name}}" & all associated records will be <strong>PERMANENTLY deleted.</strong>
                          <br><strong>Are you sure?</strong>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <form action="{{route('u.destroy',[$user->id])}}" method="POST">@csrf
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

          <!-- mentor -->
          @elseif($user_type=='volunteer')
           @foreach($users as $user)
           
            <tr>
              <th scope="row"><br>
              {{ $loop->iteration }}
            </th> 
              <td>
                <a href="{{route('mentor.show',[$user->id])}}" target="_blank"> {{$user->name}}
                <br>
              <small>                                                                        
                <i class="fa fa-map-marker" aria-hidden="true"></i> {{$user->vprofile->city}},&nbsp;{{$user->vprofile->state}}                    
              </small> 
                </a>                 
              </td>

              <td>
                {{$user->email}}
              </td>

              <td>
                {{$user->vprofile->phone}}  
              </td>                        

             
              <td>
                {{ date('F d, Y', strtotime($user->created_at)) }}                
              </td>                      

              <td>
                <a class="text-danger mx-0" href="#" data-toggle="modal" data-target="#adminDelVolun{{$user->id}}">
                <strong><i class="far fa-trash-alt"></i></strong><br>Delete
                </a>
                
                  <!-- Modal -->
                  <div class="modal fade" id="adminDelVolun{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-danger" id="exampleModalLabel">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Delete Mentor?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-center text-dark">
                          This user "{{$user->name}}" & all associated records will be <strong>PERMANENTLY deleted.</strong>
                          <br><strong>Are you sure?</strong>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <form action="{{route('u.destroy',[$user->id])}}" method="POST">@csrf
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

          <!-- mentor(job-search) -->
          @elseif($user_type=='jvolunteer')
           @foreach($users as $user)
           
            <tr>
              <th scope="row"><br>
              {{ $loop->iteration }}
            </th> 
              <td>
                <a href="{{route('jmentor.show',[$user->id])}}" target="_blank"> {{$user->name}}
                <br>
              <small>                                                                        
                <i class="fa fa-map-marker" aria-hidden="true"></i> {{$user->jvprofile->city}},&nbsp;{{$user->jvprofile->state}}                    
              </small> 
                </a>                 
              </td>

              <td>
                {{$user->email}}
              </td>

              <td>
                {{$user->jvprofile->phone}}  
              </td>                        

             
              <td>
                {{ date('F d, Y', strtotime($user->created_at)) }}                
              </td>                      

              <td>
                <a class="text-danger mx-0" href="#" data-toggle="modal" data-target="#adminDelJVolun{{$user->id}}">
                <strong><i class="far fa-trash-alt"></i></strong><br>Delete
                </a> 
                
                  <!-- Modal -->
                  <div class="modal fade" id="adminDelJVolun{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-danger" id="exampleModalLabel">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Delete Mentor(Job-Support)?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-center text-dark">
                          This user "{{$user->name}}" & all associated records will be <strong>PERMANENTLY deleted.</strong>
                          <br><strong>Are you sure?</strong>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <form action="{{route('u.destroy',[$user->id])}}" method="POST">@csrf
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

           <!-- employer -->
          @elseif($user_type=='employer')
           @foreach($users as $user)
           
            <tr>
              <th scope="row"><br>
              {{ $loop->iteration }}
            </th> 
              <td>
                <a href="{{route('company.index',[$user->company->id,$user->company->slug])}}" target="_blank">
                   {{$user->company->cname}}
                <br>
              <small>                                                                        
                <i class="fa fa-map-marker" aria-hidden="true"></i> {{$user->company->city}},&nbsp;{{$user->company->state}}                    
              </small> 
                </a>                 
              </td>

              <td>
                {{$user->email}}
              </td>

              <td>
                {{$user->company->phone}}  
              </td>                        

             
              <td>
                {{ date('F d, Y', strtotime($user->created_at)) }} 
                <br>
                <small>                                                                        
                  <i class="fa fa-user-secret" aria-hidden="true"></i>&nbsp;By:&nbsp;{{$user->name}}                    
                </small> 
              </td>                      

              <td>
                <a class="text-danger mx-0" href="#" data-toggle="modal" data-target="#adminDelEmp{{$user->id}}">
                <strong><i class="far fa-trash-alt"></i></strong><br>Delete
                </a> 
                
                  <!-- Modal -->
                  <div class="modal fade" id="adminDelEmp{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-danger" id="exampleModalLabel">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Delete Hiring Employer?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-center text-dark">
                          This company "{{$user->company->cname}}" & all associated records will be <strong>PERMANENTLY deleted.</strong>
                          <br><strong>Are you sure?</strong>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <form action="{{route('u.destroy',[$user->id])}}" method="POST">@csrf
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

          <!-- separating employer -->
          @elseif($user_type=='semployer')
           @foreach($users as $user)
           
            <tr>
              <th scope="row"><br>
              {{ $loop->iteration }}
            </th> 
              <td>
                <a href="{{route('secompany.index',[$user->secompany->id,$user->secompany->slug])}}" target="_blank"> {{$user->secompany->cname}}
                <br>
              <small>                                                                        
                <i class="fa fa-map-marker" aria-hidden="true"></i> {{$user->secompany->city}},&nbsp;{{$user->secompany->state}}                    
              </small> 
                </a>                 
              </td>

              <td>
                {{$user->email}}
              </td>

              <td>
                {{$user->secompany->phone}}  
              </td>                        

             
              <td>
                {{ date('F d, Y', strtotime($user->created_at)) }} 
                <br>
                <small>                                                                        
                  <i class="fa fa-user-secret" aria-hidden="true"></i>&nbsp;By:&nbsp;{{$user->name}}                    
                </small>                
              </td>                      

              <td>
                <a class="text-danger mx-0" href="#" data-toggle="modal" data-target="#adminDelSemp{{$user->id}}">
                <strong><i class="far fa-trash-alt"></i></strong><br>Delete
                </a> 
                
                  <!-- Modal -->
                  <div class="modal fade" id="adminDelSemp{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-danger" id="exampleModalLabel">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Delete Separating Employer?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-center text-dark">
                          This company "{{$user->secompany->cname}}" & all associated records will be <strong>PERMANENTLY deleted.</strong>
                          <br><strong>Are you sure?</strong>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <form action="{{route('u.destroy',[$user->id])}}" method="POST">@csrf
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

          <!-- consultant -->
          @elseif($user_type=='consultant')
           @foreach($users as $user)
           
            <tr>
              <th scope="row"><br>
              {{ $loop->iteration }}
            </th> 
              <td>
                <a href="{{route('consultant.index',[$user->consultant->id,$user->consultant->slug])}}" target="_blank"> 
                  {{$user->consultant->cname}}
                <br>
              <small>                                                                        
                <i class="fa fa-map-marker" aria-hidden="true"></i> {{$user->consultant->city}},&nbsp;{{$user->consultant->state}}                    
              </small> 
                </a>                 
              </td>

              <td>
                {{$user->email}}
              </td>

              <td>
                {{$user->consultant->phone}}  
              </td>                        

             
              <td>
                {{ date('F d, Y', strtotime($user->created_at)) }} 
                <br>
                <small>                                                                        
                  <i class="fa fa-user-secret" aria-hidden="true"></i>&nbsp;By:&nbsp;{{$user->name}}                    
                </small>                
              </td>                      

              <td>
                <a class="text-danger mx-0" href="#" data-toggle="modal" data-target="#adminDelCon{{$user->id}}">
                <strong><i class="far fa-trash-alt"></i></strong><br>Delete
                </a>
                
                  <!-- Modal -->
                  <div class="modal fade" id="adminDelCon{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-danger" id="exampleModalLabel">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Delete Consultant?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-center text-dark">
                          This consultant "{{$user->consultant->cname}}" & all associated records will be <strong>PERMANENTLY deleted.</strong>
                          <br><strong>Are you sure?</strong>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <form action="{{route('u.destroy',[$user->id])}}" method="POST">@csrf
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

          @endif
                            
          </tbody>
        </table>
    </div>
          
          @else
          <div class="col-md-12 text-center ftco-animate">
            <!--<span class="subheading">Registered Candidates</span>-->
            <h6 class="mt-5 mb-0">Oops! No Records Found.</h6>            
          </div>
          
          @endif 

          @else

<div class="row">
<div class="col-md-12 text-center ftco-animate">
    <!--<span class="subheading">Registered Candidates</span>-->
    <h6 class="mt-5 mb-0">Please select a value from drop~down list.</h6>   
</div>
</div>


@endif
          
				</div>
        </div>
        @if(!empty($user_type))
				<div class="row mt-5">
          <div class="col text-center">
              <div class="pagination center">  
                {{$users->appends(Illuminate\Support\Facades\Request::except('page'))->links()}}
              </div>
          </div>
        </div>
        @endif


			</div>
    </section>
    
    @endsection