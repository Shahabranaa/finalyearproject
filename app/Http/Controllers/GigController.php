<?php

namespace App\Http\Controllers;

use App\Category;
use App\Gig;
use App\Like;
use App\Profile;
use App\Review;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

//use Session;

class GigController extends Controller
{
    public function index()
    {
        return view('creategig');
    }


    public function createGig(Request $request)
    {
        $file = $request->file('image');
//        $filename = $file->store('public');

////        $filename = $file->getClientOriginalName();
//
        $filename =  Storage::disk('public')->put('local', $file);
//        Storage::put('local', $file);

        $gig = new Gig();
        $gig->gigtitle = $request->gigtitle;
        $gig->description = $request->description;
        $gig->price = $request->price;
        $gig->image = $filename;
        $category = Category::where('category', $request->category)->first();
        $category_id = $category->id;
        $gig->category_id = $category_id;
        $request->user()->profile->gigs()->save($gig);

        return redirect()->route('profile',['user_id'=>Auth::user()->profile->id]);

    }
    public function indexh()
    {
        $gigs = Gig::all();
        return view('welcome',['gigs' => $gigs]);
    }

    public function gigDetail($gig_id)
    {
        $gig = Gig::find($gig_id);

        $pro = $gig->profile;
        $buyer_id = Auth::user()->id;

        $pendingdOrder = Order::where('gig_id', $gig->id)->where('buyer_id', $buyer_id)->where('status', 1)->get();
        $orders = Order::where('gig_id', $gig->id)->where('buyer_id', $buyer_id)->get();
        if($pendingdOrder == '[]'){
            $isBuyed = 'false';
        }else{
            $isBuyed = 'true';
        }
        $temp = 0;
        $reviewProfile = array();
        $reviews = Review::where('gig_id',$gig_id)->orderBy('created_at', 'DESC')->get();
        $avgRating = Review::where('gig_id',$gig_id)->avg('rating');
        $ratingCount = Review::where('gig_id',$gig_id)->count();

        foreach ($reviews as $review){
            $user_id = $review->user_id;
            $reviewProfile[$temp] = Profile::where('user_id',$user_id)->first();
            $temp += 1;
        }


        return view('gigdetail')->with(['gig'=>$gig,'orders'=>$orders, 'isBuyed'=>$isBuyed ,'pro'=>$pro, 'reviews'=>$reviews,'reviewProfile'=>$reviewProfile,'avgRating'=>$avgRating,'ratingCount'=>$ratingCount]);
    }



    public function deleteGig($gig_id)
    {
        $profile_id = Auth::user()->profile->id;
        $gig = Gig::where('profile_id', $profile_id)->where('id',$gig_id);
        $gig->delete();
        $gigs = Gig::all();
        return view('welcome')->with(['gigs'=>$gigs]);
//        return redirect()->route('profile',['user_id'=>$profile_id]);
    }
    public function editGig($gig_id)
    {
        $profile_id = Auth::user()->profile->id;
        $gig = Gig::where('profile_id', $profile_id)->where('id',$gig_id)->first();
        return view('editgig')->with(['gig'=>$gig]);
//        return $gig->gigtitle;

    }

    public function updateGig( Request $request,$gig_id)
    {
        $profile_id = Auth::user()->profile->id;
        $gig = Gig::where('profile_id', $profile_id)->where('id',$gig_id)->first();
        $file = $request->file('image');
        $filename = $file->store('local');
        $gig->gigtitle = $request->gigtitle;
        $gig->description = $request->description;
        $gig->category = $request->category;
        $gig->price = $request->price;
        $gig->image = $filename;
        $request->user()->profile->gigs()->save($gig);
        return redirect()->route('profile',['user_id'=>$profile_id]);

    }

    public function search(Request $request)
    {
        $gig_result = [];

        $query = $request->get('search');
        $words = explode(" ", $query);
//        $chars = str_split($words);

        if ($gigs = Gig::where('gigtitle', 'LIKE','%'.$query.'%')->get()){
            return view('welcome',['gigs' => $gigs]);        }else{
            foreach ($words as $word){
                $gigs = Gig::where('gigtitle', 'LIKE','%'.$word.'%')->get();
                return view('welcome',['gigs' => $gigs]);
            }
        }


    }

    public function categoryGig($name)
    {
        $category =Category::where('category', $name)->first();
        $category_id = $category->id;
        $gigs = Gig::where('category_id',$category_id )->get();
        return view('welcome',['gigs' => $gigs]);

    }
}
