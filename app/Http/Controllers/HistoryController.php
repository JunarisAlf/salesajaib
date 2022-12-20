<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class HistoryController extends Controller{
    public function click(Request $request, User $sales, Property $prop){
        History::create([
            'ip_address' => $request->ip(),
            'property_id' => $prop->id,
            'user_id' => $sales->id,
            'type' => 'click'
        ]);
        return redirect("/properti/{$prop->id}")->withCookie('sales_id', $sales->id);
    }
    public function affDirect(User $sales, Property $prop){
        return redirect("/submit/{$prop->id}")->withCookie('sales_id', $sales->id);
    }

    public function submitView($prop){
        return view('customer.submit', ['prop_id' => $prop]);
    }

    public function submit(Request $request, Property $prop){
        $request->validate([
            'noWa' => 'required',
            'full_name' => 'required'
        ]);

        History::create([
            'ip_address' => $request->ip(),
            'property_id' => $prop->id,
            'customer_wa' => $request->input('noWa'),
            'customer_name' => $request->input('full_name'),
            'user_id' => $request->cookie('sales_id'),
            'type' => 'submit'
        ]);
        return redirect()->away('https://wa.me/6282284393018');
    }
}