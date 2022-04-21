<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelRequest;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LevelController extends Controller
{
    /*
    * wygenerowanie widoku wszystkich rekordów
    */

    public function index() {
//        dd(Level::withTrashed()->get());

        return view(
            'levels.index',
            [
                'levels' => Level::withTrashed()->get(),
            ]
        );
    }

    /*
     * wygenerowanie formularza
     */
    public function create() {
        return view('levels.create');
    }

    /*
     * dodanie nowego rekordu do bazy
     */
    public function store( LevelRequest $request) {
        $level = Level::create(
            $request->all()
        );

        return redirect()->route('levels.index')->with('success', __('translations.toasts.levels.success.stored', [
            'name' => $level->name
        ]));
    }

    /*
     * wyświetla formularz
     */
    public function edit( Level $level) {
        $isEdit = true;

        return view(
            'levels.create',
            compact( 'level', ['isEdit'] )
        );
    }

    public function update( LevelRequest $request, Level $level) {
        $level->fill(
            $request->merge([
                'created_by' => Auth::id()
            ])->all()
        )->save();

        return redirect()->route('levels.index')->with(
            'success',
            __( $level->wasChanged()? 'translations.toasts.levels.success.updated' : 'translations.toasts.levels.success.nothing-changed',[
                'name' => $level->name
            ])
        );
    }

    public function destroy( Level $level ) {
        $level->delete();

        return redirect()->route('levels.index')->with( 'success', __('translations.toasts.levels.success.destroy', [
            'name' => $level->name
        ]));
    }

    public function restore( int $id ) {
        $level = Level::onlyTrashed()->findOrFail($id);
        $level->restore();

        return redirect()->route('levels.index')->with('success', __('translations.toasts.levels.success.restore', [
            'name' => $level->name
        ]));
    }
}
