<?php

namespace App\Http\Controllers\Karir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandAmbasador extends Controller
{
     public function index() {
        return view('pages.detail-pendaftaran-brand-ambassador');
    }

    public function store(Request $request) {
        //
    }
}
