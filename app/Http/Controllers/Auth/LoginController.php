<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\SessionGuard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Auth\UserInterface;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        // 1 check if the user exists in our database with facebook_id
        // 2 if not create a new user
        // 3 login this user into our application
        try {
            $socialUser = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect('/');
        }
        $user = User::where('facebook_id', $socialUser->id)->first();
        if (!$user) {
            $newUsers = new  User();
            $newUsers->facebook_id = $socialUser->id;
            $newUsers->name = $socialUser->name;
            $newUsers->email = $socialUser->email;
            $newUsers->save();
            auth()->login($newUsers);
            return redirect()->to('/dummyprofile');
        } else {
            auth()->login($user);
            return redirect()->to('/');
        }
    }
}


