@extends('layouts.main')
@section('content')

{{--<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">My Posts</h1>
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
          Welcome {{Auth::user()->name}}</h1>
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
              <td><a href="{{route('post.show',[$post->id,$post->slug])}}" target="_blank" >{{$post->title}}</a></td>
              <td>{{str_limit($post->content,20)}}</td>
              <td>
                @if($post->status=='0')
                   <a href="{{route('post.toggle',[$post->id])}}" class="badge badge-primary"> Draft</a>
                    @else
                    <a href="{{route('post.toggle',[$post->id])}}" class="badge badge-success">Live</a>
                @endif 
            </td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>
                  <a href="{{route('post.edit',[$post->id])}}"><button class="btn btn-primary">Edit</button></a>


                    <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$post->id}}">
  Delete
</button>

<!-- Modal -->
        <div class="modal fade" id="exampleModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete?
          </div>
          <form action="{{route('post.delete')}}" method="POST">@csrf
          <div class="modal-footer">
            <input type="hidden" name="id" value="{{$post->id}}">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">delete</button>
          </div>
      </form>
        </div>
        </div>
        </div>




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