@extends('layouts.main')

@section('select2css')
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
   <link href="{{ asset('css/style.css') }}" rel="stylesheet">

   <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

   <style>
     .datepicker-Y {position: relative; z-index:10000 !important;}
     .datepicker-YM {position: relative; z-index:10000 !important;}
         /* .ui-datepicker-calendar {
            display: none;
          }
          .ui-datepicker-month {
            display: none;
          }
          .ui-datepicker-prev{
            display: none;
          }
          .ui-datepicker-next{
            display: none;
          }*/
     </style>
@endsection


@section('content')
<main>
{{--<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <div  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Education and Work History</div>
              </div>
              <div class="col-md-4 ftco-animate text-center text-md-right mb-5" data-scrollax=" properties: { translateY: '70%' }">
                @if(Auth::check()&&Auth::user()->id==$user->id)
                   <a class="btn btn-warning btn-lg" href="{{route('user.profile')}}" role="button"> <i class="ion-ios-arrow-back"></i>&nbsp; <u><strong>Go Back</strong></u></a>
 
                @endif
             </div>
          </div>
    </div>
</div>--}}


<div class="hero-wrap" style="height: 300px; background: #038cfc">
  <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 300px" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
               <h1  style="font-size: 30px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                <u>Education and Work History</u></h1>
            </div>
            <div class="col-md-4 ftco-animate text-center text-md-right mb-5" data-scrollax=" properties: { translateY: '70%' }">
              @if(Auth::check()&&Auth::user()->id==$user->id)               

                 <a class="btn btn-warning" href="{{route('user.profile',[$user->id])}}" role="button"><i class="ion-ios-arrow-back"></i>&nbsp; <u><strong>Go Back</strong></u></a>

              @endif
           </div>
        </div>
  </div>
</div>

