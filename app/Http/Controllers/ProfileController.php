<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Skill;
use App\Models\Career;
use App\Models\School;
use App\Models\Profile;
use App\Models\SchoolType;
use App\Models\Technology;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\KnownForeignLanguage;
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
        $schoolList = SchoolType::orderBy('name')->get();

        return view(
            'profiles.index',
            compact("careers",
                "profile",
                "skills",
                "certificates",
                "knownLanguages",
                "schools",
                "technologies",
                "levels",
                "schoolList")
        );
    }

    public function addSchool(Request $request){
        $school = School::create(
            $request->all()
        );
        return view('profiles.add.school', compact('school'));
    }

    public function editSchool(Request $request){
        $school = School::find($request->input('id'));
        $schoolList = SchoolType::orderBy('name')->get();
        return view('profiles.edit.school', compact('school','schoolList'));
    }

    public function editSaveSchool(Request $request){
        $school = School::find($request->input('id'));

        $school->update($request->all());

        return view('profiles.editsave.school', compact('school'));
    }

    public function cancelSchool(Request $request){
        $school = School::find($request->input('id'));
        return view('profiles.editsave.school', compact('school'));
    }

    public function deleteSchool(Request $request){
        $school=School::find($request->input('id'));
        $school->forceDelete();
        return 0;
    }
}
