<?php

namespace App\Http\Controllers;

use App\Gig;
use Illuminate\Http\Request;
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
      $filename = $file->store('local');

//        $filename = $file->getClientOriginalName();
//
//        $img = Image::make($file);
//        $img ->resize(200,100)->stream();
//
//        Storage::disk('mydisk')->put($filename, $img);

        $gig = new Gig();
        $gig->gigtitle = $request->gigtitle;
        $gig->description = $request->description;
        $gig->category = $request->category;
        $gig->price = $request->price;
        $gig->image = $filename;
        $gig->save();
//        Session::flash('msg','Your data is saved now');
        return back();


    }

}
