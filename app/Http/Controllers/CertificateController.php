<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateRequest;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function index() {
        //dd(Language::withTrashed()->get());

        return view(
            'certificates.index',
            [
                'certificates' => Certificate::withTrashed()->get(),
            ]
        );
    }

    /*
     * wygenerowanie formularza
     */
    public function create() {
        return view('certificates.create');
    }

    /*
     * dodanie nowego rekordu do bazy
     */
    public function store( CertificateRequest $request) {
        $certificate = Certificate::create(
            $request->all()
        );

        return redirect()->route('certificates.index')->with('success', __('translations.toasts.certificates.success.stored', [
            'name' => $certificate->name
        ]));
    }

    /*
     * wyświetla formularz
     */
    public function edit( Certificate $certificate) {
        $isEdit = true;

        return view(
            'certificates.create',
            compact( 'certificate', ['isEdit'] )
        );
    }

    public function update( CertificateRequest $request, Certificate $certificate) {
        $certificate->fill(
            $request->merge([
                'created_by' => Auth::id()
            ])->all()
        )->save();

        return redirect()->route('certificates.index')->with(
            'success',
            __( $certificate->wasChanged()? 'translations.toasts.certificates.success.updated' : 'translations.toasts.certificates.success.nothing-changed',[
                'name' => $certificate->name
            ])
        );
    }

    public function destroy( Certificate $certificate ) {
        $certificate->delete();

        return redirect()->route('certificates.index')->with( 'success', __('translations.toasts.certificates.success.destroy', [
            'name' => $certificate->name
        ]));
    }

    public function restore( int $id ) {
        $certificate = Certificate::onlyTrashed()->findOrFail($id);
        $certificate->restore();

        return redirect()->route('certificates.index')->with('success', __('translations.toasts.certificates.success.restore', [
            'name' => $certificate->name
        ]));
    }
}
