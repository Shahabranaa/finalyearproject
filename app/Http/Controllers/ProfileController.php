<?php

    namespace App\Http\Controllers;

    use App\Address;
    use App\Language;
    use App\Language_Profile;
    use App\Language_User;
    use App\Profile_Skill;
    use App\Skill;
    use App\Profile;
    use App\Skill_User;
    use App\User;
    use Illuminate\Support\Facades\Storage;
    use Session;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class ProfileController extends Controller
    {
        public function index()
        {
            return view('createprofile');
        }

        public function profile($user_id)
        {
            $user = User::where('id',$user_id)->first();

//            $profile =Profile::where('user_id' , $user->id)->first();
            return view('profile',['user' => $user]);
        }

        public function createDummyProfile(Request $request)
        {
            $newProfile = new Profile();
            $user = Auth::user();
            $newProfile->name = $request->user()->name;
            $newProfile->user_id = $request->user()->id;
            $user->profile()->save($newProfile);
            return redirect()->route('create-profile');
        }
        public function createProfile(Request $request)
        {
            $user = Auth::user();
            $file = $request->file('profileImage');
//            $filename = $request->file('name').'-'. $user->id;
//            if($file){
//                Storage::disk('public')->put('local', $file);
//
//            }
//            $filename = $file->store('local');
            $filename =  Storage::disk('public')->put('local', $file);

            $filecnic = $request->file('cnic');
            $filenamecnic =  Storage::disk('public')->put('local', $filecnic);

            $profile = Profile::where('user_id',$user->id)->first();
            $profile->name= $request->user()->name;
            $profile->bio = $request['bio'];
            $profile->phone = $request->mobile;
            $profile->picture = $filename;
            $profile->cnic = $filenamecnic;
            $profile->city = $request->city;
            $profile->area = $request->area;
            $userid = $request->user()->id;
            $request->user()->profile()->save($profile);

            if(is_array($request['Skill'])) {
                $deleteSkills = Profile_Skill::where('profile_id',$profile->id)->delete();
                $loop = $request->get('Skill');

                foreach ($loop as $skills) {
                    $profile_skill = new Profile_Skill();
                    $all= Skill::where('skill','=',$skills)->first();
                    $skill_id= $all->id;
                    $profile_skill->skill_id = $skill_id;
                    $request->user()->profile->profile_skills()->save($profile_skill);
                }
            }

            if (is_array($request['Language'])) {
                $deleteLangs = Language_Profile::where('profile_id',$profile->id)->delete();
                $loop = $request->get('Language');

                foreach ($loop as $lang) {
                    $language_profile = new Language_Profile();
                    $language= Language::where('language','=',$lang)->first();
                    $language_id= $language->id;
                    $language_profile->language_id = $language_id;
                    $request->user()->profile->language_profiles()->save($language_profile);
                }
            }
                $u= Auth::user();
                return redirect()->route('profile',['user_id'=>$u->id]);
        }

        public function profilefinder($buyer_id)
        {
            $user=  User::where('id',$buyer_id)->first();
            $profile = $user->id;
                return redirect()->route('profile',['user_id'=> $profile]);
        }
    }
