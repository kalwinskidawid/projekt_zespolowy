<?php

namespace App\Http\Controllers;

use App\Models\Language;
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
        $languageList = Language::orderBy('name')->get();
        $canEdit = ($profile->user->id == optional(Auth::user())->id) || optional(Auth::user())->isAdmin();
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
                "schoolList",
                "languageList",
                "canEdit")
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

    public function addCareer(Request $request){
        $career = Career::create(
            $request->all()
        );
        return view('profiles.add.career', compact('career'));
    }

    public function editCareer(Request $request){
        $career = Career::find($request->input('id'));

        return view('profiles.edit.career', compact('career'));
    }

    public function editSaveCareer(Request $request){
        $career = Career::find($request->input('id'));

        $career->update($request->all());

        return view('profiles.editsave.career', compact('career'));
    }

    public function cancelCareer(Request $request){
        $career = Career::find($request->input('id'));
        return view('profiles.editsave.career', compact('career'));
    }

    public function deleteCareer(Request $request){
        $career=Career::find($request->input('id'));
        $career->forceDelete();
        return 0;
    }

    public function addSkill(Request $request){
        $skill = Skill::create(
            $request->all()
        );
        return view('profiles.add.skill', compact('skill'));
    }

    public function editSkill(Request $request){
        $skill = Skill::find($request->input('id'));
        $technologies = Technology::orderBy('name')->get();
        $levels = Level::orderBy('name')->get();

        return view('profiles.edit.skill', compact('skill','technologies', 'levels'));
    }

    public function editSaveSkill(Request $request){
        $skill = Skill::find($request->input('id'));

        $skill->update($request->all());

        return view('profiles.editsave.skill', compact('skill'));
    }

    public function cancelSkill(Request $request){
        $skill = Skill::find($request->input('id'));
        return view('profiles.editsave.skill', compact('skill'));
    }

    public function deleteSkill(Request $request){
        $skill=Skill::find($request->input('id'));
        $skill->forceDelete();
        return 0;
    }

    public function addCertificate(Request $request){
        $certificate = Certificate::create(
            $request->all()
        );
        return view('profiles.add.certificate', compact('certificate'));
    }

    public function editCertificate(Request $request){
        $certificate = Certificate::find($request->input('id'));
        return view('profiles.edit.certificate', compact('certificate'));
    }

    public function editSaveCertificate(Request $request){
        $certificate = Certificate::find($request->input('id'));

        $certificate->update($request->all());

        return view('profiles.editsave.certificate', compact('certificate'));
    }

    public function cancelCertificate(Request $request){
        $certificate = Certificate::find($request->input('id'));
        return view('profiles.editsave.certificate', compact('certificate'));
    }

    public function deleteCertificate(Request $request){
        $certificate=Certificate::find($request->input('id'));
        $certificate->forceDelete();
        return 0;
    }

    public function addLanguage(Request $request){
        $language = KnownForeignLanguage::create(
            $request->all()
        );
        return view('profiles.add.language', compact('language'));
    }

    public function editLanguage(Request $request){
        $language = KnownForeignLanguage::find($request->input('id'));
        $languageList = Language::orderBy('name')->get();
        $levels = Level::orderBy('name')->get();

        return view('profiles.edit.language', compact('language','languageList', 'levels'));
    }

    public function editSaveLanguage(Request $request){
        $language = KnownForeignLanguage::find($request->input('id'));

        $language->update($request->all());

        return view('profiles.editsave.language', compact('language'));
    }

    public function cancelLanguage(Request $request){
        $language = KnownForeignLanguage::find($request->input('id'));
        return view('profiles.editsave.language', compact('language'));
    }

    public function deleteLanguage(Request $request){
        $language=KnownForeignLanguage::find($request->input('id'));
        $language->forceDelete();
        return 0;
    }
}

