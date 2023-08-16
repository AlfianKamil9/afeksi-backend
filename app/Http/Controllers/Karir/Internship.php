<?php

namespace App\Http\Controllers\Karir;

use App\Http\Controllers\Controller;
use App\Models\internship_registration;
use App\Models\internshipPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Internship extends Controller
{
    public function index() {
        // 
    }

    public function show($slug) {
        $data = internshipPosition::where('slug' , $slug)->first();
        return view('pages.internship-detail', compact('data'));
    }

    public function store( Request $request){
        // dd($request->all());

        $request->validate([
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

        
        $buktiFollow = $request ->bukti_follow ->getClientOriginalName();
        $request ->bukti_follow->move(public_path('storage/internship/bukti_follow'), $buktiFollow);

        $lampiran_CV = $request ->cv ->getClientOriginalName();
        $request ->cv->move(public_path('storage/internship/cv'), $lampiran_CV);

        $lampiran_portofolio = $request ->portofolio ->getClientOriginalName();
        $request ->portofolio->move(public_path('storage/internship/portofolio'), $lampiran_portofolio);

        // $status = "SUDAH DAFTAR";
        // dd($request-> buktiFollow);
        $data= internship_registration::create([
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
            "bukti_follow"=>$buktiFollow,
            "cv"=>$lampiran_CV,
            "portofolio"=>$lampiran_portofolio,




        ]);
        
        if ($data) {
            return "data masuk" ;
        }
        
        // return redirect("/karir");
        return "data tidak berhasil masuk";        
    }
}