<section class="ftco-section bg-light">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          
           
          <div class="card mb-3"> 
              <div class="card-header">
                  <a class="card-title">
                    <h5 class="d-inline-block h5 text-dark font-weight-bold mb-0">Education</h5>  
                      <button class="btn btn-primary float-right  py-0 mr-1 px-1" data-toggle="modal" data-target="#addeducation{{$user->id}}">
                      <i class="far fa-edit text-white"></i> <span class="text-white h6">Add New</span>
                      </button>
                  </a>
              </div>
                <div class="card-body" id="educationBackgroundBody">                       
                    @foreach($educations as $education)
                    <div>
                      <p class="float-right text-danger targetEducDiv"><i class="far fa-trash-alt" data-toggle="modal" data-target="#deleteEducation{{$education->id}}"></i></p>  
                      <p class="float-right text-info mr-4"><i class="fas fa-pencil-alt" data-id="{{$education->id}}" data-toggle="modal" data-target="#editeducation{{$education->id}}"></i></p>
                      <h6 class="h6 text-info"><strong>Education:</strong>&nbsp;{{$education->qualification}}</h6>
                      <h6 class="h6 mb-2 text-muted"><strong>Course:</strong>&nbsp;{{$education->course}}</h6> 
                      <h6 class="h6 mb-2 text-muted"><strong>Specialization:</strong>&nbsp;{{$education->specialization}}</h6>                             
                      <h6 class="h6 mb-2 text-muted"><strong>Institute:</strong>&nbsp;{{$education->institute}}</h6>
                      <h6 class="h6 mb-2 text-muted"><strong>Course Type:</strong>&nbsp;{{ $education->c_type }}</h6>
                      <h6 class="h6 mb-2 text-muted"><strong>Performance Scale:</strong>&nbsp;{{ $education->performance_scale }}</h6>
                      <h6 class="h6 mb-2 text-muted"><strong>Performance:</strong>&nbsp;{{ $education->performance }}</h6>
                      <h6 class="h6 mb-2 text-muted"><strong>Passing Out Year:</strong>&nbsp;{{ $education->p_year }}</h6>
                      <hr>
                    </div>

                      <!-- Edit Educational Background Modal -->
                      <div class="modal fade" id="editeducation{{$education->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <form id="frmParameter3">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title text-info" id="exampleModalLabel">Edit Educational Background</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body addeducationbody"> 

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa fa-trophy"></i>&nbsp;Education</span>
                                        </div>
                                        {{--<input type="text" id="editQualification" class="form-control" name="edit_qualification" value="{{$education->qualification}}">--}}
                                        <select id="editQualification" class="form-control" name="edit_qualification">
                                          <option value="" {{$education->qualification==''?'selected':''}}>Select</option>
                                          <option value="Doctorate/PhD" {{$education->qualification=='Doctorate/PhD'?'selected':''}}>Doctorate/PhD</option>
                                          <option value="Masters/Post-Graduation" {{$education->qualification=='Masters/Post-Graduation'?'selected':''}}>Masters/Post-Graduation</option>
                                          <option value="Graduation/Diploma" {{$education->qualification=='Graduation/Diploma'?'selected':''}}>Graduation/Diploma</option>
                                          <option value="12th" {{$education->qualification=='12th'?'selected':''}}>12th</option>
                                          <option value="10th" {{$education->qualification=='10th'?'selected':''}}>10th</option>
                                          <option value="Below 10th" {{$education->qualification=='Below 10th'?'selected':''}}>Below 10th</option>
                                          
                                        </select>
                                    </div>  
                                                                    
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-graduation-cap" aria-hidden="true"></i>&nbsp;Course</span>
                                          
                                        </div>
                                        <select id="editCourse" class="form-control" name="edit_course">
                                                <option value="" {{$education->course==''?'selected':''}}>Select</option>                               
                                            @foreach($course as $co)
                                                <option value="{{$co}}" {{$education->course==$co?'selected':''}}>{{$co}}</option>
                                            @endforeach
                                        </select>
                                            
                                      </div>

                                    {{-- <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa fa-certificate" aria-hidden="true"></i>&nbsp;Specialization</span>
                                          
                                        </div>
                                        <input type="text" id="editSpecialization" class="form-control" name="edit_specialization" value="{{$education->specialization}}">
                                      </div>--}}
                                            
                                          <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-certificate" aria-hidden="true"></i>&nbsp;Specialization</span>
                                          </div>
                                              <select id="editSpecialization" class="form-control" name="edit_specialization">
                                                        <option value="" {{$education->specialization==''?'selected':''}}>Select</option>                               
                                                    @foreach($specialization as $sp)
                                                        <option value="{{$sp}}" {{$education->specialization==$sp?'selected':''}}>{{$sp}}</option>
                                                    @endforeach
                                              </select>
                                        </div>                                        
                                        
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa fa-university" aria-hidden="true"></i>&nbsp;Institute</span>
                                        </div>
                                        <input type="text" id="editInstitute" class="form-control" name="edit_institute" value="{{$education->institute}}">
                                      </div>

                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa fa-hourglass-half" aria-hidden="true"></i>&nbsp;Course Type</span>
                                        </div>
                                        
                                        <select class="form-control" id="editCourseType" name="edit_c_type">
                                          <option value="" {{$education->c_type==''?'selected':''}}>Select</option>
                                          <option value="fulltime" {{$education->c_type=='fulltime'?'selected':''}}>Full Time</option>
                                          <option value="parttime" {{$education->c_type=='parttime'?'selected':''}}>Part Time</option>
                                          <option value="correspondence/distance Learning" {{$education->c_type=='correspondence/distance Learning'?'selected':''}}>Correspondence/Distance Learning</option>
                                        </select>     
                                      
                                      </div>

                                      <div class="row">

                                        <div class="col-md-7">                                     
                                            <div class="input-group mb-3">  
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="fa fa-percent" aria-hidden="true"></i>
                                                  <i class="fa fa-font" aria-hidden="true"></i>
                                                  &nbsp;Performance Scale</span>
                                              </div>
                                            <select id="cmbParameter3" class="form-control forminputbox" name="cmbParameter3">
                                              <option value=""{{$education->c_type==''?'selected':''}}>---Select---</option>
                                              <option value="Percentage" {{$education->performance_scale=='Percentage'?'selected':''}}>Percentage</option>
                                              <option value="CGPA(Scale of 10)" {{$education->performance_scale=='CGPA(Scale of 10)'?'selected':''}}>CGPA(Scale of 10)</option>
                                              <option value="CGPA(Scale of 9)" {{$education->performance_scale=='CGPA(Scale of 9)'?'selected':''}}>CGPA(Scale of 9)</option>
                                              <option value="CGPA(Scale of 8)" {{$education->performance_scale=='CGPA(Scale of 8)'?'selected':''}}>CGPA(Scale of 8)</option>
                                              <option value="CGPA(Scale of 7)" {{$education->performance_scale=='CGPA(Scale of 7)'?'selected':''}}>CGPA(Scale of 7)</option>
                                              <option value="CGPA(Scale of 5)" {{$education->performance_scale=='CGPA(Scale of 5)'?'selected':''}}>CGPA(Scale of 5)</option>
                                              <option value="CGPA(Scale of 4)" {{$education->performance_scale=='CGPA(Scale of 4)'?'selected':''}}>CGPA(Scale of 4)</option>
                                          </select>
                                          
                                            </div>
                                        </div>
                                      <div class="col-md-4">
                                        <div class="input-group mb-3"> 
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">Performance </span>
                                            </div>
                                            <input type="text" id="mytext3" class="form-control" name="mytext3" value="{{$education->performance}}"/>
                                        
                                          </div>
                                      </div>
                                      </div>


                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Passing Year</span>
                                          
                                        </div>
                                        {{--<input type="text" id="editPassingYear" class="form-control" name="add_p_year" value="{{$education->p_year}}">--}}
                                        <input type="text" id="editPassingYear" class="form-control datepicker-Y" name="edit_p_year" value="{{$education->p_year}}">
                                      </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary editEducation" data-dismiss="modal" data-id="{{$education->id}}">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </form>
                      </div>{{-- end modal --}}




                      <!-- Delete Education Modal -->
                          <div class="modal fade" id="deleteEducation{{$education->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                              
                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h4>REMOVE EDUCATION</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                  <h6 class="modal-title h6">Are you sure you want to delete <span class="text-info">"{{$education->institute}}"</span> from your profile?</h6>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger text-white px-5" data-dismiss="modal">No</button>
                                  <button type="button" class="btn btn-primary deleteEducation px-5" data-dismiss="modal" data-id="{{$education->id}}">Yes</button>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                      @endforeach
                </div>

          </div>

                    <!-- Add Educational Background Modal -->
                    <div class="modal fade" id="addeducation{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <form id="frmParameter2">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title text-info" id="exampleModalLabel">Add Educational Background</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body addeducationbody">  

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fa fa-trophy" aria-hidden="true"></i>&nbsp;Education</span>
                                    </div>
                                    {{--<input type="text" id="addQualification" class="form-control" name="add_qualification">--}}
                                    <select id="addQualification" class="form-control" name="add_qualification">
                                      <option value="">Select</option>
                                      <option value="Doctorate/PhD">Doctorate/PhD</option>
                                      <option value="Masters/Post-Graduation">Masters/Post-Graduation</option>
                                      <option value="Graduation/Diploma">Graduation/Diploma</option>
                                      <option value="12th">12th</option>
                                      <option value="10th">10th</option>
                                      <option value="Below 10th">Below 10th</option>
                                     
                                  </select>
                                     
                                  </div>
                                  
                                  
                                  {{--<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-graduation-cap" aria-hidden="true"></i>&nbsp;Course</span>
                                    </div>
                                    <input type="text" id="addCourse" class="form-control" name="add_course">
                                  </div>--}}

                                  
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-graduation-cap" aria-hidden="true"></i>&nbsp;Course</span>                                      
                                    </div>                                    
                                    <select id="addCourse" class="form-control" name="add_course">
                                              <option value="">Select</option>                               
                                          @foreach($course as $co)
                                              <option value="{{$co}}">{{$co}}</option>
                                          @endforeach
                                    </select>                                                      
                                  </div>

                                  {{--<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fa fa-certificate" aria-hidden="true"></i>&nbsp;Specialization</span>
                                      
                                    </div>
                                    <input type="text" id="addSpecialization" class="form-control" name="add_specialization">
                                  </div>--}}

                                  
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-certificate" aria-hidden="true"></i>&nbsp;Specialization</span>
                                  </div>

                                  <select id="addSpecialization" class="form-control" name="add_specialization">
                                            <option value="">Select</option>                               
                                          @foreach($specialization as $sp)
                                              <option value="{{$sp}}">{{$sp}}</option>
                                          @endforeach
                                    </select> 
                                    
                                </div>
                                      

             
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fa fa-university" aria-hidden="true"></i>&nbsp;Institute</span>
                                    </div>
                                    <input type="text" id="addInstitute" class="form-control" name="add_institute">
                                  </div>
                                  {{--<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fa fa-hourglass-half" aria-hidden="true"></i>&nbsp;Course Type</span>
                                    </div>
                                    <input type="text" id="addCourseType" class="form-control" name="add_c_type">
                                  </div>--}}

                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fa fa-hourglass-half" aria-hidden="true"></i>&nbsp;Course Type</span>
                                    </div>
                                    <select class="form-control" id="addCourseType" name="add_c_type">
                                        <option value="">Select</option>
                                        <option value="fulltime">Full Time</option>
                                        <option value="parttime">Part Time</option>
                                        <option value="correspondence/distance Learning">Correspondence/Distance Learning</option>
                                    </select>
                                   
                                </div>

                                  <div class="row">

                                    <div class="col-md-7">                                     
                                  <div class="input-group mb-3">  
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fa fa-percent" aria-hidden="true"></i>
                                        <i class="fa fa-font" aria-hidden="true"></i>
                                        &nbsp;Performance Scale</span>
                                    </div>
                                  <select id="cmbParameter2" class="form-control forminputbox" name="cmbParameter2">
                                    <option value="">---Select---</option>
                                    <option value="Percentage">Percentage</option>
                                    <option value="CGPA(Scale of 10)">CGPA(Scale of 10)</option>
                                    <option value="CGPA(Scale of 9)">CGPA(Scale of 9)</option>
                                    <option value="CGPA(Scale of 8)">CGPA(Scale of 8)</option>
                                    <option value="CGPA(Scale of 7)">CGPA(Scale of 7)</option>
                                    <option value="CGPA(Scale of 5)">CGPA(Scale of 5)</option>
                                    <option value="CGPA(Scale of 4)">CGPA(Scale of 4)</option>
                                </select>
                                
                                  </div>
                                    </div>
                                  <div class="col-md-4">
                                <div class="input-group mb-3"> 
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">Performance </span>
                                  </div>
                                <input type="text" id="mytext" class="form-control" name="mytext" />
                                
                                  </div>
                                  </div>
                                  </div>
                             
                                

                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Passing Out Year</span>
                                    </div>
                                    {{--<input type="text" id="addPassingYear" class="form-control" name="add_p_year">--}}
                                    <input type="text" id="addPassingYear" class="form-control datepicker-Y" name="add_p_year">
                                  </div>
                                  
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" data-dismiss="modal" id="addNewEducation">Save changes</button>
                              </div>
                            </div>
                          </div>
                       </form>
                    </div>

                    <br><br>
          <div class="card mb-0">

                  <div class="card-header">
                        <a class="card-title">
                          <h5 class="d-inline-block h5 text-dark font-weight-bold mb-0">Work History</h5>
                           <button class="btn btn-primary float-right  py-0 mr-1 px-1" data-toggle="modal" data-target="#addwork{{$user->id}}">
                                <i class="far fa-edit text-white"></i> <span class="text-white h6">Add New</span>
                           </button>
                        </a>
                    </div>
                    <div>
                        <div class="card-body workBackgroundBody">
                         @foreach($works as $work)
                          <div>
                            <p class="float-right text-danger targetWorkDiv">
                              <i class="far fa-trash-alt" data-toggle="modal" data-target="#deleteWork{{$work->id}}"></i>
                            </p>  
                            <p class="float-right text-info mr-4">
                                <i class="fas fa-pencil-alt" data-id="{{$work->id}}" data-toggle="modal" data-target="#editWork{{$work->id}}"></i>
                            </p>
                                                    
                             <h6 class="h6 text-info"><strong>Company:</strong>&nbsp;{{$work->company}}</h6>
                             <h6 class="h6 mb-2 text-muted"><strong>Industry:</strong>&nbsp;{{$work->industry}}</h6> 
                             <h6 class="h6 mb-2 text-muted"><strong>Designation:</strong>&nbsp;{{$work->designation}}</h6> 
                             {{--<h5 class="h6 mb-2 text-muted">{{$work->function}}</h5>--}}                           
                             <h6 class="h6 mb-2 text-muted"><strong>Started Working From:</strong>&nbsp;{{ $work->start_date }}</h6>
                             <h6 class="h6 mb-2 text-muted"><strong>Worked Till:</strong>&nbsp;{{ $work->end_date }}</h6>
                             {{--<div class="h6 mb-2 text-muted"><strong>Description:</strong>&nbsp;{!! nl2br(e($work->description)) !!}</div>--}}
                             <hr>
                           </div>

                             <!-- Edit Work Background Modal -->
                            <div class="modal fade" id="editWork{{$work->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title text-info" id="exampleModalLabel">Edit Work Background</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body editworksbody">
                                      
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="far fa-building" aria-hidden="true"></i>&nbsp;Company</span>
                                        </div>
                                        <input type="text" id="editCompany" class="form-control" value="{{$work->company}}">
                                      </div>

                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;Industry</span>
                                        </div>
                                      <select id="editIndustry" class="form-control" name="industry">
                                        <option value="" {{$work->industry==''?'selected':''}}>Select</option>                               
                                        @foreach($industry as $ind)
                                            <option value="{{$ind}}" {{$work->industry==$ind?'selected':''}}>{{$ind}}</option>
                                        @endforeach
                                      </select>

                                      </div>

                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa fa-address-card" aria-hidden="true"></i>&nbsp;Designation</span>
                                        </div>    
                                      <select id="editDesignation" class="form-control" name="designation">
                                        <option value="" {{$work->designation==''?'selected':''}}>Select</option>                               
                                        @foreach($designation as $d)
                                            <option value="{{$d}}" {{$work->designation==$d?'selected':''}}>{{$d}}</option>
                                        @endforeach
                                      </select>                                  
                                      </div>

                                      {{--<div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa fa-server" aria-hidden="true"></i>&nbsp;Function</span>
                                        </div>
                                        <input type="text" id="editFunc" class="form-control" value="{{$work->function}}">
                                      </div>--}}

                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Started Working From</span>
                                        </div>                                        
                                        <input type="text" id="editStartDate" class="form-control datepicker-YM" value="{{$work->start_date}}">
                                      </div>

                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Worked Till:</span>
                                        </div>
                                        <input type="text" id="editEndDate" class="form-control datepicker-YM" value="{{$work->end_date}}">
                                      </div>

                                      {{--<div class="form-group">
                                        <span class="input-group-text"><i class="fa fa-map" aria-hidden="true"></i>&nbsp;Description</span>
                                        <textarea class="form-control" id="editWorkDescription" rows="3">{{$work->description}}</textarea>
                                      </div>--}}
                                    </div>

                                      <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary editWorkBackground" data-dismiss="modal" data-id="{{$work->id}}">Save changes</button>
                                      </div>
                                  </div>
                                </div>
                              </div>


                              <!-- Delete Work Modal -->
                              <div class="modal fade" id="deleteWork{{$work->id}}">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                  
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4>REMOVE EMPLOYMENT RECORD</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                      <h6 class="modal-title h6">Are you sure you want to delete <span class="text-info">"{{$work->company}}"</span> from your profile?</h6>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger text-white px-5" data-dismiss="modal">No</button>
                                      <button type="button" class="btn btn-primary deleteWork px-5" data-dismiss="modal" data-id="{{$work->id}}" >Yes</button>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>


                        @endforeach
                        </div>
                    </div>
          </div>            

                    <!-- Add Work History Modal -->
                    <div class="modal fade" id="addwork{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title text-info" id="exampleModalLabel">Add New Work</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body editworksbody">

                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-building" aria-hidden="true"></i>&nbsp;Company</span>
                                  </div>
                                  <input type="text" id="addCompany" class="form-control">
                                </div>


                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;Industry</span>
                                  </div>
                                <select id="addIndustry" class="form-control" name="industry">
                                    <option value="">Select</option>                               
                                      @foreach($industry as $ind)
                                          <option value="{{$ind}}">{{$ind}}</option>
                                      @endforeach
                                </select> 
                                </div>


                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-address-card" aria-hidden="true"></i>&nbsp;Designation</span>
                                  </div>

                                      <select id="addDesignation" class="form-control" name="designation">
                                        <option value="">Select</option>                               
                                          @foreach($designation as $d)
                                              <option value="{{$d}}">{{$d}}</option>
                                          @endforeach
                                    </select> 

                                </div>

                                {{--<div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-server" aria-hidden="true"></i>&nbsp;Function</span>
                                  </div>
                                  <input type="text" id="addFunc" class="form-control">
                                </div>--}}

                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Started Working From:</span>
                                  </div>
                                  <input type="text" id="addStartDate" class="form-control datepicker-YM">
                                </div>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Worked Till:</span>
                                  </div>
                                  <input type="text" id="addEndDate" class="form-control datepicker-YM">
                                </div>
                                {{--<div class="form-group">
                                  <span class="input-group-text"><i class="fa fa-map" aria-hidden="true"></i>&nbsp;Description</span>
                                  <textarea class="form-control" id="addWorkDescription" rows="3"></textarea>
                                </div>--}}

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary addNewWorkButton" data-dismiss="modal">Save changes</button>
                              </div>
                            </div>
                          </div>
                    </div>
                 
        </div>
    </div>
</div>
</section> 

	<div class="loading">
		<i class="fas fa-circle-notch fa-spin fa-3x fa-fw"></i><br/>
		<span>Loading</span>
	</div>
</main>

@endsection

@section('jsplugins')
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<!--<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>-->
@endsection
