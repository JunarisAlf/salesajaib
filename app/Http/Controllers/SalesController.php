<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function showAll(){
        $sales = User::where('role', 'sales')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.marketing.lihat-semua-marketing', ['sales' => $sales]);
    }
    public function checkAffView(){
        return view('admin.marketing.check-affiliate', ['histories' => null]);
    }
    public function checkAff(Request $request){
        $query = $request->input('query');
        $histories = History::where('customer_name', 'like', "%{$query}%")
            ->orWhere('customer_wa', 'like', "%{$query}%")
            ->get();
        return view('admin.marketing.check-affiliate', ['histories' => $histories]);
    }
}
