<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Property;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function AdminHome(){
        $user_id =Auth::user()->id;
        $count = [
            'click' =>  History::where('type', 'click')->count(),
            'submit' =>  History::where('type', 'submit')->count(),
            'property' => Property::all()->count(),
            'sold' => Transaction::count(),
            'marketing' => User::where('role', 'sales')->count(),
            'developer' => 0
        ];
        return view('admin.dashboard', ['count' => $count]);
    }

    public function salesHome(){
        $user_id =Auth::user()->id;
        $count = [
            'click' =>  History::where('user_id', $user_id)->where('type', 'click')->count(),
            'submit' =>  History::where('user_id', $user_id)->where('type', 'submit')->count(),
            'property' => Property::all()->count(),
            'sold' => Transaction::where('user_id', $user_id)->count()
        ];
        return view('marketer.dashboard', ['count' => $count]);
    }
}
