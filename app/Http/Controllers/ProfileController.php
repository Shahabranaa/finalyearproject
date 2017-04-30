<?php

    namespace App\Http\Controllers;

    use App\Address;
    use App\Language;
    use App\Skill;
    use App\Profile;
    use Session;
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
            $profile->city = $request->city;
            $profile->area = $request->area;
            $userid = $request->user()->id;
            $isProfileExist = Profile::where('user_id',$userid)->first();
            if($isProfileExist){
                return view('home');
            }
//          $profile->save();
            $request->user()->profile()->save($profile);

//          $adrs->save();
//          $request->user()->profile()->address()->save($adrs);

            if (is_array($request['language'])) {
                foreach ($request['language'] as $lang) {
                    $l = new Language();
                    $l->language = $lang;
//                  $l->save();
                    $request->user()->profile()->orderBy('updated_at', 'desc')->first()->languages()->save($l);

                }
            }

            if(is_array($request['Skill'])) {
                foreach ($request['Skill'] as $skill) {
                    $sk = new Skill();
                    $sk->skill = $skill;
//                  $sk->save();
                    $request->user()->profile()->orderBy('updated_at', 'desc')->first()->skills()->save($sk);
                }
            }
        }
    }
