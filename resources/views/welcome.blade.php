@extends('layouts.app')
@section('content')
    @include('menunav')

    <div class="container">
        <div class="row">
            @foreach( $gigs as $key=>$gig )

                <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12 gigbox ">
                    <div class="panel panel-default"  id="panel{{$key}}" style="height: 285px">

                        <p id="name-review{{$key}}" style="display: none; margin-bottom: 0">by <a href="{{route('profile',['user_id'=>$gig->profile->user->name])}}">{{$gig->profile->user->name}}</a>
                            <span style="display: none">
                                {{$avgrating = \App\Review::where('gig_id',$gig->id)->avg('rating')}}
                                {{$ratingCount = \App\Review::where('gig_id',$gig->id)->count()}}
                            </span>
                            <span style="float: right">
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star user-review-star showstar{{ ($i <= $avgrating) ? '' : '-empty'}}"> </span>
                                @endfor
                               <span class="review-count">({{$ratingCount}})</span>
                            </span>
                        </p>

                        <div  id="imgtitile{{$key}}"  onmouseover="changesize('imgtitile{{$key}}','name-review{{$key}}','panel{{$key}}')" style="margin-bottom: 20px;">
                            <a href="{{route('gig',['gig_id'=>$gig->id, 'gig_title'=>$gig->gigtitle])}}"><img src="http://localhost:8000/storage/{{$gig->image}}" id="img" width="100%"  height="160"  alt=""></a>
                            <ul class="skillUl">
                                <li class="gigtitle" style="list-style: none"><a  href="{{route('gig',['gig_id'=>$gig->id, 'gig_title'=>$gig->gigtitle])}}"> I will  {{$gig->gigtitle}}</a></li>
                            </ul>
                        </div>
                        <ul class="skillUl">
                            <a class="startingFrom" href="{{route('gig',['gig_id'=>$gig->id, 'gig_title'=>$gig->gigtitle])}}"><span> <small> Starting From</small></span> <Span class="price"> Rs {{$gig->price}}</Span></a>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function changesize(imgtitile, namereview,div) {
            document.getElementById(imgtitile).style.marginTop = "25px";
            document.getElementById(imgtitile).style.marginBottom = "0px";
            document.getElementById(namereview).style.display = "block";
            document.getElementById(namereview).style.marginBottom = "-15px";

            document.getElementById(div).onmouseout =function () {
                document.getElementById(imgtitile).style.width = "100%";
                document.getElementById(imgtitile).style.marginTop = "0px";
                document.getElementById(namereview).style.display = "none";
            }
        }

    </script>

    {{--
//        function getvalue() {
//            xmlhttp = new XMLHttpRequest();
//            var url = "create-gig"
//            xmlhttp.onreadystatechange =
//                function () {
//                    if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
//                        document.getElementById('umar').innerHTML = xmlhttp.responseText;
//                    }else {
//                        document.getElementById('umar').innerHTML = "< error <>";
//
//                    }
//                }
//            xmlhttp.open("GET",url,true);
//            xmlhttp.send();

//        or THis Method of javscript
//            var url = "create-profile"
//            $.ajax({url: url, success: function(umar){
//                $("#umar").html(umar);
//            }});

--}}






    {{--<div id="umar">--}}

    {{--</div>--}}
    {{--<br>--}}
    {{--<input type="button" value="button" onclick="getvalue()">--}}

@endsection
