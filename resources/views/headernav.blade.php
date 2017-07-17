

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
           <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->

            <div class="col-sm-8 col-md-8">
                <form class="navbar-form" action="{{route('search')}}" method="post" role="search">
                    {{csrf_field()}}
                    <div class="input-group">
                        <input type="text" class="form-control" style="width: 400px" placeholder="Search" name="search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li ><a  id="login" href="{{ url('#') }}">Login</a></li>
                    <li ><a id="signup" href="{{ url('/#') }}">Register</a></li>
                @else
                    @if(Auth::user()->profile->bio)
                    <li><a class="create-gig" href="{{ url('/create-gig') }}">Create Gig</a></li>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            @if(Auth::user()->profile)
                            <li><a href="{{ route('profile',['user_id'=>\Illuminate\Support\Facades\Auth::user()->id])}}">Profile</a></li>
                            @endif
                            @if(!Auth::user()->profile->bio)
                            <li><a href="{{ route('create-profile')}}">Become Seller</a></li>
                            @endif
                            <li><a href="{{ route('dashboard')}}">Dashboard</a></li>


                        </ul>
                    </li>

                @endif
            </ul>
        </div>
    </div>
</nav>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="container">
    <div class="modal fade " id="myModal"  role="dialog" >
        <div class="modal-dialog" style=" min-width: 30% ">
            <div class="modal-content">
                <div class="modal-body"  style="padding: 10% ;padding-top:0; " >
                    <div class="main-message">
                        <h5>Login to Public Services</h5>
                    </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                    </label>
                                    <a class="js-btn-forgotpw" href="{{ url('/password/reset') }}" style="float: right">
                                    Forgot Your Password?
                                    </a>
                                </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-default" style="width: 100%; background-color: black; color: white; margin-bottom:3%">Continue</button>
                        </div>
                    </form>
                    <div class="divi-new js-form-join-section" data-section="1"><span>OR</span></div>
                    <div align="center">
                        <div class="fb-login-button" onlogin="umar();" data-width="300" data-max-rows="3" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="true" ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="container">
    <div class="modal fade" id="signUpModal"  role="dialog" >
        <div class="modal-dialog" style=" min-width: 30% ">
            <div class="modal-content">
                <div class="modal-body"  style="padding: 10% ;padding-top:0; " >
                    <div class="main-message">
                        <h5>Join Publics Services</h5>
                    </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <input id="name" type="text" class="form-control" name="name" placeholder="Full Name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                             <input id="email" type="email" class="form-control" name="email" placeholder="Email " value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-default" style="width: 100%; background-color: black; color: white; margin-bottom:3%">Continue</button>
                        </div>
                    </form>
                    <div class="divi-new js-form-join-section" data-section="1"><span>OR</span></div>
                    <div align="center">
                        <div class="fb-login-button" onlogin="umar();" data-width="300" data-max-rows="3" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="true" ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

