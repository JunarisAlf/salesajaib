<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function salesHome(){
        $count = [
            'click' =>  History::where('user_id', Auth::user()->id)->where('type', 'click')->count(),
            'submit' =>  History::where('user_id', Auth::user()->id)->where('type', 'submit')->count(),
            'property' => Property::all()->count()
        ];
        return view('marketer.dashboard', ['count' => $count]);
    }
}
