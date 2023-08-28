<?php

namespace App\Http\Controllers\Karir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RelationshipHeroes extends Controller
{
    public function index() {
        return view('pages.detail-pendaftaran-relationship-heroes');
    }

    public function store(Request $request) {
        //
    }
}
