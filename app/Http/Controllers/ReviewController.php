<?php

namespace App\Http\Controllers;

use App\Gig;
use App\Order;
use App\Profile;
use App\Review;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ReviewController extends Controller
{
    public function review(Request $request, $gig_id )
    {
        $review = new Review();
        $user_id = Auth::user()->id;
        $gig = Gig::find($gig_id);
        $pro = $gig->profile;
        $review->user_id = $user_id;
        $review->gig_id =$gig_id;
        $review->comment = $request->comment;
        $review->rating = $request->rating;
        $gig->reviews()->save($review);
        $order = Order::where('gig_id',$gig_id)->where('buyer_id',$user_id)->where('review',0)->first();
        $order->review=1;
        $order->save();

        return back();

//        return redirect()->route('gig',['gig_id'=> $gig_id,'gig_title'=>$gig->gigtitle]);
    }


}
