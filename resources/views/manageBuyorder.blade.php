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
        <h1>Buying Manage</h1>
        <div class="panel panel-body">

            <ul class="tabs ">
                <li class="active" rel="tab1">Complete Order</li>
                <li rel="tab2">Pending Order</li>
                <li rel="tab3">Cancel Order</li>
            </ul>
            <div class="tab_container">
                <h1 class="d_active tab_drawer_heading" rel="tab1">Complete Order</h1>
                <div id="tab1" class="tab_content">
                    <table class="table table-hover ">
                        <thead>
                        <tr>
                            <th>Buyer</th>
                            <th>Gig</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Date</th>

                        </tr>
                        </thead>
                        @for($a=0; $a<sizeof($gigs); $a++)
                            <tbody>
                            <tr>
                                @if($totalOrder[$a]->status ==2)
                                    <td><a href="{{route('profilefinder',['user_id'=>$seller[$a]->id])}}">{{$seller[$a]->name}}</a></td>
                                    <td><a href="{{route('gig',['gig_id'=>$totalOrder[$a]->gig_id,'gig_title'=>$totalOrder[$a]->gig_title])}}">I will {{ $totalOrder[$a]->gig_title}}</a></td>
                                    <td>{{$totalOrder[$a]->gig_price}}</td>
                                    <td>Complete</td>
                                    <td>{{date('M d Y ', $totalOrder[$a]->updated_at->timestamp)}}</td>

                                @endif
                            </tr>
                            </tbody>
                        @endfor
                    </table>
                </div>
                <!-- #tab1 -->
                <h1 class="tab_drawer_heading" rel="tab2">Pending Order</h1>
                <div id="tab2" class="tab_content">
                    <table class="table table-hover ">
                        <thead>
                        <tr>
                            <th>Buyer</th>
                            <th>Gig</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Date</th>

                        </tr>
                        </thead>
                        @for($a=0; $a<sizeof($gigs); $a++)
                            <tbody>
                            <tr>
                                @if($totalOrder[$a]->status ==1)
                                    <td><a href="{{route('profilefinder',['user_id'=>$seller[$a]->id])}}">{{$seller[$a]->name}}</a></td>
                                    <td><a href="{{route('gig',['gig_id'=>$totalOrder[$a]->gig_id,'gig_title'=>$totalOrder[$a]->gig_title])}}">I will {{ $totalOrder[$a]->gig_title}}</a></td>
                                    <td>{{$totalOrder[$a]->gig_price}}</td>
                                    <td>Pending</td>
                                    <td>{{date('M d Y ', $totalOrder[$a]->updated_at->timestamp)}}</td>

                                @endif
                            </tr>
                            </tbody>
                        @endfor
                    </table>
                </div>
                <!-- #tab2 -->
                <h1 class="tab_drawer_heading" rel="tab3">Cancel Order</h1>
                <div id="tab3" class="tab_content">
                    <table class="table table-hover ">
                        <thead>
                        <tr>
                            <th>Buyer</th>
                            <th>Gig</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Date</th>

                        </tr>
                        </thead>
                        @for($a=0; $a<sizeof($gigs); $a++)
                            <tbody>
                            <tr>
                                @if($totalOrder[$a]->status ==3)
                                    <td><a href="{{route('profilefinder',['user_id'=>$seller[$a]->id])}}">{{$seller[$a]->name}}</a></td>
                                    <td><a href="{{route('gig',['gig_id'=>$totalOrder[$a]->gig_id,'gig_title'=>$totalOrder[$a]->gig_title])}}">I will {{ $totalOrder[$a]->gig_title}}</a></td>
                                    <td>{{$totalOrder[$a]->gig_price}}</td>
                                    <td>Cancle</td>
                                    <td>{{date('M d Y ', $totalOrder[$a]->updated_at->timestamp)}}</td>

                                @endif
                            </tr>
                            </tbody>
                        @endfor
                    </table>
                </div>
            </div>

        </div>
        <!-- .tab_container -->
    </div>




@endsection