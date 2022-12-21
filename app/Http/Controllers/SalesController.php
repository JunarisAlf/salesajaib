<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function showAll(){
        $sales = User::where('role', 'sales')->orderBy('created_at', 'desc')->paginate(10);
      
        return view('admin.marketing.lihat-semua-marketing', ['sales' => $sales]);
    }
}
