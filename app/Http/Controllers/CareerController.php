<?php

namespace App\Http\Controllers;

use App\Http\Requests\CareerRequest;
use App\Models\Career;
use Illuminate\Support\Facades\Auth;

class CareerController extends Controller
{

    public function store( CareerRequest $request) {
        Career::create(
            $request->merge([
                'profile_id' => Auth::user()->profile->id,
                'created_by' => Auth::id()
            ])->all()
        );
        return redirect()->route('profiles.index')->with('success', __('translations.toasts.careers.success.stored'));
    }

    public function update( CareerRequest $request, Career $career) {
        $career->fill(
            $request->merge([
                'profile_id' => Auth::user()->profile->id,
                'created_by' => Auth::id()
            ])->all()
        )->save();

        return redirect()->route('profiles.index')->with(
            'success',
            __( $career->wasChanged()? 'translations.toasts.careers.success.updated' : 'translations.toasts.careers.nothing-changed')
        );
    }

    public function destroy( Career $career ) {
        $career->delete();

        return redirect()->route('profiles.index')->with( 'success', __('translations.toasts.careers.success.destroy'));
    }

    public function restore( int $id ) {
        $career = Career::onlyTrashed()->findOrFail($id);
        $career->restore();

        return redirect()->route('profiles.index')->with('success', __('translations.toasts.careers.success.restore'));
    }
}
