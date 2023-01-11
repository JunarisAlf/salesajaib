<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class SalesAuthController extends Controller
{
    
    public function register(Request $request){
        $request->validate([
            'noWa' => 'required|unique:App\Models\User,no_wa',
            'fullName' => 'required',
            'password' => 'required|confirmed|min:6',
            'email' => 'required|email|unique:App\Models\User,email'
        ]);
        $otp = random_int(100000, 999999);
        $user = User::create([
            'no_wa' => $request->input('noWa'),
            'full_name' => $request->input('fullName'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role' => 'sales',
            'otp' => $otp,
            'profile_filename' => 'default_profile.jpeg'
        ]);
        Auth::loginUsingId($user->id);
        // send email

        return redirect()->route('sales.verifyView');
    }
    public function verify(Request $request){
        $otp = Auth::user()->otp;
        $input_otp = $request->input('otp');
        if($otp == $input_otp){
            $user = Auth::user();
            $user->is_verified = true;
            $user->save();
            return redirect()->route('sales.dashboard')->with('success', 'Akun berhasil diverifikasi!');
        }else{
            return back()->withInput()->with('error', 'Kode OTP yang anda masukan salah');
        }
    }
    public function verifyUpdate(Request $request){
        $user = Auth::user();
        $request->validate([
            'noWa' => ['required', Rule::unique('users', 'no_wa')->ignore($user->id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
        ]);
        $user->no_wa = $request->input('noWa');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->route('sales.verifyView')->with('success', 'Nomor Whatsapp dan Emal berhasil di ubah');

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
            if(!$user->is_verified){
                return back()->withInput()->with('error', 'Anda anda belum terverifikasi!');
            }
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
