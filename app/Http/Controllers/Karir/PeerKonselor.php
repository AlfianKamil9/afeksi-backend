<?php

namespace App\Http\Controllers\Karir;

use App\Models\User;
use App\Models\Konselor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PeerKonselor extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.detail-pendaftaran-peer');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'pekerjaan' => 'required',
            'nohp' => 'required',
            'instansi' => 'required',
            'divisi' => 'required',
            'alasan' => 'required',
            'bukti_follow' => 'required|file|max:2048',
            'cv' => 'required|file|max:10240',
            'portofolio' => 'nullable|file|max:10240',
        ]);

        $user = auth()->user();
        $nohp = $user->no_whatsapp ?: $request->input('nohp');
        $jenisKelamin = $user->jenisKelamin ?: $request->input('jenisKelamin');

        $buktiFollowPath = $validatedData['bukti_follow']->store('konselor/peer/bukti_follow', 'public');
        $cvPath = $validatedData['cv']->store('konselor/peer/cv', 'public');

        $portofolioPath = null;
        if ($request->hasFile('portofolio')) {
            $portofolioPath = $validatedData['portofolio']->store('konselor/peer/portofolio', 'public');
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
            'type' => 'peer', //Peer Konselor
        ];

        $user_update =[
            'no_whatsapp' => $nohp,
            'jenisKelamin' => $jenisKelamin,
        ];

        User::where('id', $user->id)->update($user_update);
        Konselor::create($konselorData);

        Alert::alert()->html('<img src="/assets/img/image-notification.png" height="150px" />',"Terima Kasih <br> Formulir pendaftaran Anda berhasil dikirim")->persistent(true,false)->showConfirmButton('Kembali', '#3085d6');
        return redirect()->route('pendaftaran-peer-konselor');
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