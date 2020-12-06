@extends('layouts.main')

@section('select2css')
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css" rel="stylesheet" />
   <style>
    .form-group.required .control-label:after {
        content:"*";
        color:red;
      }
    </style>
@endsection
@section('content')

<div class="hero-wrap" style="height: 300px; background: #038cfc">
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 300px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 30px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                    <u>Edit Profile Information</u> <br> <small> (Mentor Support Volunteer)</small></h1>
              </div>
          </div>
    </div>
</div>
<br>
<br>
<div class="container">
    <div class="row">

        <div class="col-md-3 px-4">

            @if(empty(Auth::user()->vprofile->profile_pic))
            <img src="{{asset('profile_pic/man.jpg')}}" width="100" style="width: 100%;">
            @else
            <img src="{{asset('uploads/profile_pic')}}/{{Auth::user()->vprofile->profile_pic}}" width="100" style="width: 100%;">

            @endif


            <br>
            <br>
            

                <div class="card">
                    <div class="card-header d-inline-block text-dark font-weight-bold font-size: 12px; mb-0">Update profile picture</div>
                    <div class="card-body">
                        <form action="{{route('vprofile_pic')}}" method="POST" enctype="multipart/form-data">@csrf
                        <input type="file" class="form-control" name="profile_pic">
                        <br>
                        <button class="btn btn-info btn-sm float-left" type="submit">Update</button>
                    
                        @if($errors->has('profile_pic'))
                            <div class="error" style="color: red;">{{$errors->first('profile_pic')}}</div>
                        @endif
                        </form>

                        <!-- Button trigger modal -->
                        @if(!empty(Auth::user()->vprofile->profile_pic))
                        <button type="button" class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#pic{{Auth::user()->vprofile->id}}">
                            Remove
                        </button>
                        @endif
                        
                        
                        <!-- Modal -->
                        <div class="modal fade" id="pic{{Auth::user()->vprofile->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Profile Picture</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                Your profile picture will be removed. Are you sure?
                                </div>
                                <div class="modal-footer">
                                <form action="{{route('vpic.delete')}}" method="POST">@csrf
                                    <input type="hidden" name="id" value="{{Auth::user()->vprofile->id}}">
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- End Button trigger modal -->
                    </div>
                </div> 
            <br>          
            <br>
            <div class="card">
                <div class="card-header d-inline-block text-dark font-weight-bold font-size: 12px; mb-0">About me (preview)</div>
                <div class="card-body">

                @if(empty(Auth::user()->vprofile->profile_pic))
                    <p style="color: rgb(236, 32, 32); font-weight: bold; font-size: 18px;">Please upload your profile picture</p>
                @endif
               
                <p><strong>Member since:</strong> &nbsp; &nbsp; {{date('F d Y',strtotime(Auth::user()->created_at))}}</p>
                <p><strong>Name:</strong> &nbsp; &nbsp; {{Auth::user()->name}}</p>
                <p><strong>Gender:</strong> &nbsp; &nbsp; {{Auth::user()->vprofile->gender}}</p>
                <p><strong>Date of Birth:</strong> &nbsp; &nbsp; {{Auth::user()->vprofile->dob}}</p>
                <p><strong>Email:</strong> &nbsp; &nbsp; {{Auth::user()->email}}</p>
                <p><strong>Phone:</strong> &nbsp; &nbsp; {{Auth::user()->vprofile->phone_number}}</p>
                <p><strong>Address:</strong> &nbsp; &nbsp; {{Auth::user()->vprofile->address_line1}},
                {{Auth::user()->vprofile->address_line2}}<br>
                {{Auth::user()->vprofile->city}},&nbsp;{{Auth::user()->vprofile->state}},
                {{Auth::user()->vprofile->country}}</p>
                <p>Pincode:&nbsp; &nbsp; {{Auth::user()->vprofile->pincode}}</p>
                <p><strong>Qualification:</strong><br>{{Auth::user()->vprofile->qualification}}</p>            
                <p><strong>Industry:</strong><br>{{Auth::user()->vprofile->industry}}</p>              
                <p><strong>Designation:</strong><br>{{Auth::user()->vprofile->designation}}</p>
            </div>
            </div>
            <br>
 
        </div>

        <div class="col-md-9 px-4">

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            
            @endif
            
            <div class="card">
                <div class="card-header d-inline-block h5 text-dark font-weight-bold mb-0">Primary Information</div>
                
                <form  id="frmParameter" action="{{route('volunteer.store')}}" method="POST">@csrf
                    <div class="card-body">


                    <div class="form-group required">
                        <label for=""  class="control-label h6">Phone number</label>
                        <input type="text" class="form-control" name="phone" value="{{Auth::user()->vprofile->phone?Auth::user()->vprofile->phone:old("phone")}}">
                        @if($errors->has('phone'))
                            <div class="error" style="color: red;">{{$errors->first('phone')}}</div>
                        @endif
                                      
                    </div>

                    <div class="form-group required">
                        <label for="" class="control-label h6">Address Line 1</label>
                        <input type="text" class="form-control" name="address_line1" value="{{Auth::user()->vprofile->address_line1?Auth::user()->vprofile->address_line1:old("address_line1")}}">
                        @if($errors->has('address_line1'))
                         <div class="error" style="color: red;">{{$errors->first('address_line1')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="" class="h6">Address Line 2</label>
                        <input type="text" class="form-control" name="address_line2" value="{{Auth::user()->vprofile->address_line2?Auth::user()->vprofile->address_line2:old("address_line2")}}">
                        @if($errors->has('address_line2'))
                         <div class="error" style="color: red;">{{$errors->first('address_line2')}}</div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                        <div class="form-group required">
    
                            <label for="country" class="control-label h6">Select your country</label>
                            
                            <select name="country" id="country" class="form-control">
                                <option value="">Select Country</option>
                                @foreach($countries as $key => $value)
                                <option value="{{$key}}" {{Auth::user()->vprofile->country==$value?'selected':''}}>{{$value}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('country'))
                            <div class="error" style="color: red;">{{$errors->first('country')}}</div>
                            @endif
                                                    
                        </div>
                        </div>
                        <div class="col-md-4">                           
                                                        
                        <div class="form-group required">    
                              <label for="state" class="control-label h6">Select your state</label>                            
                            <select name="state" id="state" class="form-control">
                                <option value="">Select state</option>                            
                            </select>
                                
                            @if($errors->has('state'))
                            <div class="error" style="color: red;">{{$errors->first('state')}}</div>
                            @endif
                                                    
                        </div>
                    </div>
                    <div class="col-md-4">
                            
                        <div class="form-group required">    
                            <label for="city" class="control-label h6">Select your city</label>                            
                            <select name="city" id="city" class="form-control">
                                <option value="">Select City</option>
                            </select>
                            @if($errors->has('city'))
                            <div class="error" style="color: red;">{{$errors->first('city')}}</div>
                            @endif
                                                    
                        </div>
    
                    </div>
                </div>
                        

                    <div class="form-group required">
                        <label for="pincode" class="control-label h6">{{ __('Pincode') }}</label>
                        
                            <input type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode"  value="{{Auth::user()->vprofile->pincode?Auth::user()->vprofile->pincode:old("pincode")}}">
                            @error('pincode')
                            <span class="invalid-feedback" role="alert">
                            <strong>Please enter valid 6 digit pincode</strong>
                            </span>
                            @enderror
                        
                    </div>

                    {{--<div class="form-group required">
                        <label for=""  class="control-label h6">Qualification</label>
                        <input type="text" class="form-control" name="qualification" value="{{Auth::user()->vprofile->qualification?Auth::user()->vprofile->qualification:old("qualification")}}">
                        @if($errors->has('qualification'))
                            <div class="error" style="color: red;">{{$errors->first('qualification')}}</div>
                        @endif
                                      
                    </div>--}}

                    <div class="form-group required">
                        <label for="qualification" class="control-label">Highest Qualification</label>
                        <select class="form-control" name="qualification">
                            <option value="" {{Auth::user()->vprofile->qualification==''?'selected':''}}>Select</option>
                            <option value="Doctorate/PhD" {{Auth::user()->vprofile->qualification=='Doctorate/PhD'?'selected':''}}>Doctorate/PhD</option>
                            <option value="Masters/Post-Graduation" {{Auth::user()->vprofile->qualification=='Masters/Post-Graduation'?'selected':''}}>Masters/Post-Graduation</option>
                            <option value="Graduation/Diploma" {{Auth::user()->vprofile->qualification=='Graduation/Diploma'?'selected':''}}>Graduation/Diploma</option>
                            <option value="12th" {{Auth::user()->vprofile->qualification=='12th'?'selected':''}}>12th</option>
                            <option value="10th" {{Auth::user()->vprofile->qualification=='10th'?'selected':''}}>10th</option>
                            <option value="Below 10th" {{Auth::user()->vprofile->qualification=='Below 10th'?'selected':''}}>Below 10th</option>
                           
                        </select>
                        @if($errors->has('qualification'))
                        <div class="error" style="color: red;">{{$errors->first('qualification')}}</div>
                        @endif
                    </div>
                    
                   

                    <div class="form-group">

                        <label for="designation" class="h6">Designation</label>
                        
                        <input class="form-control" value="{{Auth::user()->vprofile->designation?Auth::user()->vprofile->designation:old("designation")}}" name="designation" list="designation">
                            <datalist id="designation">
                                @foreach($designation as $d)
                                <option value="{{$d}}">
                                @endforeach
                            </datalist>
                        @if($errors->has('designation'))
                        <div class="error" style="color: red;">{{$errors->first('designation')}}</div>
                        @endif
                
                    </div>



                    <div class="form-group">
                        <label for="industry" class="h6">Industry</label>
                        <input class="form-control" value="{{Auth::user()->vprofile->industry?Auth::user()->vprofile->industry:old("industry")}}"  name="industry" list="industry">
                            <datalist id="industry">
                                @foreach($industry as $ind)
                                <option value="{{$ind}}">
                                @endforeach
                            </datalist>
                            @if($errors->has('industry'))
                            <div class="error" style="color: red;">{{$errors->first('industry')}}</div>
                           @endif
                        
                    </div>

                    

                    <div class="form-group">
                        <button class="btn btn-info" type="submit">Edit & Update</button>
                    </div>
                </div>
        
            </form>

        </div>
        <br>
        <div class="card mb-0">
            <div class="card-header">
                <a class="card-title">
                   <h5 class="d-inline-block h5 text-dark font-weight-bold mb-0">Skills <span style="color: red; font-weight: bold;"><small> [Top 5 key skills] </small></span></h5>
                   <button type="button" class="btn btn-default float-right py-0 px-1" data-toggle="modal" data-target="#editskills{{$user->id}}">
                    <i class="far fa-edit text-success"></i> <span class="text-success h6">Edit</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary float-right  py-0 mr-1 px-1" data-toggle="modal" data-target="#addskills{{$user->id}}">
                        <i class="far fa-edit text-primary"></i> <span class="text-primary h6">Add New</span>
                       </button>
                </a>
            </div>
            <div class="card-body">
              @foreach($user->skills as $skill)
               <button type="button" class="btn btn-sm btn-warning mt-1"><b>{{$skill->skill}}</b></button>
              @endforeach

            </div>

            <!-- Edit Skills Modal -->
            <div class="modal fade" id="editskills{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <form action="/profile/skills/edit" method="post">@csrf
                 <div class="modal-dialog modal-lg" role="document">
                   <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Edit Skills</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                         <div class="modal-body editskillsbody">
                          <select class="form-control selectedskills" multiple="multiple" placeholder="Select State" name="skills[]">
                             <option></option>
                             @foreach($skills as $skill)
                               <option value="{{$skill->id}}">{{$skill->skill}}</option>
                             @endforeach
                         </select>
               
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Save changes</button>
                           </div>
                       </div>
                   </div>
                   </form>	
                   </div>

            <!-- Add Skills Modal -->
            <div id="addskills{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <form action="/profile/skills/store" method="post">@csrf
                 <div class="modal-dialog modal-lg" role="document">
                   <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Add Skills</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                         <div id="myModalABCD" class="modal-body addskillsbody">
                         
                           <div class="form-group col-xs-12">
                                                                 
                               <select class="form-control select2" multiple="multiple" placeholder="Select Skill" name="skills[]">
                                 <option></option>
                                 @foreach($skills as $skill)
                                   <option value="{{$skill->id}}">{{$skill->skill}}</option>
                                 @endforeach
                               </select>
                           </div>
               
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Save changes</button>
                           </div>
                       </div>
                   </div>
                   </form>	
                   </div>
        </div>
</div>

</div>
        </div>

        <br>
        <br>
 
@endsection

@section('jsplugins')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
 
<script type="text/javascript">

    $(document).ready(function(){

        var coun_id = @json($coun_id);
        var s_id = @json($s_id);
        var c_id = @json($c_id);


                if(coun_id){
                    $.ajax({
                        
                        url: '/user/location/getStates/'+coun_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            
                            $('select[name="state"]').empty();
                            $.each(data, function(key, value){

                                if(key==s_id){
                                $('select[name="state"]').append('<option value="'+key+'" selected>'+value+'</option>');}
                                else{                                
                                $('select[name="state"]').append('<option value="'+key+'">'+value+'</option>');}                             

                            });
                            
                        }
                        
                    });

                }

            
                if(s_id){
                     $.ajax({
                        
                        url: '/user/location/getCities/'+s_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            
                            $('select[name="city"]').empty();
                            $.each(data, function(key, value){
                                
                                if(key==c_id){
                                $('select[name="city"]').append('<option value="'+key+'" selected>'+value+'</option>');}
                                else{ 
                                $('select[name="city"]').append('<option value="'+key+'">'+value+'</option>');}
                            });
                            
                        }
                        
                    });

                }

            $('select[name="country"]').on('change', function(){
 
                var country_id = $(this).val();
                if(country_id){
                    
                    $.ajax({
                        
                        url: '/user/location/getStates/'+country_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            
                            $('select[name="state"]').empty();
                            $.each(data, function(key, value){
                                
                                $('select[name="state"]').append('<option value="'+key+'">'+value+'</option>');
                            });
                            
                        }
                        
                    });

                }
                
                else{
                    
                    $('select[name="state"]').empty();
                }
                
            });
                
                $('select[name="state"]').on('change', function(){
                
                var state_id = $(this).val();
                if(state_id){
                    
                    $.ajax({
                        
                        url: '/user/location/getCities/'+state_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            
                            $('select[name="city"]').empty();
                            $.each(data, function(key, value){
                                
                                $('select[name="city"]').append('<option value="'+key+'">'+value+'</option>');
                            });
                            
                        }
                        
                    });

                }
                
                else{
                    
                    $('select[name="city"]').empty();
                }
                
                //console.log('LISTENING')
                
            });
            

        $('.select2').css('width','100%');
        $('.selectedskills').css('width','100%');
        $('.select2').select2({
          //width: 'resolve', 
          placeholder: "Please select Skills",
          allowClear: true,

        });

        $('.selectedskills').select2().val({{ json_encode($user->skills()->allRelatedIds()) }}).trigger('change');
    });
    </script>
@endsection