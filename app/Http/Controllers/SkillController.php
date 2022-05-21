<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function store( SkillRequest $request) {
        $skill = Skill::create(
            $request->merge([
                'profile_id' => Auth::user()->profile->id,
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
            __( $skill->wasChanged()? 'translations.toasts.skills.success.updated' : 'translations.toasts.skills.success.nothing-changed',[
                'name' => $skill->technology->name
            ])
        );
    }

    public function destroy( Skill $skill ) {
        dd($skill);
        $skill->delete();

        return redirect()->route('profiles.index')->with( 'success', __('translations.toasts.skills.success.destroy', [
            'name' => $skill->technology->name
        ]));
    }

    public function restore( int $id ) {
        $skill = Skill::onlyTrashed()->findOrFail($id);
        $skill->restore();

        return redirect()->route('profiles.index')->with('success', __('translations.toasts.skills.success.restore', [
            'name' => $skill->technology->name
        ]));
    }
}
