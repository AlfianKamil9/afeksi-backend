<?php

namespace Database\Seeders;

use App\Models\Konselor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KonselorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Konselor::create([
            'nama' => "Alex Cruis", 
            'pendidikan' => "Sarjana ITB", 
            'avatar' => "alex.png", 
            'profile' => "test", 
            'deskripsi' => "test"
        ]);

         Konselor::create([
            'nama' => "Cania Cruis", 
            'pendidikan' => "Sarjana ITS", 
            'avatar' => "alex.png", 
            'profile' => "test", 
            'deskripsi' => "test"
        ]);

    }
}