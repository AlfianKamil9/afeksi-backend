<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function showDashboardProfile() {
        return view('pages.dashboard-profile');
    }

    public function processChanges(Request $request) {
        $validate = Validator::make($request->all(), [
            "nama" => "required",
            "email" => "required|email:dns",
            "tgl_lahir" => "required",
            "no_whatsapp" => "required",
            "pekerjaan" => "required",
            "jenisKelamin" => "required",
            "domisili" => "required",
            "institusi" => "required"
        ]);
        if ($validate -> fails()) {
            return back()->with('error', $validate->messages());
        }
        User::where('id', auth()->user()->id)->update([
            'nama' => $request->nama,
            'email' =>$request->email,
            'tgl_lahir' => $request->tgl_lahir,
            'no_whatsapp' => $request->no_whatsapp,
            'domisili' => $request->domisili,
            'pekerjaan' => $request->pekerjaan,
            'jenisKelamin' => $request->jenisKelamin,
            'institusi' => $request->institusi, 
        ]);
        return back()->with('success', "Sukses Update Profile");
    }

    public function showUbahPassword() {
        return view('pages.ubah-password');
    }

    public function processChangePassword(Request $request) {
        $validate = Validator::make($request->all(), [
            "oldPassword" => "required",
            "newPassword" => "required",
            "confirmNewPassword" => ['required', 'max:32', 'password_no_number_first' ,'confirmed', Password::defaults()],
        ]);
        if ($validate->fails()) {
             return response()->json([
                'message' => 'validasi gagal '
            ]);
            //return back()->with('error', $validate->messages());
        }

        if (!Auth::attempt(['email' => auth()->user()->email,'password' => $request->oldPassword])) {
             return response()->json([
                'message' => 'password lama salah'
            ]);
            //return back()->with('error', $validate->messages());
        }

        if ($request->newPassword != $request->confirmNewPassword) {
            return response()->json([
                'message' => 'password tidak sama'
            ]);
            //return back()->with('error', "New password and password confirmation must be same");
        }

        User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($request->confirmNewPassword),
        ]);
        return response()->json([
            'message' => 'berhasil'
        ]);
        //return redirect()->route('dashboard.profile.index')->with('success', 'Success update Password');

    }
    
    public function showUbahFoto() {
        return view('pages.ubah-foto-profile');
    }
}
