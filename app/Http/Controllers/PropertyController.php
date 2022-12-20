<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller{
    public function index(Request $request){
        $properties = Property::orderBy('created_at', 'desc')->paginate(10);
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
    public function destroy(Property $prop){
        $prop->delete();
        return back()->with('success', 'Data berhasil di hapus');
    }
    public function edit(Property $prop){
        // dd($prop->name);
        return view('admin.properti.edit', ['property' => $prop]);
    }
    public function update(Request $request, Property $prop){
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'status' => ['required', Rule::in(['available', 'sold'])]
        ]);
        $prop->name = $request->input('name');
        $prop->price = $request->input('price');
        $prop->status = $request->input('status');
        $prop->save();
        return redirect()->route('admin.showAllProperty')->with('success', 'Data berhasil di di Update');
    }
    public function updateBaner(Request $request, Property $prop){
        $request->validate([
            'baner' => 'required|mimes:jpg,png,jpeg|max:2048'
        ]);
        $filepath = $request->file('baner')->store('public');
        $filename = explode( '/', $filepath);
        $filename = $filename[1];
        
        $prop->baner_filename = $filename;
        $prop->save();
        return redirect()->route('admin.showAllProperty')->with('success', 'Berhasil menambahkan properti');
    }

}
