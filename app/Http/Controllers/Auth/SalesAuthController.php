<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Mail\OtpMail;
use App\Mail\NewPasswordMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;



class SalesAuthController extends Controller
{
    
    public function register(Request $request){
        $request->validate([
            'noWa' => 'required|regex:/^62/|unique:App\Models\User,no_wa',
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
        Mail::to($user->email)->queue(new OtpMail(['otp' => $user->otp]));

        return redirect()->route('sales.verifyView');
    }
    public function verify(Request $request){
        $user = Auth::user();
        $otp = $user->otp;
        $input_otp = $request->input('otp');
        if($otp == $input_otp){
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
            'noWa' => ['required', 'regex:/^62/',Rule::unique('users', 'no_wa')->ignore($user->id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
        ]);
        $user->no_wa = $request->input('noWa');
        $user->email = $request->input('email');
        $user->save();
        Mail::to($user->email)->queue(new OtpMail(['otp' => $user->otp]));
        return redirect()->route('sales.verifyView')->with('success', 'Nomor Whatsapp dan Emal berhasil di ubah');

    }
    public function login(Request $request){
        $request->validate([
            'noWa' => 'required|regex:/^62/',
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

    public function forgot(Request $request){
        $request->validate([
            'identifier' => 'required|email'
        ]);
        $result = DB::table('users')
            ->where('email', '=', $request->input('identifier'))
            ->orWhere('no_wa', '=', $request->input('identifier'))
            ->exists();
        if($result){
            $otp = random_int(100000, 999999);
            DB::table('users')
                ->where('email', '=', $request->input('identifier'))
                ->orWhere('no_wa', '=', $request->input('identifier'))
                ->update(['otp' => $otp]);
            Mail::to($request->input('identifier'))->queue(new OtpMail(['otp' => $otp]));
            return redirect()->route('sales.forgotPwVerifyView', ['identifier' => $request->input('identifier')]);
        }
        return back()->withInput()->with('error', 'No WA atau Email tidak terdaftar');
    }
    public function sendOTP(Request $request){
        $request->validate([
            'identifier' => 'required|email'
        ]);
        $user = DB::table('users')
            ->where('email', '=', $request->input('identifier'))
            ->orWhere('no_wa', '=', $request->input('identifier'))
            ->first();
        $otp = $user->otp;
        Mail::to($request->input('identifier'))->queue(new OtpMail(['otp' => $otp]));
        return back()->withInput()->with('success', 'Kode OTP telah dikirim ulang');

    }

    public function forgotPwVerifyView(Request $request){
        $identifier = $request->input('identifier');
        $user = DB::table('users')
            ->where('email', '=', $identifier)
            ->orWhere('no_wa', '=', $identifier)
            ->first();
        return view('marketer.forgot-password-verify', ['email' => $user->email, 'no_wa' => $user->no_wa]);
    }
    public function forgotVerify(Request $request){
        $identifier = $request->input('email');
        $input_otp = $request->input('otp');
        $user = DB::table('users')
                    ->where('email', '=', $identifier)
                    ->orWhere('no_wa', '=', $identifier)
                    ->first();
        // i know this is suck!
        $list_pw = ['passwordbaru', 'passwordbaru2023', 'jayaselalu2023', 'gantipassword', 'passwordsementara'];
        $pw = $list_pw[rand(0,4)];
        if($input_otp == $user->otp){
            // make new password
            DB::table('users')
                ->where('email', '=', $identifier)
                ->orWhere('no_wa', '=', $identifier)
                ->update(['password' => Hash::make($pw)]);

            Mail::to($identifier)->queue(new NewPasswordMail(['password' => $pw, 'email' => $identifier]));
            return redirect()->route('sales.loginView')->with('success', 'Password baru anda sudah kami kirim melalui email!');
        }else{
            return back()->withInput()->with('error', 'Kode OTP yang anda masukan salah');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('sales.loginView');
    }
}
