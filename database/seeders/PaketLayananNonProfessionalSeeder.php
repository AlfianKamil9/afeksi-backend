<?php

namespace Database\Seeders;

use App\Models\PaketLayananNonProfessional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketLayananNonProfessionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paket = [
            [
                'layanan_nonProfessionals_id' => 1,
                'nama_paket' => 'Paket Dasar',
                'harga' => '100000'
            ],
            [
                'layanan_nonProfessionals_id' => 1,
                'nama_paket' => 'Paket Premium',
                'harga' => '150000'
            ],
            [
                'layanan_nonProfessionals_id' => 1,
                'nama_paket' => 'Paket Platinum',
                'harga' => '200000'
            ],
            [
                'layanan_nonProfessionals_id' => 2,
                'nama_paket' => 'Paket Dasar',
                'harga' => '100000'
            ],
            [
                'layanan_nonProfessionals_id' => 2,
                'nama_paket' => 'Paket Premium',
                'harga' => '150000'
            ],
            [
                'layanan_nonProfessionals_id' => 2,
                'nama_paket' => 'Paket Platinum',
                'harga' => '200000'
            ],
            [
                'layanan_nonProfessionals_id' => 3,
                'nama_paket' => 'Paket Dasar',
                'harga' => '100000'
            ],
            [
                'layanan_nonProfessionals_id' => 3,
                'nama_paket' => 'Paket Premium',
                'harga' => '150000'
            ],
            [
                'layanan_nonProfessionals_id' => 3,
                'nama_paket' => 'Paket Platinum',
                'harga' => '200000'
            ],
        ];
        foreach ($paket as $data) {
            PaketLayananNonProfessional::create($data);
        }
    }
}
