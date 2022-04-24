<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Certificate;
use App\Models\KnownForeignLanguage;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        //dd(Auth::user()->profile()->first());

        $profile = Profile::where('user_id', '=', Auth::id())->first();
        $careers = Career::where('profile_id', '=', $profile->id)->orderBy('start_date', 'desc')->get();
        $skills = Skill::where('profile_id', $profile->id)->get();
        $certificates = Certificate::where('profile_id', $profile->id)->orderBy('achievement_date', 'desc')->get();
        $knownLanguages = KnownForeignLanguage::where('profile_id',$profile->id)->get();
        return view(
            'profiles.index', compact("careers", "profile", "skills", "certificates","knownLanguages")
        );
    }

    public function getProfile($id)
    {
        $profile = Profile::where('id', '=', $id)->firstOrFail();
        $careers = Career::where('profile_id', '=', $profile->id)->get();
        $skills = Skill::where('profile_id', $profile->id)->get();
        $certificates = Certificate::where('profile_id', $profile->id)->orderBy('achievement_date', 'desc')->get();
        $knownLanguages = KnownForeignLanguage::where('profile_id',$profile->id)->get();

        return view(
            'profiles.index', compact("careers", "profile", "skills", "certificates","knownLanguages")
        );
    }


}
