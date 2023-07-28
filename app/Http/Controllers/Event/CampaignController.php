<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Event::with('event_categories')
            ->where('activity_category_event', 'CAMPAIGN')
            ->get();

        foreach ($data as $event) {
            $event->time_start = Carbon::parse($event->time_start)->format('H:i');
            $event->time_finish = Carbon::parse($event->time_finish)->format('H:i');
            $event->date_event = Carbon::parse($event->date_event)->format('d F Y');
        }
        
        return view('pages.kegiatan-campaign', [
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $data = Event::with(['event_categories'])
        ->where('slug_event' , $slug)
        ->firstOrFail();

            $data->time_start = Carbon::parse($data->time_start)->format('H:i');
            $data->time_finish = Carbon::parse($data->time_finish)->format('H:i');
            $data->date_event = Carbon::parse($data->date_event)->format('d F Y');
        return view('pages.detail-campaign',[
            'data' => $data
        ]);
    }

   
}
