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

        public function profile()
        {
            $user = Auth::user();
//            $profile =Profile::where('user_id' , $user->id)->first();
            return view('profile',['user' => $user]);
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
            $request->user()->profile()->save($profile);

            if (is_array($request['language'])) {
                foreach ($request['language'] as $lang) {
                    $l = new Language();
                    $l->language = $lang;
//                    $prof=$request->user()->profile;
//                    $prof->languages()->save($l);
                    $request->user()->profile->languages()->save($l);
                }
            }

            if(is_array($request['Skill'])) {
                foreach ($request['Skill'] as $skill) {
                    $sk = new Skill();
                    $sk->skill = $skill;
//                    $prof=$request->user()->profile;
//                    $prof->skills()->save($sk);
                    $request->user()->profile->skills()->save($sk);
//
              }
            }
        }
    }
