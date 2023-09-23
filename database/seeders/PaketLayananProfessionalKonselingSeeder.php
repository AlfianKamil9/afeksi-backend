<?php

namespace Database\Seeders;

use App\Models\PaketProfesionalConseling;
use App\Models\profresional_conseling;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketLayananProfessionalKonselingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paket = [
            [
                'nama_paket' => 'Sesi Konseling Individu',
                'professional_conseling_id' => 1,
                'harga' => 95000,
                'durasi' => 60,
                'jumlah_sesi' => 1,
                'deskripsi_singkat' => 'Durasi 60 Menit dengan Harga Rp.95.000',
                'deskripsi_paket' => '
                <ul>
                    <li>Sesi konseling individu dengan seorang konselor berlisensi.</li>
                    <li>Durasi: 60 menit.</li>
                    <li>Fokus pada pemahaman masalah pribadi yang memengaruhi hubungan.</li>
                </ul>
                '
            ],
            [
                'nama_paket' => 'Sesi Konseling Pasangan',
                'professional_conseling_id' => 1,
                'harga' => 175000,
                'jumlah_sesi' => 1,
                'durasi' => 75,
                'deskripsi_singkat' => 'Durasi 75 Menit dengan Harga Rp.175.000',
                'deskripsi_paket' => '
                <ul>
                    <li>Sesi konseling pasangan dengan seorang konselor berlisensi.</li>
                    <li>Durasi: 75 menit </li>
                    <li>Membantu pasangan dalam memecahkan konflik dan memperbaiki hubungan.</li>
                </ul>'
            ],
            [
                'nama_paket' => 'Sesi Kelompok Relationship Mahasiswa',
                'professional_conseling_id' => 1,
                'harga' => 60000,
                'jumlah_sesi' => 1,
                'durasi' => 90,
                'deskripsi_singkat' => 'Durasi 90 Menit dengan Harga Rp.60.000 per individu',
                'deskripsi_paket' => '
                <ul>
                    <li>Hanya Rp. 60.000 per peserta</li>
                    <li>Sesi konseling dalam kelompok dengan mahasiswa lain yang menghadapi masalah hubungan serupa.</li>
                    <li>Durasi: 90 menit </li>
                    <li>Diskusi terbuka dan berbagi pengalaman.</li>
                </ul>'
            ],
            [
                'nama_paket' => 'Paket Bulanan Relationship Mahasiswa',
                'professional_conseling_id' => 1,
                'jumlah_sesi' => 4,
                'harga' => 350000,
                'durasi' => 90,
                'deskripsi_singkat' => 'Durasi 90 Menit dengan Harga Rp.350.000',
                'deskripsi_paket' => '
                <ul>
                    <li>Akses ke 4 sesi Konseling Relationship selama sebulan (satu sesi per minggu).</li>
                    <li>Fleksibilitas untuk memilih sesi individu, sesi pasangan, atau sesi kelompok.</li>
                </ul>'
            ],
            [
                'nama_paket' => 'Sesi Konseling Individu',
                'professional_conseling_id' => 2,
                'harga' => 150000,
                'jumlah_sesi' => 1,
                'durasi' => 60,
                'deskripsi_singkat' => 'Durasi 60 Menit dengan Harga Rp.150.000',
                'deskripsi_paket' => '
                <ul>
                    <li>Sesi konseling individu dengan seorang konselor berlisensi yang berspesialisasi dalam isu kesetaraan gender.</li>
                    <li>Durasi: 60 menit.</li>
                    <li>Diskusi mendalam tentang peran gender dalam kehidupan individu.</li>
                </ul>
                '
            ],
            [
                'nama_paket' => 'Sesi Konseling Pasangan',
                'professional_conseling_id' => 2,
                'harga' => 250000,
                'jumlah_sesi' => 1,
                'durasi' => 75,
                'deskripsi_singkat' => 'Durasi 75 Menit dengan Harga Rp.250.000',
                'deskripsi_paket' => '
                <ul>
                    <li>Sesi konseling pasangan dengan seorang konselor berlisensi yang berpengalaman dalam mendukung hubungan yang seimbang dan setara.</li>
                    <li>Durasi: 75 menit.</li>
                    <li>Fokus pada pemahaman dan penerapan kesetaraan gender dalam hubungan.</li>
                </ul>
                '
            ],
            [
                'nama_paket' => 'Sesi Kelompok Kesetaraan Gender',
                'professional_conseling_id' => 2,
                'harga' => 75000,
                'jumlah_sesi' => 1,
                'durasi' => 90,
                'deskripsi_singkat' => 'Durasi 90 Menit dengan Harga Rp.75.000',
                'deskripsi_paket' => '
                <ul>
                    <li>Hanya Rp 75.000 per peserta</li>
                    <li>Sesi konseling dalam kelompok dengan peserta lain yang memiliki minat dalam isu kesetaraan gender.</li>
                    <li>Durasi: 90 menit.</li>
                    <li>Diskusi terbuka dan pembelajaran kolaboratif tentang kesetaraan gender</li>
                </ul>
                '
            ],
            [
                'nama_paket' => 'Paket Bulanan Kesetaraan Gender',
                'professional_conseling_id' => 2,
                'harga' => 400000,
                'jumlah_sesi' => 4,
                'durasi' => 60,
                'deskripsi_singkat' => 'Durasi 60 Menit dengan Harga Rp.400.000',
                'deskripsi_paket' => '
                <ul>
                    <li>Akses ke 4 sesi Konseling Kesetaraan Gender selama sebulan (satu sesi per minggu).</li>
                    <li>Fleksibilitas untuk memilih sesi individu, sesi pasangan, atau sesi kelompok</li>
                </ul>
                '
            ],

        ];
        foreach ($paket as $data) {
            PaketProfesionalConseling::create($data);
        }
    }
}
