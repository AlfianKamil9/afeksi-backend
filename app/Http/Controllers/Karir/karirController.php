<?php

namespace App\Http\Controllers\Karir;

use App\Http\Controllers\Controller;
use App\Models\internshipPosition;
use Illuminate\Http\Request;

class karirController extends Controller
{
    public function index () {
        $data = internshipPosition::all();
        return view('pages.karir', compact('data'));
    }
}
