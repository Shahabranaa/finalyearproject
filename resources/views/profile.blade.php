@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <img  class="img-responsive profile-image " width="150" height="150" src="{{Storage::disk('local')->get($user->profile->picture)}}" alt="">
                    <strong class="userName">{{$user->name}}</strong>
                    <hr class="line">

                    <div>
                        <ul class="userstatsUl ">
                            <li class="fa fa-map-marker fa-1x userstatsLi"> <span class="from">From</span> <strong class="area">{{$user->profile->area}}</strong></li>
                            <li class="fa fa-user fa-1x userstatsLi"> <span class="from">Member </span> <strong class="area">{{date('M Y', $user->created_at->timestamp)}}</strong></li>
                            <li class="fa fa-check-circle fa-1x userstatsLi" > <span class="from">Nadra verify </span> <strong class="area">{{date('M Y', $user->created_at->timestamp)}}</strong></li>
                        </ul>
                        <button class=" btn btn-success callButton "><a href="" style="color: whitesmoke"> Call    {{$user->profile->phone}}</a></button>
                    </div>
                </div>

                <div class="panel panel-default">

                    <h3 class="description"> Description</h3>
                    <section>
                        <p>{{$user->profile->bio}}</p>
                    </section>

                    <hr class="line">
                    <h3 class="Language">Language</h3>


                    @foreach( $user->profile->languages as $lang )
                            <h2>
                                <h3>{{$lang->language}}</h3>
                            </h2>
                            <h1>umar</h1>
                        @endforeach
                </div>
            </div>
        </div>
    </div>





 @endsection