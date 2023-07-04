<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthResource;
use App\Models\User;
use Illuminate\Http\Request;
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
        
            $token = $user->createToken('ApiToken')->plainTextToken;
        
            return new AuthResource(false, 'Sukses login', $token);
    }
    
    /**
     * logout
     *
     * @return void
     */
    public function logout()
    {
        auth()->logout();
        return new AuthResource(true, 'Berhasil logout', null);
    }

}
