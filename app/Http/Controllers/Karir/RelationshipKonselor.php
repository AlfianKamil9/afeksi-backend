<?php

namespace App\Http\Controllers\Karir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Konselor;

class RelationshipKonselor extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.detail-pendaftaran-relationship');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        // ddd($request);
        $validatedData = $request->validate([
            'pekerjaan' => 'required',
            'instansi' => 'required',
            'divisi' => 'required',
            'alasan' => 'required',
            'bukti_follow' => 'required|image',
            'cv' => 'required',
            'portofolio'
        ]);
        if ($request->file('cv')) {
            $validatedData['cv'] = $request->file('cv')->store('pdf');
        }
        if ($request->file('bukti_follow')) {
            $validatedData['bukti_follow'] = $request->file('bukti_follow')->store('img');
        }
        if ($request->file('portofolio')) {
            $validatedData['portofolio'] = $request->file('portofolio')->store('pdf');
        }
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['email'] = Auth::user()->email;
        $validatedData['namaLengkap'] = Auth::user()->nama;
        $validatedData['jenisKelamin'] = Auth::user()->jenisKelamin;
        $validatedData['noHP'] = Auth::user()->no_whatsapp;
        Konselor::create($validatedData);
        return redirect('/pendaftaran-relationship-konselor');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
