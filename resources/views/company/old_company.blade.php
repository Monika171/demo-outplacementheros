@extends('layouts.main')
@section('content')

<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>
                  <h1  style="font-size: 45px;"  class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Companies</h1>
              </div>
          </div>
    </div>
</div>



<div class="container mt-9">
	<div class="row">
        <!--<div class="card-deck">-->
            <div class="row course-set courses__row">
            @foreach($companies as $company)
            <!--<div class="col-md-3">card mb-3-->

                <!--<div class="card" style="width: 18rem;">-->
                    
                    <div class="col-md-4 p-4 mb-8 bg-white">
                            <article class="col-md-4 course-block course-block-lessons">
                                @if(empty($company->logo))
                                <img width="100" src="{{asset('profile_pic/logo.jpg')}}" class="card-img-top">

                                @else
                                <img width="100" src="{{asset('uploads/logo')}}/{{$company->logo}}"class="card-img-top">


                                @endif
                            <div>
                                <h5 class="card-title text-center">{{$company->cname}}</h5>
                        
                                <center><a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary btn-sm">View Company</a></center>
                            
                               
                            </div>
                            </article>
                    </div>
                        
                    
                      
                {{--<div class="col-sm-2" style="min-width: 18rem; max-width: 18rem;">
                        <div class="card">
                                @if(empty($company->logo))
                                <img width="100" src="{{asset('profile_pic/logo.jpg')}}"class="card-img-top">

                                @else
                                <img width="100" src="{{asset('uploads/logo')}}/{{$company->logo}}"class="card-img-top">


                                @endif
                            <div class="card-body">
                                <h5 class="card-title text-center">{{$company->cname}}</h5>
                        
                                <center><a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">View Company</a></center>
                            </div>
                        </div>

                </div>--}}
		    @endforeach
        </div>
	</div>

			{{$companies->links()}}

</div>
@endsection