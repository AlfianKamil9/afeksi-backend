<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\ForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use SebastianBergmann\Type\MixedType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class forgotPasswordController extends Controller
{
    public function showForgotPassword () {
         return view('pages.forgot-password');
    }
    

    public function sendForgotPassword (Request $request) {
        $now = Carbon::now();
        $validate = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->pluck('email')->first();
        
        if ($validate->fails()) {
            return redirect('/forgot-password')->with('error', 'Error, Please email must be inputed correctly');
        } else if (!$user) {
            return redirect('/forgot-password')->with('error', 'Error, Your email is Not Found');
        }
        // // CEK EMAIL YANG PERNAH RESET PASSWORD SEBELUMNYA APAKAH ADA DI TABLE
        // $cek = DB::table('password_reset_tokens')->where('email', $request->email)->first();
        // if ($cek) {      
            

        // }

            $token = Str::random(64);
            $sendEmail = DB::table('password_reset_tokens')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => $now
            ]);

            $get_user = DB::table('password_reset_tokens')->where('email', $request->email)->where('token', $token)->first();

            if ($sendEmail) {
                Mail::to($request->email)->send(new ForgotPassword($get_user));
                return redirect('/forgot-password')->with('success', 'Check your email to Reset Password');
            } else{
                return redirect('/forgot-password')->with('error', 'Error, Server cant send email now, try back later');
            }
        }


    public function showResetPassword ($token) {
            $token = $token;
            $token_db = DB::table('password_reset_tokens')->where('token', $token)->first();
            if (!$token_db) {
                return redirect('/forgot-password')->with('error', 'Error, Server cant send email now, try back later');
            }

            return view('pages.reset-password', compact('token'));
        }


    public function submitResetPassword (Request $request, $token) {
        $email = DB::table('password_reset_tokens')->where('token', $token)->pluck('email')->first();
        $awalan = substr($request->c_password, 0, 1);
        $after_awalan = substr($request->c_password, 1, 32);
        $angka = [0,1,2,3,4,5,6,7,8,9];
        $total_char = str::length($request->c_password);

        $rules = [
            'password' => ['required', 'min:8', 'max:32', Password:: min(8)->mixedCase()->numbers()],
            'c_password' => ['required', 'same:password']
        ];
        $validate = Validator::make($request->all(), $rules);

        // PENGKONDISIAN JIKA FIELD KOSONG
        if ($request->c_password == null || $request->password == null) {
            return redirect('/reset-password/'.$token)->with('error', 'The password and confirm password field cannot be null');
        } 
        // PENGKONDISIAN C_PASSWORD DAN PASSWORD HARUS SAMA
        if ($request->c_password != $request->password) {
            return redirect('/reset-password/'.$token)->with('error', 'The confirm password field must match password');
        } 
        // PENGKONDISIAN JUMLAH KARAKTER
        if ( $total_char < 8 || $total_char > 32 ) {
            return redirect('/reset-password/'.$token)->with('error', 'The password field must be 8 - 32 character');
        }
        // PENGKONSIAN AWAL KARAKTER
        if (Str::contains($awalan, $angka)) {
            return redirect('/reset-password/'.$token)->with('error', 'The first character cannot be a number');
        }
        // PENGKONSIAN SETELAH AWAL KARAKTER HARUS ADA ANGKA
        if (!Str::contains($after_awalan, $angka)) {
            return redirect('/reset-password/'.$token)->with('error', 'The password must contain at least one digit number');
        }
        // PENGKONDISIAN MIXEDCASE LOWERCASE DAN UPCASE
        if ($validate->fails()) {
            return redirect('/reset-password/'.$token)->with('error', $validate->messages());
        }
        
        $pass = Hash::make($request->c_password);
        $user = User::where('email', $email)->first();
        
        User::where('id', $user->id)->update([
            "password" => $pass
        ]);
        DB::table('password_reset_tokens')->where('token', $token)->delete();
        return redirect('/login')->with('success', 'sukses update');

    }

}


