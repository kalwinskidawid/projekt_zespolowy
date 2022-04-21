<?php

namespace App\Http\Controllers;

use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller
{
    /*
    * wygenerowanie widoku wszystkich rekordów
    */

    public function index() {
        //dd(Language::withTrashed()->get());

        return view(
            'languages.index',
            [
                'languages' => Language::withTrashed()->get(),
            ]
        );
    }

    /*
     * wygenerowanie formularza
     */
    public function create() {
        return view('languages.create');
    }

    /*
     * dodanie nowego rekordu do bazy
     */
    public function store( LanguageRequest $request) {
        $language = Language::create(
            $request->all()
        );

        return redirect()->route('languages.index')->with('success', __('translations.toasts.languages.success.stored', [
            'name' => $language->name
        ]));
    }

    /*
     * wyświetla formularz
     */
    public function edit( Language $language) {
        $isEdit = true;

        return view(
            'languages.create',
            compact( 'language', ['isEdit'] )
        );
    }

    public function update( LanguageRequest $request, Language $language) {
        $language->fill(
            $request->merge([
                'created_by' => Auth::id()
            ])->all()
        )->save();

        return redirect()->route('languages.index')->with(
            'success',
            __( $language->wasChanged()? 'translations.toasts.languages.success.updated' : 'translations.toasts.languages.success.nothing-changed',[
                'name' => $language->name
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
