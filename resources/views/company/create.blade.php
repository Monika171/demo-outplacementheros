@extends('layouts.main')

@section('select2css')
<style>

.holder {
  background:rgb(255, 255, 255);
  padding:0.5rem;
  overflow: hidden;
}


.form-group.required .control-label:after {
    content:"*";
    color:red;
  }
</style>
@endsection


@section('content')

<div class="hero-wrap" style="height: 300px; background: #038cfc;">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 300px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1 style="font-size: 35px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                    <u>Edit Company Information</u></h1>
              </div>
          </div>
    </div>
</div>
<section class="ftco-section bg-light">
<div class="container">
    <div class="row"style="margin-top:-5%;">

        {{--<div class="col-md-12 my-0">
            @if(Auth::check()&&Auth::user()->id==$company->user_id)
            <div class="holder">
              <div class="news">                
                <p style="color: rgb(38, 6, 178); font-weight: bold; font-size: 26px;">
                 Please share open roles at Hello@OutplacementHeros.Org
                [Inconvenience is regretted]
                </p>
              </div>
            </div>
              @endif
          </div>--}}

        <div class="col-md-3  pr-4">
            @if(empty(Auth::user()->company->logo))
                    <img src="{{asset('profile_pic/logo.jpg')}}"style="width: 100%;">
            @else
                <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" style="width: 100%;">
            @endif
        <br><br>
        
            <div class="card">
                <div class="card-header d-inline-block text-dark font-weight-bold font-size: 12px; mb-0">Update logo</div>
                <div class="card-body">
                    <form action="{{route('company.logo')}}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="file" class="form-control" name="company_logo"><br>
                    <button class="btn btn-dark  btn-sm float-left" type="submit">Update</button>
                    @if($errors->has('company_logo'))
                    <div class="error" style="color: red;">{{$errors->first('company_logo')}}</div>
                    @endif
                </form>

                 <!-- Button trigger modal -->
                 @if(!empty(Auth::user()->company->logo))
                 <button type="button" class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#logo{{Auth::user()->company->id}}">
                     Remove
                 </button>
                 @endif
                 
                 
                 <!-- Modal -->
                 <div class="modal fade" id="logo{{Auth::user()->company->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Delete Logo</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                         </div>
                         <div class="modal-body">
                         Your company logo will be removed. Are you sure?
                         </div>
                         <div class="modal-footer">
                         <form action="{{route('elogo.delete')}}" method="POST">@csrf
                             <input type="hidden" name="id" value="{{Auth::user()->company->id}}">
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
        
            <div class="card">
                <div class="card-header d-inline-block text-dark font-weight-bold font-size: 12px; mb-0">Update Company Banner Image</div>
                <div class="card-body">
                    <form action="{{route('cover.photo')}}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="file" class="form-control" name="cover_photo"><br>
                    <button class="btn btn-dark  btn-sm float-left" type="submit">Update</button>
                    @if($errors->has('cover_photo'))
                    <div class="error" style="color: red;">{{$errors->first('cover_photo')}}</div>
                    @endif
                    </form>

                     <!-- Button trigger modal -->
                     @if(!empty(Auth::user()->company->cover_photo))
                     <button type="button" class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#cover{{Auth::user()->company->id}}">
                         Remove
                     </button>
                     @endif
                   
                     
                     
                     <!-- Modal -->
                     <div class="modal fade" id="cover{{Auth::user()->company->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Delete Banner Image</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                             </div>
                             <div class="modal-body">
                             Your company banner image will be removed. Are you sure?
                             </div>
                             <div class="modal-footer">
                             <form action="{{route('ecover.delete')}}" method="POST">@csrf
                                 <input type="hidden" name="id" value="{{Auth::user()->company->id}}">
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
        <div class="card">
            <div class="card-header d-inline-block text-dark font-weight-bold font-size: 12px; mb-0">About Company (preview)</div>
            <div class="card-body">
                @if(empty(Auth::user()->company->cover_photo))
                 <p style="color: rgb(236, 32, 32); font-weight: bold; font-size: 18px;">Please upload company banner image</p>
                @endif

                <p><strong>Member since:</strong> &nbsp; &nbsp; {{date('F d Y',strtotime(Auth::user()->created_at))}}</p>
                <p><strong>Company Name:</strong> &nbsp; &nbsp;{{Auth::user()->company->cname}}</p>
                <p><strong>Email:</strong> &nbsp; &nbsp; {{Auth::user()->email}}</p>
                <p><strong>Phone:</strong> &nbsp; &nbsp; {{Auth::user()->company->phone}}</p>
                <p><strong>Address:</strong> &nbsp; &nbsp; {{Auth::user()->company->address_line1}}
                    {{Auth::user()->company->address_line2}}<br>
                    {{Auth::user()->company->city}}&nbsp; &nbsp;{{Auth::user()->company->state}}
                    {{Auth::user()->company->country}} &nbsp;
                    Pincode:&nbsp; {{Auth::user()->company->pincode}}</p>
                <p><strong>Industry:</strong><br>{{Auth::user()->company->industry}}</p>
                <p><strong>Our slogan:</strong> &nbsp; &nbsp; {{Auth::user()->company->slogan}}</p>
                <p><strong>Description:</strong> &nbsp; &nbsp; {{Auth::user()->company->description}}</p>
                <p><strong>Website:</strong> &nbsp; &nbsp; <a href="{{Auth::user()->company->website}}"> {{Auth::user()->company->website}}</a></p>
                <p><strong>LinkedIn:</strong> &nbsp; &nbsp; <a href="{{Auth::user()->company->linkedin}}"> {{Auth::user()->company->linkedin}}</a></p>
                <p><strong>Facebook:</strong> &nbsp; &nbsp; <a href="{{Auth::user()->company->facebook}}"> {{Auth::user()->company->facebook}}</a></p>
                <p><strong>Twitter:</strong> &nbsp; &nbsp; <a href="{{Auth::user()->company->twitter}}"> {{Auth::user()->company->twitter}}</a></p>
                <p><strong>Company page:</strong> &nbsp; &nbsp;<a href="company/{{Auth::user()->company->slug}}">View</a></p>

                
         

            </div>
        </div>

        </div>

    <div class="col-md-9 pl-4">

        @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
        
        @endif
            
        <div class="card">
            <div class="card-header d-inline-block h5 text-dark font-weight-bold mb-0">Update Company Information</div>
            <form action="{{route('company.store')}}" method="POST">@csrf
                <div class="card-body">

                    <div class="row">
                    <div class="col-md-7">

                    <p><strong>Authority Name:</strong> &nbsp; &nbsp; {{Auth::user()->name}}</p>
                    
                <div class="form-group">

                    <label for="authority_designation"><strong>Authority Designation:</strong></label>
                    
                    <input class="form-control" value="{{Auth::user()->company->authority_designation?Auth::user()->company->authority_designation:old("authority_designation")}}" name="authority_designation" list="authority_designation">
                        <datalist id="authority_designation">
                            @foreach($authority_designation as $ad)
                            <option value="{{$ad}}">
                            @endforeach
                        </datalist>
                    @if($errors->has('authority_designation'))
                    <div class="error" style="color: red;">{{$errors->first('authority_designation')}}</div>
                    @endif
            
                </div>

                    </div></div>
                <hr>

                <div class="form-group required">
                    <label for="" class="control-label h6">Company Phone number:</label>
                    <input type="text" class="form-control" name="phone"  value="{{Auth::user()->company->phone?Auth::user()->company->phone:old("phone")}}" >
                
                    @if($errors->has('phone'))
                    <div class="error" style="color: red;">{{$errors->first('phone')}}</div>
                @endif
                
                
                </div>

                <div class="form-group required">
                    <label for="" class="control-label h6">Company Address Line 1</label>
                    <input type="text" class="form-control" name="address_line1" value="{{Auth::user()->company->address_line1?Auth::user()->company->address_line1:old("address_line1")}}">
                    @if($errors->has('address_line1'))
                     <div class="error" style="color: red;">{{$errors->first('address_line1')}}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="" class="h6">Address Line 2</label>
                    <input type="text" class="form-control" name="address_line2" value="{{Auth::user()->company->address_line2?Auth::user()->company->address_line2:old("address_line2")}}">
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
                            <option value="{{$key}}" {{Auth::user()->company->country==$value?'selected':''}}>{{$value}}</option>
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
                        
                            <input type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode"  value="{{Auth::user()->company->pincode?Auth::user()->company->pincode:old("pincode")}}">
                            @error('pincode')
                            <span class="invalid-feedback" role="alert">
                            <strong>Please enter valid 6 digit pincode</strong>
                            </span>
                            @enderror
                        
                    </div>

                    <div class="form-group">
                        <label for="industry" class="h6">Industry </label>
                        <input class="form-control"  value="{{Auth::user()->company->industry?Auth::user()->company->industry:old("industry")}}" name="industry" list="industry">
                            <datalist id="industry">
                                @foreach($industry as $ind)
                                <option value="{{$ind}}">
                                @endforeach
                            </datalist>
                            @if($errors->has('industry'))
                            <div class="error" style="color: red;">{{$errors->first('industry')}}</div>
                           @endif
                        
                    </div>

                    <div class="text-center bg-light">
                    <p style="color:red">[Please provide full url links below (if any)]<br>
                        <small class="text-secondary">eg: https://www.yourwebsite.com/</small>
                    </p>
                    </div>

                    <div class="form-group">
                        <label for="" class="h6">Company Website</label>
                        <input type="text" class="form-control" name="website"  value="{{Auth::user()->company->website?Auth::user()->company->website:old("website")}}">
                    
                        @if($errors->has('website'))
                        <div class="error" style="color: red;">{{$errors->first('website')}}</div>
                    @endif
                    </div>

                    <div class="form-group">
                        <label for="" class="h6">LinkedIn</label>
                        <input type="text" class="form-control" name="linkedin"  value="{{Auth::user()->company->linkedin?Auth::user()->company->linkedin:old("linkedin")}}">
                    
                        @if($errors->has('linkedin'))
                        <div class="error" style="color: red;">{{$errors->first('linkedin')}}</div>
                    @endif
                    </div>

                    <div class="form-group">
                        <label for="" class="h6">Facebook</label>
                        <input type="text" class="form-control" name="facebook"  value="{{Auth::user()->company->facebook?Auth::user()->company->facebook:old("facebook")}}">
                    
                        @if($errors->has('facebook'))
                        <div class="error" style="color: red;">{{$errors->first('facebook')}}</div>
                    @endif
                    </div>

                    <div class="form-group">
                        <label for="" class="h6">Twitter</label>
                        <input type="text" class="form-control" name="twitter"  value="{{Auth::user()->company->twitter?Auth::user()->company->twitter:old("twitter")}}">
                    
                        @if($errors->has('twitter'))
                        <div class="error" style="color: red;">{{$errors->first('twitter')}}</div>
                    @endif
                    </div>



                    <div class="form-group">
                        <label for="" class="h6">Company Slogan</label>
                        <input type="text" class="form-control" name="slogan"  value="{{Auth::user()->company->slogan?Auth::user()->company->slogan:old("slogan")}}">
                        @if($errors->has('slogan'))
                        <div class="error" style="color: red;">{{$errors->first('slogan')}}</div>
                    @endif
                    
                    </div>
                    
                    <div class="form-group required">
                        <label for="" class="control-label h6">Company Description</label>
                        <textarea name="description" class="form-control" rows="6" cols="70" style="width:100"> {{Auth::user()->company->description?Auth::user()->company->description:old("description")}}</textarea>
                        @if($errors->has('description'))
                        <div class="error" style="color: red;">{{$errors->first('description')}}</div>
                    @endif                   
                    
                    </div>
                                 


                    <div class="form-group">
                        <button class="btn btn-dark" type="submit">Edit & Update</button>
                    </div>
                </div>
            </form>
        </div>
<br>
        <div class="card">
            <div class="card-header d-inline-block text-info font-weight-bold font-size: 12px; mb-0">Company Authority Details (preview):</div>     
                <div class="card-body">                      
                <p><strong>Authority Name:</strong> &nbsp; &nbsp; {{Auth::user()->name}}</p>
                <p><strong>Authority Designation:</strong><br>{{Auth::user()->company->authority_designation}}</p>
                </div>
            </div>
        </div>



    </div>
   
    </div>
</div>

<br>
<br>
</section>
@endsection

@section('jsplugins')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
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
            

    });
    </script>
@endsection
