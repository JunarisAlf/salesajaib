<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('admin.profil.lihat', ['user' => $user]);
    }
    public function edit(){
        $user = Auth::user();
        return view('admin.profil.edit', ['user' => $user]);
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
        return redirect()->route('admin.profile.index')->with('success', 'Data berhasil di update');
    }

    public function updatePictView(){
        $pict = Auth::user()->profile_filename;
        return view('admin.profil.update-foto', ['pict' => $pict]);
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
        return redirect()->route('admin.loginView')->with('success', 'Password berhasil dirubah, silahkan login kembali!');
    }
}
