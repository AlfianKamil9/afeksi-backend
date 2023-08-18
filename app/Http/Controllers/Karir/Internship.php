<?php

namespace App\Http\Controllers\Karir;

use App\Http\Controllers\Controller;
use App\Models\internshipPosition;
use App\Models\internship_registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store( Request $request){
        // dd($request->all());

        $validatedData = $request->validate([
        // 'user_id' => "required", INI PENYEBAB ERROR 
        'position_id'=> "required",
        "status"=>"nullable",
        'asal_daerah'=> "required",
        'semester'=> "required",
        'jurusan'=> "required",
        'universitas'=> "required",
        'alasan'=> "required",
        'kelebihan'=> "required",
        'kekurangan'=> "required",
        'harapan'=> "required",
        'one_description'=> "required",
        'bukti_follow'=> 'required|mimes:jpeg,jpg,png',
        'cv'=> "required|file|max:10240",
        'portofolio' => 'nullable|file|max:10240'
        ]);

        $buktiFollowPath = $validatedData['bukti_follow']->store('konselor/relationship/bukti_follow', 'public');
        $cvPath = $validatedData['cv']->store('konselor/relationship/cv', 'public');
        $portofolioPath = null;
        if ($request->hasFile('portofolio')) {
            $portofolioPath = $validatedData['portofolio']->store('konselor/relationship/portofolio', 'public');
        }
        // $status = "SUDAH DAFTAR";
        // dd($request-> buktiFollow);

         internship_registration::create([


            "user_id"=>Auth::user()->id,
            "status"=>$request->status,
            "position_id"=>$request->position_id,
            "asal_daerah"=>$request->asal_daerah,
            "semester"=>$request->semester,
            "jurusan"=>$request->jurusan,
            "universitas"=>$request->universitas,
            "alasan"=>$request->alasan,
            "kelebihan"=>$request->kelebihan,
            "kekurangan"=>$request->kekurangan,
            "harapan"=>$request->harapan,
            "one_description"=>$request->one_description,
            "bukti_follow"=>$buktiFollowPath,
            "cv"=>$cvPath,
            "portofolio"=>$portofolioPath,
        ]);
        
        
        return redirect('/karir')->with('success', 'Register Internship data has been submitted.');

    }
}
