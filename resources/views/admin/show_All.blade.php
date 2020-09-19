@extends('layouts.main')
@section('content')

{{--<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Our Blog</h1>
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
          <u>Our Blog</u></h1>
			  </div>
		  </div>
	</div>
  </div>


<br>
<br>

        <div class="container">
       
        <div class="row">
       
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
        <table class="table table-striped">
        <thead>
        <tr>
              <th scope="col">Image</th>
              <th scope="col">Title</th>
              <th scope="col">Content</th>
              <th scope="col">Posted</th>
              

        </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
              <td><img src="{{asset('storage/'.$post->image)}}" width="80"></td>
              <td><a href="{{route('post.show',[$post->id,$post->slug])}}" target="_blank" >{{$post->title}}</a></td>
              <td>{{str_limit($post->content,20)}}</td>
              <td>{{$post->created_at->diffForHumans()}}</td>
            </tr>
            @endforeach
           
        </tbody>
        </table>
        {{$posts->links()}}

     </div>
    </div>
    </div>
    </div>
</div>


@endsection