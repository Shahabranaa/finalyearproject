@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <img  class="img-responsive profile-image " width="150" height="150" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" alt="">
                    <h1> {{$user->name}} </h1>
                    <h2> {{$user->profile->bio}}</h2>
                </div>
            </div>
        </div>
    </div>





 @endsection