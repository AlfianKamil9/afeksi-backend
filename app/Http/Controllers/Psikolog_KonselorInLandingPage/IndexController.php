<?php

namespace App\Http\Controllers\Psikolog_KonselorInLandingPage;

use App\Models\Konselor;
use App\Models\Psikolog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
  
    public function showAllKonselor() {
        $data = Konselor::with('topic')->get();
        return view('pages.konselor', compact('data'));
    }
}
