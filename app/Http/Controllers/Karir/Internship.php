<?php

namespace App\Http\Controllers\Karir;

use App\Http\Controllers\Controller;
use App\Models\internshipPosition;
use Illuminate\Http\Request;

class Internship extends Controller
{
    public function index() {
        // 
    }

    public function show($slug) {
        $detailPosisi = internshipPosition::all();
        $data = internshipPosition::where('slug' , $slug)->first();
        return view('pages.internship-detail', compact('data', 'detailPosisi'));
    }
}
