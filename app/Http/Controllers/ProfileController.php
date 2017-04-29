<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('createprofile');
    }
    public function createProfile(Request $request)
    {
        $profileImg = $request->file(attch);

    }
}
