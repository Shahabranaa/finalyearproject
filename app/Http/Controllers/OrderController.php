<?php

namespace App\Http\Controllers;

use App\Gig;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{


    public function createOrder($gig_id)
    {
        $user_id=Auth::user()->id;
        $checkOrder = Order::where('gig_id',$gig_id )->where('buyer_id',$user_id)->where('status',1)->first();
        if(!isset($checkOrder)) {

            $order = new Order();
            $order->gig_id = $gig_id;
            $order->buyer_id = $user_id;
            $gig = Gig::find($gig_id);
            $order->gig_title = $gig->gigtitle;
            $order->gig_price = $gig->price;
            $order->seller_id = $gig->profile->user->id;
            $order->save();

            return redirect()->route('gig', ['gig_id' => $gig_id, 'gig_title' => $gig->gigtitle]);
        }else
            return $checkOrder[0];
    }



    public function SellerOrder()
    {
        $user = Auth::user()->id;
        $totalOrder = Order::where('seller_id',$user)->get();

        $temp = 0;
        $gigs = array();
        $buyers = array();

        foreach ($totalOrder as $totalOrders){
            $gig_id = $totalOrders->gig_id;
            $gigs[$temp] = Gig::where('id',$gig_id)->first();
            $buyer_id = $totalOrders->buyer_id;
            $buyers[$temp] = User::where('id',$buyer_id)->orderBy('id', 'ASCE')->first();
            $temp += 1;
        }
        return view('manageSellorder' )->with(['gigs'=>$gigs,'buyers'=>$buyers,'totalOrder'=>$totalOrder]);


    }

    public function BuyerOrder()
    {
        $user = Auth::user()->id;
        $totalOrder = Order::where('buyer_id',$user)->get();

        $temp = 0;
        $gigs = array();
        $seller = array();

        foreach ($totalOrder as $totalOrders){
            $gig_id = $totalOrders->gig_id;
            $gigs[$temp] = Gig::where('id',$gig_id)->first();
            $seller_id = $totalOrders->seller_id;
            $seller[$temp] = User::where('id',$seller_id)->orderBy('id', 'ASCE')->first();
            $temp += 1;
        }
        return view('manageBuyorder' )->with(['gigs'=>$gigs,'seller'=>$seller,'totalOrder'=>$totalOrder]);
     }



}
