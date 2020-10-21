<section class="ftco-section">
  <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading"><a href="{{route('post.show_All')}}">Our Blog</a></span>
         
          <h2><span>Recent</span> Blogs</h2>
          <span><a href="{{route('post.show_All')}}">
            Click here to read all blogs!
          </a></span>
        </div>
      </div>
    <div class="row d-flex">

      
      @foreach($posts as $post)
        <div class="col-md-3 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="{{route('post.show',[$post->id,$post->slug])}}"  class="block-20">
              <img src="{{asset('storage/'.$post->image)}}" alt="" class="img-fluid">
            </a>

            <div class="text mt-3">
              <div class="meta mb-2">
                <div>{{$post->created_at->diffForHumans()}} &bullet; By <a href="#">Admin</a></div>
             
              </div>
              <h3 class="heading"><a href="{{route('post.show',[$post->id,$post->slug])}}">{{$post->title}}</a></h3>
            <p>{{str_limit($post->content,50)}}</p>
            </div>
          </div>
        </div>
        @endforeach
      
      
    </div>
    {{--{{$posts->links()}}--}}
  </div>
</section>