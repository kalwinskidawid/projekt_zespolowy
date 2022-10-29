<?php

namespace App\Http\Controllers;

use App\Models\Employeeadvert;
use Illuminate\Http\Request;

class EmployeeAdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeadverts=Employeeadvert::with(['technology'])->get();
        dd($employeeadverts);
        return view(
            'employeeadverts.index',$employeeadverts
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(Employeeadvert $employeeadvert)
    {
        //
    }
}
