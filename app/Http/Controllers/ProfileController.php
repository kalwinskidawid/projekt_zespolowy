<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        //dd(Auth::user()->profile()->first());
        return view(
            'profiles.index',
            [
                'profile' => Auth::user()->profile()->first(),
            ]
        );
    }


}
