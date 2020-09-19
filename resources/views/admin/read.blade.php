@extends('layouts.main')
@section('content')

{{--<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$post->title}}</h1>
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
          <u>{{$post->title}}</u></h1>
			  </div>
		  </div>
	</div>
  </div>

<br>
<br>
   <div class="album text-muted">
     <div class="container">
       <div class="row" id="app">
          {{--<div class="title" style="margin-top: 20px;">
                <h2>{{$post->title}}</h2> 
          </div>--}}

      <img src="{{asset('storage/'.$post->image)}}" style="width: 100%;">

          <div class="col-lg-8">
            
            
            <div class="p-4 mb-8 bg-white">
              <!-- icon-book mr-3-->
              <h5 class="h5 text-black mb-3">Posted By:Admin &nbsp;<small>created on:{{date('d-m-Y',strtotime($post->created_at))}}</small></h5>
              <p> {{$post->content}}.</p>
           
              
            </div>
          
           

          </div>

          
        



     </div>
   </div>
@endsection
