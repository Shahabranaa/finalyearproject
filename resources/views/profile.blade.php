@extends('layouts.app')

@section('content')
    @include('menunav')

    <div class="container-fluid main-fluid-cainter">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                        @if($user == Auth::user())
                            <a href="#" class="fa fa-pencil-square-o editButton"> Edit</a>
                        @endif
                    @if($user->profile->picture)
                       <img  class="img-responsive profile-image " width="150" height="150" src="http://localhost:8000/storage/{{$user->profile->picture}}" alt="">
                    @else
                     <img  class="img-responsive profile-image " width="150" height="150" src="https://cdn3.iconfinder.com/data/icons/rcons-user-action/32/boy-512.png" alt="">
                    @endif

                        <strong class="userName">{{$user->name}}</strong>
                    <hr class="line">

                    <div>
                        <ul class="userstatsUl ">
                         @if(isset($user->profile))
                                <li class="fa fa-map-marker fa-1x userstatsLi"> <span class="from">From</span> <strong class="area">{{$user->profile->area}}</strong></li>
                         @endif
                            <li class="fa fa-user fa-1x userstatsLi"> <span class="from">Member </span> <strong class="area">{{date('M Y', $user->created_at->timestamp)}}</strong></li>
                            <li class="fa fa-check-circle fa-1x userstatsLi" > <span class="from">Nadra verify </span> <strong class="area">{{date('M Y', $user->created_at->timestamp)}}</strong></li>
                        </ul>
                        @if(isset($user->profile))
                            <a href="" class=""> <h1 class="confirm-order btn btn-default callNOw">Call {{$user->profile->phone}}</h1></a>
                        @endif
                    </div>
                </div>

                <div class="panel panel-default">
                    @if(isset($user->profile))
                        <h3 class="description"> Description</h3>
                        <section>
                            <p>{{$user->profile->bio}}</p>
                        </section>
                        <hr class="line">

                        <h3 class="language">Language</h3>
                        @foreach( $user->profile->language_profiles as $lang )
                            <ul class="languageUL">
                                <?php
                                $languages = App\Language::where('id',$lang->language_id)->first()
                                ?>
                                <li style="list-style: none">{{ucfirst($languages->language)}}</li>
                            </ul>
                        @endforeach

                        <hr class="line">

                        <h3 class="skill">Skills</h3>

                    @foreach( $user->profile->profile_skills as $skill )

                            <ul class="skillUl">
                                <?php
                                $skills = App\Skill::where('id',$skill->skill_id)->first()
                                ?>
                                <li style="list-style: none">{{ucfirst($skills->skill)}}</li>
                            </ul>
                    @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-8 ">
                <div class="panel panel-default ">
                    <strong class="paneltitle">{{$user->name}}'s Gigs</strong>
                </div>
                @if(isset($user->profile))
                    @foreach( $user->profile->gigs as $key=>$gig )
                            <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 gigbox " id="gig{{$key}}">
                                <div class="panel panel-default"  style="height: 320px">
                                    @if($gig->profile->user == Auth::user())
                                        <button data-id="{{$gig->id }}" data-token="{{csrf_token() }}" data-ok="{{$key}}" data-profile="{{$user->profile->id}}" class=" deleteGig fa fa-trash-o gig-fa-button "> <span class="gig-fa-text">Delete Gig</span></button>


                                        {{--<a href="{{route('deletegig',['gig_id'=>$gig->id])}}" class="fa fa-trash-o gig-fa-button "> <span class="gig-fa-text">Delete Gig</span></a>--}}
                                        <a href="{{route('editgig',['gig_id'=>$gig->id])}}" class="fa fa-pencil-square-o gig-fa-button "> <span class="gig-fa-text">Edit Gig</span></a>
                                    @endif

                                    <img src="http://localhost:8000/storage/{{$gig->image}}"  width="100%" height="160"  alt="">
                                    <ul class="skillUl">
                                        <li class="gigtitle" style="list-style: none"><a  href="{{route('gig',['gig_id'=>$gig->id, 'gig_title'=>$gig->gigtitle])}}"> I will  {{$gig->gigtitle}}</a></li>
                                        <a href="{{route('gig',['gig_id'=>$gig->id, 'gig_title'=>$gig->gigtitle])}}" class="startingFrom">Starting From <span class="price"> Rs {{$gig->price}}</span></a>
                                    </ul>
                                </div>

                            </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

<script>

    $(".deleteGig").click(function(){
        var gig_id = $(this).data("id");
//        var name = $(this).data("ok");
        var user_id = $(this).data("profile");

        if(confirm("Press a button!")){

            var token = $(this).data("token");
            $.ajax(
                {
                    url: "http://localhost:8000/deletegig/" + gig_id,
                    type: 'DELETE',
//                  dataType: "JSON",
                    data: {
//                        "id": gig_id,
                        "_method": "*",
                        "_token": token
                    },
                    success: function () {
                        console.log("it not Work");
//                        $('#gig' + name).empty();
                        $( "body" ).load( "http://localhost:8000/profile/" + user_id );
                    }
                }
            );

            console.log("it nots Work");

        }
    });
</script>

@endsection