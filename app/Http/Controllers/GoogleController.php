<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $validator = Validator::make([
                'nama' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
            ], 
            [
                'nama' => 'required',
                'email'=>"required|email",
                "google_id"=> "required",
            ]);

            $user = User::where('google_id', $googleUser->id)->first();

            
            if($user){
               Auth::login($user);
               return redirect("/");
            }else{

                $users = User::where('email', $googleUser->email);
                if ($validator -> fails()){
                    return redirect("register")-> withErrors($validator)->withInput();
                }else if($users ){
                    Session::flash('error', 'Email ini sudah terdaftar, silahkan login dengan metode lain ');
                    return redirect("login");
                }

                    $newUser= User::create([
                     'nama' => $googleUser->name,
                     'email' => $googleUser->email,
                     'password' => Hash::make('afeksiusergoogle'),
                     'google_id' => $googleUser->id,
                     'email_verified_at' => now()
                 ]);

                }

             Auth::login($newUser, true);
             session()->regenerate();
             return redirect("/");

            
        }catch (\Exception $e) {
                return redirect()->route('login');
            }
    
        }    
}
