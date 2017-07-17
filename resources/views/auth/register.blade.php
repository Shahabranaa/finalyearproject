
@extends('layouts.app')
@section('content')

<div class="container signup-container">
    <div class="row">
        <div class="col-md-7 col-md-offset-3">
            <div class="panel panel-body signup-panel">
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
@endsection

