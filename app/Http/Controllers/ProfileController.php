<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Certificate;
use App\Models\KnownForeignLanguage;
use App\Models\Level;
use App\Models\Profile;
use App\Models\School;
use App\Models\Skill;
use App\Models\Technology;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::where('user_id', '=', Auth::id())->first();
        return $this->prepareView($profile);
    }

    public function getProfile($id)
    {
        $profile = Profile::where('id', '=', $id)->firstOrFail();
        return $this->prepareView($profile);
    }

    public function prepareView($profile)
    {
        $skills = Skill::where('profile_id', $profile->id)->get();
        $certificates = Certificate::where('profile_id', $profile->id)->orderBy('achievement_date', 'desc')->get();
        $knownLanguages = KnownForeignLanguage::where('profile_id', $profile->id)->get();
        $schools = School::where('profile_id', $profile->id)->orderBy('end_date', 'desc')->get();
        $careers = Career::where('profile_id', '=', $profile->id)->get();
        $technologies = Technology::orderBy('name')->get();
        $levels = Level::orderBy('name')->get();

        return view(
            'profiles.index', compact("careers", "profile", "skills", "certificates", "knownLanguages", "schools", "technologies","levels")
        );
    }
}
