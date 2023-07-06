<?php

namespace Database\Seeders;

use App\Models\EventCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryEvent = ['Webinar' , 'Campaign'];

        foreach ($categoryEvent as $value) {
            EventCategory::create([
                'category_event_name' => $value
            ]);
        }
    }
}
