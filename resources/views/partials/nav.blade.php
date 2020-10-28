<!--<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ftco_navbar ftco-navbar-light" id="ftco-navbar">-->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">

    <a href="/" class="navbar-brand"><img src="{{asset('HomeImages\Logo.jpeg')}}" alt="" width="200" height="80" style="opacity: 1;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
        {{--@include('inc.messages')--}}
        @if(session('error'))
        <div class="alert alert-danger text-center text-uppercase">
            <h3><strong>
              <i class="fa fa-exclamation-circle" aria-hidden="true"></i>&emsp;&emsp;
              {{session('error')}}</strong></h3>
        </div>
        @endif
      <ul class="navbar-nav ml-auto">
       
        @guest
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Job Seeker') }}</a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link" href="{{ route('employer.register') }}">{{ __('Employer') }}</a>
            </li>           

            <li class="nav-item">
                <a class="nav-link" href="{{ route('volunteer.register') }}">{{ __('Be a Volunteer') }}</a>
            </li>


            {{--<li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    
                   Mentor
        
                    <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('volunteer.register') }}">
                            <strong>{{ __('Mentor Support') }}</strong>
                        </a>                 

                        <a class="dropdown-item" href="{{ route('jvolunteer.register') }}"
                        >
                        <strong>{{ __('Mentor (Job-Search Support)') }}</strong>
                        </a>
                        
                </div>
            </li>--}}
            

            <li class="nav-item">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#ophLogin">
                <strong>LOGIN</strong>
                </button>
                <!--exampleModal-->
            </li>
        @else

            <li class="nav-item"><a href="{{route('company')}}" class="nav-link" >Companies</a></li>

            @if(Auth::user()->user_type=='employer')

            <li class="nav-item"><a href="{{route('my.job')}}" class="nav-link">Dashboard</a></li>
            <li class="nav-item"><a href="{{route('seeker.index')}}" class="nav-link">
                <i class="fa fa-users" aria-hidden="true"></i> Job-Seekers</a></li>
            <li class="nav-item"><a href="{{route('job.create')}}" class="nav-link">Post a job</a></li>

            @elseif(Auth::user()->user_type=='seeker')
                    <li class="nav-item"><a href="{{route('user.dashboard')}}" class="nav-link">Dashboard</a></li>
                    <li class="nav-item"><a href="{{route('user.saved')}}" class="nav-link">
                        <i class="fa fa-tag" aria-hidden="true"></i>Saved-Jobs</a></li>
                    <li class="nav-item"><a href="{{route('my.messages')}}" class="nav-link">Inbox</a></li>

            @elseif(Auth::user()->user_type=='volunteer')
            <li class="nav-item"><a href="{{route('vseeker.index')}}" class="nav-link">Dashboard</a></li>
            <li class="nav-item"><a href="{{route('my.messages')}}" class="nav-link">
                <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Inbox</a></li>            

            @elseif(Auth::user()->user_type=='admin')  
            <li class="nav-item"><a href="/dashboard" class="nav-link">Dashboard</a></li>

            @endif
            
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    
                                                    
                    @if(Auth::user()->user_type=='employer')
                    {{Auth::user()->company->cname}}                        
                    
                    @elseif(Auth::user()->user_type=='seeker')
                    {{Auth::user()->name}}

                    @elseif(Auth::user()->user_type=='volunteer')
                    {{Auth::user()->name}}                   

                    @elseif(Auth::user()->user_type=='admin')   
                            {{Auth::user()->name}}  
                    @endif
        
                    <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                
                    @if(Auth::user()->user_type=='employer')

                        <a class="dropdown-item" href="{{route('company.index',[Auth::user()->company->id,Auth::user()->company->slug])}}"
                        >
                            {{ __('My Company') }}
                        </a>                  
                    
                        
                    @elseif(Auth::user()->user_type=='seeker')

                        <a class="dropdown-item" href="{{route('user.show',[Auth::user()->id])}}"
                        >
                            {{ __('Profile') }}
                        </a>

                        @elseif(Auth::user()->user_type=='volunteer')

                        <a class="dropdown-item" href="{{route('volunteer.show',[Auth::user()->id])}}"
                        >
                            {{ __('Profile') }}
                        </a>                      

                        @elseif(Auth::user()->user_type=='admin')

                        <a class="dropdown-item" href="/dashboard"
                        >
                            {{ __('Dashboard') }}
                        </a>
                        
                    @endif

                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </div>
            </li>
        @endguest

      </ul>
    </div>

  </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="ophLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-white bg-dark" id="exampleModalLabel"><strong>&emsp;LOGIN&emsp;</strong></h5>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <button type="submit" class="btn btn-success">
                                    {{ __('LOGIN') }}
        </button>
      </form>

      </div>
    </div>
  </div>
</div>