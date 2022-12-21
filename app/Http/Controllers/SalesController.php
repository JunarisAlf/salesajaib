<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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


    public function index(){
        $user = Auth::user();
        return view('marketer.profil.lihat', ['user' => $user]);
    }
    public function edit(){
        $user = Auth::user();
        return view('marketer.profil.edit', ['user' => $user]);
    }
    public function update(Request $request){
        $user_id = Auth::user()->id;
        $request->validate([
            'no_wa' => ['required', Rule::unique('users')->ignore($user_id)],
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user_id)],
        ]);
        $user = User::find($user_id);
        $user->no_wa = $request->input('no_wa');
        $user->full_name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->route('sales.profile.index')->with('success', 'Data berhasil di update');
    }

    public function updatePictView(){
        $pict = Auth::user()->profile_filename;
        return view('marketer.profil.update-foto', ['pict' => $pict]);
    }
    public function updatePict(Request $request){
        $request->validate([
            'pict' => 'required|mimes:jpg,png,jpeg|max:2048'
        ]);
        $filepath = $request->file('pict')->store('public');
        $filename = explode( '/', $filepath);
        $filename = $filename[1];
        $user = User::find(Auth::user()->id);
        $user->profile_filename = $filename;
        $user->save();

        return back()->with('success', 'Foto Profil berhasil di update');
    }

    public function updatePW(Request $request){
        $request->validate([
            'old_pw' => 'required', 
            'new_pw' => 'required|confirmed|min:6',
        ]);

        #Match The Old Password
        if(!Hash::check($request->input('old_pw'), auth()->user()->password)){
            return back()->with("error", "Password lama tidak cocok!");
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_pw)
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('sales.loginView')->with('success', 'Password berhasil dirubah, silahkan login kembali!');
    }
}
