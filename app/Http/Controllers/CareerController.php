<?php

namespace App\Http\Controllers;

use App\Http\Requests\CareerRequest;
use App\Models\Career;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CareerController extends Controller
{

    public function store( CareerRequest $request) {
        $career = DB::transaction(function() use ($request) {
            $career = Career::create(
                $request->merge([
                    'profile_id' => Auth::user()->profile()->id
                ])->all()
            );
            return $career;
        });

        return redirect()->route('career.index')->with('success', __('translations.toasts.certificates.success.stored'));
    }
}
