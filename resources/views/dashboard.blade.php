@extends('layouts.app')
@section('content')
    <nav class="navbar navbar-default ns">
       <div class="container">
           <a href="{{route('dashboard')}}"> Dashborad</a>
           <a href="{{route('sellerorder')}}"> Selling</a>
           <a href="{{route('buyerorder')}}"> Buying</a>
       </div>
    </nav>


    <div class="container">
        <h1>Dashboard</h1>

       <div class=" panel panel-body">
         {{--Today Dashboard --}}
        <div class="row dashboard-row">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class=" panel  panel-title"  >
                    <p>Today Earning </p>
                    <h1>Rs {{$todayEarning}}</h1>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class=" panel  panel-title"  >
                    <p> Today Sale in Quaue</p>
                    <h1>{{$todayOrderQuaue}}</h1>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class=" panel  panel-title"  >
                    <p>Today Order Completed</p>
                    <h1>{{$todayOrderComplated}}</h1>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class=" panel  panel-title"  >
                    <p >Today Order Cancle</p>
                    <h1>{{$todayOrderCancle}}</h1>
                </div>
            </div>
        </div>

        {{--Monthly dashboard--}}
        <hr class="lined">
        <div class="row dashboard-row">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class=" panel  panel-title"  >
                    <p>{{date('M')}} Earning </p>
                    <h1>Rs {{$monthEarning}}</h1>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class=" panel  panel-title"  >
                    <p> {{date('M')}} Sale in Quaue</p>
                    <h1>{{$monthOrderQuaue}}</h1>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class=" panel  panel-title"  >
                    <p> {{date('M')}} Order Completed</p>
                    <h1>{{$monthOrderComplated}}</h1>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class=" panel  panel-title"  >
                    <p >{{date('M')}} Order Cancle</p>
                    <h1>{{$monthOrderCancle}}</h1>
                </div>
            </div>
        </div>
        <hr class="lined">

        {{--Lifetime dashboard--}}
        <div class="row dashboard-row">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class=" panel  panel-title"  >
                    <p>Life Time Earned </p>
                    <h1>Rs {{$totalEarning}}</h1>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class=" panel  panel-title"  >
                    <p> Total Sale in Quaue</p>
                    <h1>{{$totalOrderQuaue}}</h1>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class=" panel  panel-title"  >
                    <p> Total Order Completed</p>
                    <h1>{{$totalOrderComplated}}</h1>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class=" panel  panel-title"  >
                    <p> Total Order Cancle</p>
                    <h1>{{$totalOrderCancle}}</h1>
                </div>
            </div>
        </div>
       </div>
    </div>
@endsection