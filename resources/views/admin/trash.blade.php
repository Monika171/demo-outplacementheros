@extends('layouts.main')
@section('content')

{{--<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Trash</h1>
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
          <u>Trash</u></h1>
			  </div>
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
          <div class="card">
            <div class="card-body">
        <table class="table table-striped">
        <thead>
        <tr>
              <th scope="col">Image</th>
              <th scope="col">Title</th>
              <th scope="col">Content</th>
              <th scope="col">Status</th>
              <th>Date</th>
              <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
              <td><img src="{{asset('storage/'.$post->image)}}" width="80"></td>
              <td>{{$post->title}}</td>
              <td>{{str_limit($post->content,20)}}</td>
              <td>
                @if($post->status=='0')
                   <a href="" class="badge badge-primary"> Draft</a>
                    @else
                    <a href="" class="badge badge-success">  Live</a>
                @endif
            </td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>
                  <a href="{{route('post.restore',[$post->id])}}"><button class="btn btn-success">Restore</button></a>


                 


              </td>
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

  </section>
@endsection