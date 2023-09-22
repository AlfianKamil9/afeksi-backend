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
            'nama' => "Najwa Shihab S.Psi.", 
            'pendidikan' => "Sarjana ITB", 
            'avatar' => "alex.png", 
            'profile' => "test", 
            'deskripsi' => "test"
        ]);

        PsikologMentoring::create([
            'nama' => "Maudy Ayunda S.Psi.", 
            'pendidikan' => "Sarjana ITS", 
            'avatar' => "alex.png", 
            'profile' => "test", 
            'deskripsi' => "test"
        ]);

        PsikologMentoring::create([
            'nama' => "Billie Elish S.Psi.", 
            'pendidikan' => "Sarjana UM", 
            'avatar' => "alex.png", 
            'profile' => "test", 
            'deskripsi' => "test"
        ]);
        
        PsikologMentoring::create([
            'nama' => "Taylor Swift S.Psi.", 
            'pendidikan' => "Sarjana UNS", 
            'avatar' => "alex.png", 
            'profile' => "test", 
            'deskripsi' => "test"
        ]);
    }
}
