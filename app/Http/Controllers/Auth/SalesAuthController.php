<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesAuthController extends Controller
{
    public function register(Request $request){
        $validatedRes = $request->validate([
            'noWa' => 'required',
            'fullName' => 'required',
            'password' => 'required|confirmed|min:6',
            'email' => 'required|email'
        ]);
        
        dd($validatedRes);
    }
}
