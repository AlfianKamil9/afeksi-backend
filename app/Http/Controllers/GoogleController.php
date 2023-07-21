<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
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
            $user = User::where('email', $googleUser->email)->first();

            if($user){
               return 'test';
            }else{
                User::create([
                    'nama' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => Hash::make('afeksiusergoogle'),
                    'google_id' => $googleUser->id,
                    'email_verified_at' => now()
                ]);
                Auth::login($user, true);
                session()->regenerate();
                return redirect(RouteServiceProvider::HOME);
            }
        }
        catch (\Exception $e) {
                return redirect()->route('login');
            }
    }
}
