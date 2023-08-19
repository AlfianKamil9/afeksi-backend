<?php

namespace App\Http\Controllers\Karir;

use App\Models\User;
use App\Models\Konselor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        //dd($request->all());
        $validatedData = $request->validate([
            'pekerjaan' => 'required',
            'nohp' => 'required',
            'instansi' => 'required',
            'divisi' => 'required',
            'alasan' => 'required',
            'bukti_follow' => 'required|file|max:10240', // Max size 2MB
            'cv' => 'required|file|max:10240', // Max size 2MB
            'portofolio' => 'nullable|file|max:10240', // Max size 2MB
        ]);
        // if ($request->file('cv')) {
        //     $validatedData['cv'] = $request->file('cv')->store('pdf');
        // }
        // if ($request->file('bukti_follow')) {
        //     $validatedData['bukti_follow'] = $request->file('bukti_follow')->store('img');
        // }
        // if ($request->file('portofolio')) {
        //     $validatedData['portofolio'] = $request->file('portofolio')->store('pdf');
        // }

        $user = auth()->user();
        $nohp = $user->no_whatsapp ?: $request->input('nohp');
        $jenisKelamin = $user->jenisKelamin ?: $request->input('jenisKelamin');

        $buktiFollowPath = $validatedData['bukti_follow']->store('konselor/relationship/bukti_follow', 'public');
        $cvPath = $validatedData['cv']->store('konselor/relationship/cv', 'public'); 

        $portofolioPath = null;
        if ($request->hasFile('portofolio')) {
            $portofolioPath = $validatedData['portofolio']->store('konselor/relationship/portofolio', 'public');
        }

        $konselorData = [
            'user_id' => $user->id,
            'nohp' => $nohp,
            'jenisKelamin' => $jenisKelamin,
            'pekerjaan' => $validatedData['pekerjaan'],
            'instansi' => $validatedData['instansi'],
            'divisi' => $validatedData['divisi'],
            'alasan' => $validatedData['alasan'],
            'bukti_follow' => $buktiFollowPath,
            'cv' => $cvPath,
            'portofolio' => $portofolioPath,
            'type' => 'relationship', // Relationship Konselor
        ];
        $user_update =[
            'no_whatsapp' => $nohp,
            'jenisKelamin' => $jenisKelamin,
        ];

        User::where('id', $user->id)->update($user_update);
        Konselor::create($konselorData);
        return redirect('/pendaftaran-relationship-konselor')->with('success', 'Register Relationship Konselor data has been submitted.');
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
