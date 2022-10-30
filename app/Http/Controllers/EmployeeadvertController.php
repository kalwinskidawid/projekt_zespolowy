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

        return redirect()->route('employeeadverts.index')->with('success', __('translations.toasts.languages.success.stored', [
            'name' => $employeeadvert->location
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
        //
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
        //
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
            ->with('success','employeeadverts deleted successfully');
    }
}
