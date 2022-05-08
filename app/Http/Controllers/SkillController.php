<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Models\Language;
use App\Models\Profile;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function store( SkillRequest $request) {
        $skill = Skill::create(
            $request->merge([
                'profile_id' => Profile::where('user_id', '=', Auth::id())->first()->id,
                'created_by' => Auth::id()
            ])->all()
        );
        return redirect()->route('profiles.index')->with('success', __('translations.toasts.skills.success.stored', [
            'name' => $skill->technology->name
        ]));
    }

    public function update( SkillRequest $request, Skill $skill) {
        $skill->fill(
            $request->merge([
                'created_by' => Auth::id()
            ])->all()
        )->save();

        return redirect()->route('profiles.index')->with(
            'success',
            __( $skill->wasChanged()? 'translations.toasts.languages.success.updated' : 'translations.toasts.languages.success.nothing-changed',[
                'name' => $skill->name
            ])
        );
    }

    public function destroy( Language $language ) {
        $language->delete();

        return redirect()->route('languages.index')->with( 'success', __('translations.toasts.languages.success.destroy', [
            'name' => $language->name
        ]));
    }

    public function restore( int $id ) {
        $language = Language::onlyTrashed()->findOrFail($id);
        $language->restore();

        return redirect()->route('languages.index')->with('success', __('translations.toasts.languages.success.restore', [
            'name' => $language->name
        ]));
    }
}
