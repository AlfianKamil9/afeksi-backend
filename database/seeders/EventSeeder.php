<?php

namespace Database\Seeders;

use App\Models\Event;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        [
            '2',
            'Title Campaign Psikologi 1',
            'OFFLINE',
            'PAID',
            '2023-07-10',
            '2023-07-17',
            '2023-07-20',
            '16:00',
            '19:00',
            'TEST.PNG',
            '150000',
            'TEST DESKRIPSI',
            'DRAFT',
            'title-campaign-psikologi'
        ],
        [
                '1',
                'Title Webinar Psikologi 1',
                'ONLINE',
                'FREE',
                '2023-07-06',
                '2023-07-10',
                '2023-07-21',
                '16:00',
                '19:00',
                'TEST.PNG',
                NULL,
                'TEST DESKRIPSI',
                'DRAFT',
                'title-campaign-psikologi'
        ]
    ];


        for ($i=0; $i < 2 ; $i++) { 
             Event::create([
            'category_event_id' => $data[$i][0],
            'title_event' => $data[$i][1],
            'slug_event'=> $data[$i][13],
            'time_category_event' => $data[$i][2],
            'pay_category_event' => $data[$i][3],
            'registration_start' => $data[$i][4],
            'registration_end' => $data[$i][5],
            'date_event' => $data[$i][6],
            'time_start' => $data[$i][7],
            'time_finish' => $data[$i][8],
            'cover_event' => $data[$i][9],
            'price_event'=> $data[$i][10],
            'description_event' => $data[$i][11],
            'status_event' => $data[$i][12]
        ]);
        }

        
    }
}
