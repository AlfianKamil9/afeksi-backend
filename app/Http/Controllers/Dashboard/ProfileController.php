<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showUbahPassword() {
        return view('pages.ubah-password');
    }
    
    public function showUbahFoto() {
        return view('pages.ubah-foto-profile');
    }
}
