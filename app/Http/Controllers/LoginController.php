<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\AuthResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user= User::where('email', $request->email)->first();
        
            if (!$user || !Hash::check($request->password, $user->password)) {
                return (new AuthResource(false, 'Email atau password salah', null))
                    ->response()
                    ->setStatusCode(401);
            }

            // Revoke any existing tokens for the user
            $user->tokens()->delete();
        
            $token = $user->createToken('ApiToken')->plainTextToken;
        
            return new AuthResource(true, 'Sukses login', $token);
    }
    
    /**
     * logout
     *
     * @return void
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        Auth::guard('web')->logout();

        return new AuthResource(true, 'Berhasil logout', null);
    }

}
