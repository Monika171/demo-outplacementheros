@extends('layouts.main')

@section('select2css')
<style>
.holder {
  background:rgb(255, 255, 255);
  padding:0.3rem;
  overflow: hidden;

}

.edit{
  
  float:left;
  
  
  margin-left:-305%;


}
</style>
@endsection


@section('content')

{{--<div class="hero-wrap" style="height: 300px; background: #038cfc;"> 
 <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 300px" data-scrollax-parent="true">
            <div class="col-md-9 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="{{route('company')}}">Companies <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                <h1  style="font-size: 30px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1 }">{{$company->cname}}</h1>
            </div>
            <div class="col-md-3 ftco-animate text-center text-md-right mb-5" data-scrollax=" properties: { translateY: '70%' }">
               @if(Auth::check()&&Auth::user()->id==$company->user_id)               

                  <a class="btn edit btn-sm" style="background:#038cfc;font-size:15px;color:white;" href="{{route('company.view')}}" role="button">Edit Details</a>

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
                  {{$company->cname}}</h1>
            </div>
            <div class="col-md-3 ftco-animate text-center text-md-right mb-5" data-scrollax=" properties: { translateY: '70%' }">
               @if(Auth::check()&&Auth::user()->id==$company->user_id)                 

                  <a class="btn btn-sm" style="background:#0c127d; font-size:18px; color:white;" href="{{route('company.view')}}" role="button">Edit Details</a>

               @endif
            </div>
        </div>
  </div>
</div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">

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
          
          <div class="col-md-12 mb-5 ftco-animate">
            @if(empty($company->cover_photo))
          <img src="{{asset('cover/work.jpg')}}" style="width:100%;">
          @else
          <img src="{{asset('uploads/coverphoto')}}/{{$company->cover_photo}}" style="width: 100%;">
          @endif


          </div>
        </div>
     

        <div class="row">
          
            <div class="col-md-4  px-4 sidebar ftco-animate">
                
                <div class="blog-entry align-self-stretch">
				          @if(empty($company->logo))
                  <img width="100" src="{{asset('profile_pic/logo.jpg')}}">
                  @else
                  <img width="100" src="{{asset('uploads/logo')}}/{{$company->logo}}">
                  @endif
                      
                        <div class="text mt-3">
                          <div class="meta mb-2">
                            <div>Member since:</strong> &nbsp; &nbsp; {{date('F d Y',strtotime($company->user->created_at))}}</div> 
                          
						            	</div>


                        <h3 class="heading"><strong>Our slogan:</strong>&nbsp; &nbsp; {{$company->slogan}}</h3>
                        <h3 class="heading"><strong>LinkedIn:</strong>&nbsp; &nbsp; <a href="{{$company->linkedin}}"> {{$company->linkedin}}</a></h3>
                        <h3 class="heading"><strong>Facebook:</strong>&nbsp; &nbsp;<a href="{{$company->facebook}}"> {{$company->facebook}}</a></h3>
                        <h3 class="heading"><strong>Twitter:</strong>&nbsp; &nbsp; <a href="{{$company->twitter}}"> {{$company->twitter}}</a></h3>
                         
                        @if(empty($company->logo)&&Auth::check()&&Auth::user()->id==$company->user_id)
                        <p style="color: rgb(236, 32, 32); font-weight: bold; font-size: 18px;">Please upload company logo</p>
                        @endif
                      @if(empty($company->cover_photo)&&Auth::check()&&Auth::user()->id==$company->user_id)
                            <p style="color: rgb(236, 32, 32); font-weight: bold; font-size: 18px;">Please upload company banner image</p>
                      @endif
                      
                    </div>
                    </div>
                  
            </div>

            <div class="col-md-8 px-4 ftco-animate">
            
                    <h5 class="mb-2 mt-2">Description:</h5>
                    <p>{{$company->description}}</p>

                    <h5 class="mb-2 mt-2">Address:</h5>
                    <p>{{$company->address_line1}}<br>
                                {{$company->address_line2}}<br>
                                {{$company->city}}<br>&nbsp; &nbsp;{{$company->state}}
                                &nbsp;&nbsp;{{$company->country}} &nbsp;<br>
                                Pincode:&nbsp; {{$company->pincode}}</p>
                    
                    <div class="row">
                      <div class="col-md-6 ftco-animate">

                        <h5 class="mb-2 mt-2">Email:</h5>
                        <p> {{$company->user->email}}</p>

                      </div>
                      <div class="col-md-6 ftco-animate">

                        <h5 class="mb-2 mt-2">Phone:</h5>
                        <p>{{$company->phone}}</p>

                      </div>
                    </div>

                    <h5 class="mb-2 mt-2">Website:</h5>
                    <p><a href="{{$company->website}}"> {{$company->website}}</a></p>

                  <!--<div class="tag-widget post-tag-container mb-5 mt-5">
                    <div class="tagcloud">
                      <a href="#" class="tag-cloud-link">Life</a>
                      <a href="#" class="tag-cloud-link">Sport</a>
                      <a href="#" class="tag-cloud-link">Tech</a>
                      <a href="#" class="tag-cloud-link">Travel</a>
                    </div>
                  </div>-->
            </div>
        </div>
    </div>
</section>

