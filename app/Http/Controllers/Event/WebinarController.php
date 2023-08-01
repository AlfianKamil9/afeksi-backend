<?php

namespace App\Http\Controllers\Event;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class WebinarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Event::with('webinar_session.pembicara')
        ->where('activity_category_event', 'WEBINAR')->orderBy('date_event', 'desc');

        // $query = Event::query()
        // ->with('webinar_session.pembicara')
        // ->where('activity_category_event', 'WEBINAR');


        // Filter using input type text
        if ($request->has('input_search')) {
            $query->where('title_event', 'like', '%' . $request->input('input_search') . '%');
        }

        // Filter by date using dropdown
        $dateFilter = $request->input('sort_date');
        if ($dateFilter === 'latest') {
            $query->orderBy('date_event', 'desc');
        } elseif ($dateFilter === 'oldest') {
            $query->orderBy('date_event', 'asc');
        }

        // Filter by minimum and maximum price using input fields
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        if ($minPrice !== null) {
            $query->where('price_event', '>=', $minPrice);
        }
        if ($maxPrice !== null) {
            $query->where('price_event', '<=', $maxPrice);
        }

        // filter by category_event_id using checkbox
        if ($request->has('category_event_id')) {
            $query->where('category_event_id', $request->input('category_event_id'));
        }

        // filter by time_category_event using checkbox
        if ($request->has('time_category_event')) {
            $query->where('time_category_event', $request->input('time_category_event'));
        }

        // filter by pay_category_event using checkbox
        if ($request->has('pay_category_event')) {
            $query->where('pay_category_event', $request->input('pay_category_event'));
        }

        $data = $query->get();
        //dd($data);

        foreach ($data as $event) {
            $event->time_start = Carbon::parse($event->time_start)->format('H:i');
            $event->time_finish = Carbon::parse($event->time_finish)->format('H:i');
            $event->date_event = Carbon::parse($event->date_event)->format('d F Y');
            // dd($event->time_start, $event->time_finish, $event->date_event);
        }

        // dd($data);
        return view('pages.kegiatan-webinar', [
            'data' => $data,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
// <<<<<<< HEAD
//         // $data = EventMaterialSession::query()
//         // ->with(['pembicara'])
//         // ->join('events', 'event_material_sessions.event_id', '=', 'events.id')
//         // ->where('events.slug_event', $slug)
//         // ->firstOrFail();

        $data = Event::with('webinar_session.pembicara')
        ->where('events.slug_event', $slug)
        ->firstOrFail();

        $data->time_start = Carbon::parse($data->time_start)->format('H:i');
        $data->time_finish = Carbon::parse($data->time_finish)->format('H:i');
        $data->date_event = Carbon::parse($data->date_event)->format('d F Y');

        // dd($data);
        return view('pages.detail-webinar',[
            'data' => $data
        ]);
    }
}