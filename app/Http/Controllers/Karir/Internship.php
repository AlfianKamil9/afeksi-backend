<?php

namespace App\Http\Controllers\Karir;

use Illuminate\Http\Request;
use App\Models\internshipPosition;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\internship_registration;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class Internship extends Controller
{
    public function index() {
        // 
    }

    public function show($slug) {
        $data = internshipPosition::where('slug' , $slug)->firstOrFail();
        return view('pages.internship-detail', compact('data'));
    }

    public function store( Request $request){

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
        'bukti_follow'=> 'required|mimes:jpeg,jpg,png|max:2048',
        'cv'=> "required|file|max:10240",
        'portofolio' => 'nullable|file|mimes:pdf|max:10240'
        ]);
        

        $buktiFollowPath = $validatedData['bukti_follow']->store('internship/bukti_follow', 'public');
        $cvPath = $validatedData['cv']->store('internship/cv', 'public');
        $portofolioPath = null;
        if ($request->hasFile('portofolio')) {
            $portofolioPath = $validatedData['portofolio']->store('internship/portofolio', 'public');
        }

        internship_registration::create([
            "user_id"=> Auth::user()->id,
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

        $slug = internshipPosition::where('id' , $request->position_id)->pluck('slug')->first();  
         Alert::alert()->html('<img src="/assets/img/image-notification.png" height="150px" />',"Terima Kasih <br> Formulir pendaftaran Anda berhasil dikirim")->persistent(true,false)->showConfirmButton('Kembali', '#3085d6');
        return redirect()->back();

    }
}
