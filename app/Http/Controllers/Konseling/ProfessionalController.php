<?php

namespace App\Http\Controllers\Konseling;

use App\Models\Konselor;
use App\Models\Psikolog;
use Illuminate\Http\Request;
use App\Models\konselorTopic;
use App\Http\Controllers\Controller;

class ProfessionalController extends Controller
{
  
    public function showAllKonselor(Request $request) {
        $kueri = Konselor::with('topic')->orderBy('id', 'desc');
        
        // Filter using input type text
        if ($request->has('input_search')) {
            $kueri->where('nama', 'like', '%' . $request->input('input_search') . '%');
        }

        // Filter by date using dropdown
        $dateFilter = $request->input('sort_date');
        if ($dateFilter === 'latest') {
            $kueri->orderBy('id', 'desc');
        } elseif ($dateFilter === 'oldest') {
            $kueri->orderBy('id', 'asc');
        }

        $data = $kueri->get();
         // filter by category_event_id using checkbox
        if ($request->has('topic')) {
                $kategori = $request->input('topic');
                $data = Konselor::whereHas('topic', function ($query) use ($kategori) {
                            $query->where('jenis_topic', 'like', "%$kategori%");
                        })->get();
        }

        //return response()->json($data);
        return view('pages.konselor', compact('data'));
    }
}
