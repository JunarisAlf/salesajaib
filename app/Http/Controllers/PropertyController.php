<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller{
    public function index(Request $request){
        $properties = DB::table('properties')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.properti.lihat-semua-properti', ['properties' => $properties]);
    }
    public function showOne(Request $request, Property $prop){
        return view('customer.properti', ['prop' => $prop]);
        // dd($prop);
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'baner' => 'required|mimes:jpg,png,jpeg|max:2048'
        ]);

        $filepath = $request->file('baner')->store('public');
        $filename = explode( '/', $filepath);
        $filename = $filename[1];

        Property::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'status' => 'available',
            'baner_filename' => $filename,
        ]);

        return redirect()->route('admin.createProperty')->with('success', 'Berhasil menambahkan properti');
    }

}
