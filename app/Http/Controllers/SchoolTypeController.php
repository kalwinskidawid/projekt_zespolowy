<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolTypeRequest;
use App\Models\SchoolType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolTypeController extends Controller
{
    public function index(){

        return view(
            'school_types.index',
            [
            'school_types' => SchoolType::withTrashed()->get(),
            ]
        );

    }

    public function create(){
        return view('school_types.create');
    }

    public function store( SchoolTypeRequest $request) {
        $school_type = SchoolType::create(
            $request->all()
        );

        return redirect()->route('school_types.index')->with('success', __('translations.toasts.school_types.success.stored', [
            'name' => $school_type->name
        ]));
    }

    /*
     * wyświetla formularz
     */
    public function edit( SchoolType $school_type) {
        $isEdit = true;

        return view(
            'school_types.create',
            compact( 'school_type', ['isEdit'] )
        );
    }

    public function update( SchoolTypeRequest $request, SchoolType $school_type) {
        $school_type->fill(
            $request->merge([
                'created_by' => Auth::id()
            ])->all()
        )->save();

        return redirect()->route('school_types.index')->with(
            'success',
            __( $school_type->wasChanged()? 'translations.toasts.school_types.success.updated' : 'translations.toasts.school_types.success.nothing-changed',[
                'name' => $school_type->name
            ])
        );
    }

    public function destroy( SchoolType $school_type ) {
        $school_type->delete();

        return redirect()->route('school_types.index')->with( 'success', __('translations.toasts.school_types.success.destroy', [
            'name' => $school_type->name
        ]));
    }

    public function restore( int $id ) {
        $school_type = SchoolType::onlyTrashed()->findOrFail($id);
        $school_type->restore();

        return redirect()->route('school_types.index')->with('success', __('translations.toasts.school_types.success.restore', [
            'name' => $school_type->name
        ]));
    }

}
