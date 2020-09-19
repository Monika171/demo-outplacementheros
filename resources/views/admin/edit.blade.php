@extends('layouts.main')
@section('content')

{{--<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Edit Blog</h1>
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
					<u>Edit Blog</u></h1>
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
				<div class="card-header">
					Edit
				</div>
				<div class="card-body">

					<form action="{{route('post.update',[$post->id])}}" method="POST" enctype="multipart/form-data">@csrf
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"value="{{$post->title}}">
							  @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
						</div>
						<div class="form-group">
							<label>Content</label>
							<textarea name="content" rows="6" cols="80" style="width:100" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}">{{ ($post->content) }}</textarea>
							 @if ($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
						</div>
						<div class="form-group">
							<label>Image</label>
							<input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}">
							<img src="{{asset('storage/'.$post->image)}}" style="width: 100%;"> 
							
							 @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
						</div>
						<div class="form-group">
							<label>Status</label>
							<select name="status" class="form-control">
								<option value="0"{{$post->status=='0'?'selected':''}}>Draft</option>
								<option value="1"{{$post->status=='1'?'selected':''}}>Live</option>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success">Update</button>
						</div>
					</form>
				</div>

		</div>



	</div>

</div>
</section>
@endsection