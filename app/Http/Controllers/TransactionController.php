<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function create(){
        return view('admin.penjualan.tambah');
    }

    public function store(Request $request){
        $request->validate([
            'property_id' => 'required|exists:App\Models\Property,id',
            'sales_id' => 'required|exists:App\Models\User,id',
            'price' => 'required|numeric',
            'customer_name' => 'required',
            'customer_wa' => 'required'
        ]);
        $prop = Property::find($request->input('property_id'));
        $prop->status = 'sold';
        $prop->save();
        Transaction::create([
            'property_id' => $request->input('property_id'),
            'user_id' => $request->input('sales_id'),
            'admin_id' => Auth::user()->id,
            'price' => $request->input('price'),
            'customer_name' => $request->input('customer_name'),
            'customer_wa' => $request->input('customer_wa'),
        ]);
        // $prop = Property::find($request->input('property_id'));
        // $sales = User::find($request->input('sales_id'));
        return redirect()->route('admin.createTransaction')->with('success', 'Transaksi berhasil dibuat');

    }
    public function showAll(){
        $trxs = Transaction::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.penjualan.riwayat-penjualan', ['trxs' => $trxs]);
    }
    public function showForSales(){
        $trxs = Transaction::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('marketer.riwayat-penjualan', ['trxs' => $trxs]);
    }
}
 