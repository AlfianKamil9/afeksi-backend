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
    public function index(Request $request)
    {
        $data = Event::with('event_categories')
            ->where('activity_category_event', 'CAMPAIGN')
            ->get();

        $query = Event::query()->with('event_categories')->where('activity_category_event', 'CAMPAIGN');

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
        // Filter by category using checkbox
        if ($request->has('category')) {
            $query->whereHas('event_categories', function ($subquery) use ($request) {
                $subquery->where('category_event_name', 'like', '%' . $request->input('category') . '%');
            });
        }
        // filter by activity_category_event using checkbox
        if ($request->has('category_activity')) {
            $categoryActivity = strtoupper($request->input('category_activity'));
            $query->where('time_category_event', 'like', '%' . $categoryActivity . '%');
        }
    
        $datas = $query->get();

        foreach ($datas as $event) {
            $event->time_start = Carbon::parse($event->time_start)->format('H:i');
            $event->time_finish = Carbon::parse($event->time_finish)->format('H:i');
            $event->date_event = Carbon::parse($event->date_event)->format('d F Y');
        }
        
        return view('pages.kegiatan-campaign', [
            'data' => $datas
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
