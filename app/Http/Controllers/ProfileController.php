<?php

namespace App\Http\Controllers;

use App\Address;
use App\Language;
use App\Skill;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('createprofile');
    }
    public function createProfile(Request $request)
    {

        $file = $request->file('profileImage');
        $filename = $file->store('local');
        $filecnic = $request->file('cnic');
        $filenamecnic = $filecnic->store('local');

        $profile = new Profile();
        $profile->bio = $request['bio'];
        $profile->phone = $request->mobile;
        $profile->picture = $filename;
        $profile->cnic = $filenamecnic;
//        $profile->save();
        $request->user()->profile()->save($profile);
        $adrs = new Address();
        $adrs->city = $request->city;
        $adrs->area = $request->area;
        $adrs->profile_id = Auth::User()->id;
//        $adrs->save();
        $request->user()->profile()->address()->save($adrs);

        if(is_array($request['language'])){
            foreach ($request['language'] as $lang){
                $l = new Language();
                $l->language = $lang;
//                $l->save();
                $request->user()->profile()->languages()->save($l);

            }
        }
        if(is_array($request['Skill'])){
            foreach ($request['Skill'] as $skill){
                $sk = new Skill();
                $sk->skill = $skill;
//                $sk->save();
                $request->user()->profile()->skills()->save($sk);
//
            }
        }
    }
}
