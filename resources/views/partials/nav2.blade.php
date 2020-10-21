<!--<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ftco_navbar ftco-navbar-light" id="ftco-navbar">-->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
          <a  class="navbar-brand" href="/"><img src="{{asset('external/images/oph.png')}}" alt="" width="200" style="opacity: 0.9;"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
          </button>
      
          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              <!--<li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
              <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
              <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
              <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
              <li class="nav-item cta mr-md-2"><a href="new-post.html" class="nav-link">Post a Job</a></li>
              <li class="nav-item cta cta-colored"><a href="job-post.html" class="nav-link">Want a Job</a></li>
              <input type="submit" value="Search" class="form-control btn btn-primary">
              style="background-image: url(external/images/person_1.jpg)"
            <div class="user-img mb-4" style="background-image: url(external/images/person_1.jpg)">
            class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(external/images/bg_1.jpg);
            <a href="blog-single.html" class="block-20" style="background-image: url('external/images/image_3.jpg');">-->
      
              @if(!Auth::check())
                <li class="nav-item"><a href="/register" class="nav-link">For Job Seeker</a></li>
                <li class="nav-item">
                  <a href="{{route('employer.register')}}" class="nav-link">For Employer</a>
                
                </li>
                @else
                <li class="nav-item"><a href="/home" class="nav-link">Dashboard</li>
                @endif
                  <!--insert here-->
                <li class="nav-item"><a href="{{route('company')}}" class="nav-link">Companies</a></li>
                  
      
                <li>
                  @if(!Auth::check())
      
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    Login
                    </button>
                    @else
                    <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
      
                  @endif
                </li>
      
            </ul>
          </div>
        </div>
      </nav>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            
       <form method="POST" action="{{ route('login') }}">
                              @csrf
      
                              <div class="form-group row">
                                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
      
                                  <div class="col-md-6">
                                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
      
                                      @if ($errors->has('email'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
      
                              <div class="form-group row">
                                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
      
                                  <div class="col-md-6">
                                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
      
                                      @if ($errors->has('password'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
      
                              <div class="form-group row">
                                  <div class="col-md-6 offset-md-4">
                                      <div class="form-check">
                                          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
      
                                          <label class="form-check-label" for="remember">
                                              {{ __('Remember Me') }}
                                          </label>
                                      </div>
                                  </div>
                              </div>
      
                              <div class="form-group row mb-0">
                                  <div class="col-md-6 offset-md-4">
                                      
      
                                      @if (Route::has('password.request'))
                                          <a class="btn btn-link" href="{{ route('password.request') }}">
                                              {{ __('Forgot Your Password?') }}
                                          </a>
                                      @endif
                                  </div>
                              </div>
      
      
      
      
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">
                                          {{ __('Login') }}
              </button>
            </form>
      
            </div>
          </div>
        </div>
      </div>