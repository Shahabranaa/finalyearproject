<?php

namespace App\Http\Controllers;

use App\Gig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gigs = Gig::all();
//            $profile =Profile::where('user_id' , $user->id)->first();
        return view('welcome',['gigs' => $gigs]);
    }


}
