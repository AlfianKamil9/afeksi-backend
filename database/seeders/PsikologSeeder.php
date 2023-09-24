<?php

namespace Database\Seeders;

use App\Models\Psikolog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PsikologSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
                [
                    "nama" => "Heraldha Savira, Dip. ABRSM, S.Psi",
                    "profil" => "Clinical Physcology Grads",
                    "avatar" => "heralda.png"
                ],
                [
                    "nama" => "Christy MS",
                    "profil" => "Growth Mindset and Relationship Mentor",
                    "avatar" => "christy.png"
                ],
                [
                    "nama" => "Elni Nainggolan",
                    "profil" => "Sadar Sejak Dini Indonesia",
                    "avatar" => "elni.png"
                ],
                [
                    "nama" => "Nindy Rahmatul Asro S.Psi",
                    "profil" => "Counselor @utara.sc and Professional Public Speaker",
                    "avatar" => "nindy.png"
                ],
                [
                    "nama" => "Devina Faustanisa Nursyah Wibowo",
                    "profil" => "TED x BU 2021 & Speaker and LPDP Awardee at Harvard University",
                    "avatar" => "devina.png"
                ]
            ];

        for ($i=0; $i < 5 ; $i++) { 
            Psikolog::create([
                "nama_psikolog" => $data[$i]["nama"],
                "profil" => $data[$i]["profil"],
                "avatar" => $data[$i]["avatar"]
            ]);
        }
    }
}
