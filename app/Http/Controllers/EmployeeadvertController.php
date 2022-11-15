<?php

namespace App\Http\Controllers;

use App\Models\Contracttype;
use App\Models\Employeeadvert;
use App\Models\Profile;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeAdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeadverts=Employeeadvert::with(['profile','technology','contracttype'])->get();
        //dd($employeeadverts);
        return view(
            'employeeadverts.index',compact('employeeadverts')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profil=Profile::where('user_id','=',Auth::id())->first();
        $contracttype=Contracttype::all();
        $technology=Technology::all();
        return view(
            'employeeadverts.create',compact('contracttype','technology','profil')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employeeadvert = Employeeadvert::create(
            $request->all()
        );

        return redirect()->route('employeeadverts.index')->with('success', __('translations.toasts.employeeadverts.success.stored', [
            'id' => $employeeadvert->id
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employeeadvert  $employeeadvert
     * @return \Illuminate\Http\Response
     */
    public function show(Employeeadvert $employeeadvert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employeeadvert  $employeeadvert
     * @return \Illuminate\Http\Response
     */
    public function edit(Employeeadvert $employeeadvert)
    {
        $isEdit = true;

        $profil=Profile::where('user_id','=',Auth::id())->first();
        $contracttype=Contracttype::all();
        $technology=Technology::all();

        return view(
            'employeeadverts.create',
            compact( 'employeeadvert', 'contracttype','technology','profil', ['isEdit'] )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employeeadvert  $employeeadvert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employeeadvert $employeeadvert)
    {
        $employeeadvert->fill(
            $request->merge([
                'profile_id' => Auth::id()
            ])->all()
        )->save();

        return redirect()->route('employeeadverts.index')->with(
            'success',
            // sprawdzamy, czy zostaly zmienione jakies dane, by wysswietlic prawdilowy komunikat
            __( $employeeadvert->wasChanged()? 'translations.toasts.employeeadverts.success.updated' : 'translations.toasts.employeeadverts.success.nothing-changed', [
                'id' => $employeeadvert->id
            ])
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employeeadvert  $employeeadvert
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Employeeadvert::find($id)->delete();
        return redirect()->route('employeeadverts.index')
            ->with('success', __('translations.toasts.employeeadverts.success.destroy', ['id' => $id]));
    }
}
