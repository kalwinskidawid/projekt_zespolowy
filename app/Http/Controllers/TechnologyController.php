<?php

namespace App\Http\Controllers;

use App\Http\Requests\TechnologyRequest;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TechnologyController extends Controller
{
    /*
     * wygenerowanie widoku wszystkich rekordów
     */

    public function index() {
        //dd(Technology::withTrashed()->get());

        return view(
          'technologies.index',
            [
                'technologies' => Technology::withTrashed()->get(),
            ]
        );
    }

    /*
     * wygenerowanie formularza
     */
    public function create() {
        return view('technologies.create');
    }

    /*
     * dodanie nowego rekordu do bazy
     */
    public function store( TechnologyRequest $request) {
        $technology = Technology::create(
            $request->all()
        );

        return redirect()->route('technologies.index')->with('success', __('translations.toasts.technologies.success.stored', [
            'name' => $technology->name
        ]));
    }

    /*
     * wyświetla formularz
     */
    public function edit( Technology $technology) {
        $isEdit = true;

        return view(
            'technologies.create',
            compact( 'technology', ['isEdit'] )
        );
    }

    public function update( TechnologyRequest $request, Technology $technology) {
        $technology->fill(
            $request->merge([
                'created_by' => Auth::id()
            ])->all()
        )->save();

        return redirect()->route('technologies.index')->with(
            'success',
            __( $technology->wasChanged()? 'translations.toasts.technologies.success.updated' : 'translations.toasts.technologies.success.nothing-changed',[
                'name' => $technology->name
            ])
        );
    }

    public function destroy( Technology $technology ) {
        $technology->delete();

        return redirect()->route('technologies.index')->with( 'success', __('translations.toasts.technologies.success.destroy', [
            'name' => $technology->name
        ]));
    }

    public function restore( int $id ) {
        $technology = Technology::onlyTrashed()->findOrFail($id);
        $technology->restore();

        return redirect()->route('technologies.index')->with('success', __('translations.toasts.technologies.success.restore', [
            'name' => $technology->name
        ]));
    }
}
