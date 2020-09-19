@extends('layouts.main')
@section('content')

<div class="hero-wrap" style="height: 300px; background:#038cfc;">
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 300px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>
                  <h1  style="font-size: 35px;"  class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                    <u>Companies</u></h1>
              </div>
          </div>
    </div>
</div>


    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row d-flex">
          @if(count($companies)>0)
		@foreach($companies as $company)
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <!--logo-->
              <a href="{{route('company.index',[$company->id,$company->slug])}}">

                @if(empty($company->logo))
                  <img width="100" src="{{asset('profile_pic/logo.jpg')}}" class="card-img-top">
                  @else
                  <img width="100" src="{{asset('uploads/logo')}}/{{$company->logo}}"class="card-img-top">
                @endif


                </a> 
              <div class="text mt-3">
                <a href="{{route('company.index',[$company->id,$company->slug])}}">
                    <h3 class="heading text-center">{{$company->cname}}</h3>
                </a>               

              </div>
            </div>
          </div>
 
		  
     @endforeach 

     @else

     <div class="col-md-12 text-center ftco-animate">
       <!--<span class="subheading">Registered Candidates</span>-->
       <h6 class="mt-5 mb-0">Companies are joining soon.</h6>
       <p class="mt-0 mb-5">Thank You.</p>
     </div>
   @endif
        </div>
<!--pagination here-->
                <div class="pagination center">  
                {{$companies->links()}}
                </div>
      </div>
    </section>
		
		@endsection