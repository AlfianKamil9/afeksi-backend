<?php

namespace App\Http\Controllers\Mentoring;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PembayaranLayanan;
use App\Http\Controllers\Controller;
use App\Models\LayananNonProfessional;
use App\Models\PaketLayananNonProfessional;

class MentoringController extends Controller
{
    public function showPreMarriage() {
        $slug = LayananNonProfessional::where('id', 2)->pluck('slug')->first();
        return view('pages.LayananMentoring.pre-marriage', compact('slug'));
    }

    public function showRelationship() {
        $slug = LayananNonProfessional::where('id', 3)->pluck('slug')->first();
        return view('pages.LayananMentoring.relationship-konseling', compact('slug'));
    }

     public function showParenting() {
        $slug = LayananNonProfessional::where('id', 1)->pluck('slug')->first();
        return view('pages.LayananMentoring.parenting-mentoring', compact('slug'));
    }

     public function showPaketMentoring($slug_item_mentoring) {
        $id = LayananNonProfessional::where('slug', $slug_item_mentoring)->pluck('id')->firstOrFail();
        $data = PaketLayananNonProfessional::where('layanan_nonProfessionals_id', $id)->get();
       return view('pages.LayananMentoring.paket-sementara', compact('data'));
    }

    public function savePaketYangDipilih (Request $request) {
        $ref = 'DEV-'.strtoupper(Str::random(5)).Carbon::now()->format('dmYHis');
        PembayaranLayanan::create([
            'user_id' => auth()->user()->id, 
            'ref_transaction_layanan' => $ref, 
            'status' => 'UNPAID',
            'paket_layanan_non_professional_id' => $request->id_paket
        ]);
        
        return redirect('/mentoring/'.$ref.'/data-diri');
    }
}
