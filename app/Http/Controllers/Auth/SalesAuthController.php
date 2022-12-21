<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesAuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'noWa' => 'required|unique:App\Models\User,no_wa',
            'fullName' => 'required',
            'password' => 'required|confirmed|min:6',
            'email' => 'required|email|unique:App\Models\User,email'
        ]);
        User::create([
            'no_wa' => $request->input('noWa'),
            'full_name' => $request->input('fullName'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role' => 'sales',
            'profile_filename' => 'default_profile.jpeg'
        ]);
         return redirect()->route('sales.loginView')->with('success', 'Akun berhasil dibuat, silahkan login!');
    }

    public function login(Request $request){
        $request->validate([
            'noWa' => 'required',
            'password' => 'required',
        ]);
        $credentials = [
            'no_wa' => $request->input('noWa'),
            'password' => $request->input('password')
        ];
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $msg = 'Selamat datang, ' . $user->full_name . '!';
            return redirect()->route('sales.dashboard')->with('success', $msg);
        }
        return back()->withInput()->with('error', 'No WA atau password yang anda masukan salah, coba lagi!');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('sales.loginView');
    }
}
