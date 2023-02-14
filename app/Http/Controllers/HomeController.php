<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Property;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function AdminHome(){
        $dt_start = Carbon::now()->startOfWeek()->format("Y-m-d H:i:s");
        $dt_end = Carbon::now()->endOfWeek()->format("Y-m-d H:i:s");
        $user_id =Auth::user()->id;

        $count = [
            'click' =>  History::where('type', 'click')
                ->whereDate('created_at' ,'>=', $dt_start)
                ->whereDate('created_at' ,'<=', $dt_end)
                ->count(),
            'submit' =>  History::where('type', 'submit')
                ->whereDate('created_at' ,'>=', $dt_start)
                ->whereDate('created_at' ,'<=', $dt_end)
                ->count(),
            'property' => Property::all()->count(),
            'sold' => Transaction::count(),
            'marketing' => User::where('role', 'sales')->count(),
            'developer' => 0
        ];
        return view('admin.dashboard', ['count' => $count]);
    }

    public function salesHome(){
        $dt_start = Carbon::now()->startOfWeek()->format("Y-m-d H:i:s");
        $dt_end = Carbon::now()->endOfWeek()->format("Y-m-d H:i:s");
        
        $user_id =Auth::user()->id;
        $count = [
            'click' =>  History::where('user_id', $user_id)
                ->where('type', 'click')
                ->whereDate('created_at' ,'>=', $dt_start)
                ->whereDate('created_at' ,'<=', $dt_end)
                ->count(),
            'submit' =>  History::where('user_id', $user_id)
                ->where('type', 'submit')
                ->whereDate('created_at' ,'>=', $dt_start)
                ->whereDate('created_at' ,'<=', $dt_end)
                ->count(),
            'property' => Property::all()->count(),
            'sold' => Transaction::where('user_id', $user_id)->count()
        ];
        return view('marketer.dashboard', ['count' => $count]);
    }
}
