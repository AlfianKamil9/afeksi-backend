<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PsikologMentoring;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PsikologMentoringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PsikologMentoring::create([
            'nama' => "Najwa Shihab", 
            'pendidikan' => "Sarjana ITB", 
            'avatar' => "alex.png", 
            'profile' => "test", 
            'deskripsi' => "test"
        ]);

         PsikologMentoring::create([
            'nama' => "Maudy Ayunda", 
            'pendidikan' => "Sarjana ITS", 
            'avatar' => "alex.png", 
            'profile' => "test", 
            'deskripsi' => "test"
        ]);
    }
}
