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
            'Kampanye Kesehatan Mental 1.0',
            'OFFLINE',
            'FREE',
            '2023-07-10',
            '2023-07-17',
            '2023-07-20',
            '16:00',
            '19:00',
            'TEST.PNG',
            0,
            '
                <p style="text-align:justify;">Pengaderan mahasiswa baru Fakultas Psikologi UNAIR terbagi menjadi beberapa tahap. Salah satunya, tahap pembinaan kedua yang dilaksanakan 18-20 Oktober 2019. Dengan jargon “Lanjutkan langkah, siap berdinamika” pengaderan kali ini membawa sesuatu yang baru dan menarik. Meskipun telah terencana dari tahun lalu, namun ini pertama kalinya dilaksanakan kegiatan pengabdian masyarakat dengan melakukan kampanye mengenai kesehatan mental di Car Free Day Taman Bungkul Surabaya.</p>

                <p style="text-align:justify;">Mahasiswa baru diajak langsung terjun ke masyarakat, dipersiapkan secara berkelompok dan diberi tutor serta didampingi oleh dosen untuk membuat konsep kampanye yang akan dilakukannya. Tutoring ini dilaksanakan agar mereka dapat menyampaikan informasi dengan baik kepada masyarakat.</p>
            ',
            'DRAFT',
            'kampanye-kesehatan-mental-1.0',
            'CAMPAIGN',
            'Surabaya'
        ],
        [
                '1',
                'Self-Love: A Road to Relationship Goals',
                'ONLINE',
                'FREE',
                '2023-02-05',
                '2023-02-11',
                '2023-02-12',
                '09:30',
                '12:30',
                'TEST.PNG',
                0,
                'TEST DESKRIPSI',
                'DRAFT',
                'Self-Love:-A-Road-to-Relationship-Goals',
                'WEBINAR',
                'Zoom'
        ],
        [
                '2',
                'Love Your Self Bro',
                'ONLINE',
                'PAID',
                '2023-07-06',
                '2023-07-10',
                '2023-07-21',
                '16:00',
                '19:00',
                'TEST.PNG',
                150000,
                'TEST DESKRIPSI',
                'DRAFT',
                'love-your-self-bro',
                'WEBINAR',
                'Zoom'
        ],
        [
                '2',
                'Embracing Equality: A Pathway to Disolve Dating Violence',
                'ONLINE',
                'FREE',
                '2023-03-01',
                '2023-03-10',
                '2023-03-11',
                '09:30',
                '12:30',
                'WEBINAR-2.png',
                0,
                'TEST DESKRIPSI',
                'DRAFT',
                'Embracing-Equality:-A-Pathway-to-Disolve-Dating-Violence',
                'WEBINAR',
                'Zoom'
        ],
        [
                '6',
                'Cheating: The Downfall of a Healthy Relationship',
                'ONLINE',
                'FREE',
                '2023-07-29',
                '2023-08-04',
                '2023-08-05',
                '09:30',
                '12:30',
                'WEBINAR-3.PNG',
                0,
                '
                <p style="text-align:justify;">Kalian tau kan akhir - akhir ini banyak banget pemberitaan terkait kasus perselingkuhan ? Dalam suatu hubungan, selingkuh itu sangat fatal loh akibatnya. Hubungan akan hancur dan terjadi perpisahan.</p>

                <p style="text-align:justify;">Tapi kenapa yaa perselingkuhan bisa terjadi dan gimana yaa caranya untuk menjaga hubungan agar tidak terjadi perselingkuhan ?</p>

                <p style="text-align:justify;">Nah! Jawabannya akan kalian dapatkan di Afeksi webinar Series 3.0 yang mengusung tema “Cheating: The Downfall of a Healthy Relationship</p>
                ',
                'DRAFT',
                'Cheating:-The-Downfall-of-a-Healthy-Relationship',
                'WEBINAR',
                'Zoom'
        ],
        [
                '6',
                'Kampanye Keluarga Berencana 2.0',
                'ONLINE',
                'FREE',
                '2023-07-29',
                '2023-08-04',
                '2023-08-05',
                '09:30',
                '12:30',
                'TEST.PNG',
                0,
                '
                Pengertian KB (keluarga berencana) menurut UU No. 10 tahun 1992 (tentang perkembangan kependudukan dan pembangunan keluarga sejahtera), adalah upaya peningkatan kepedulian dan peran serta masyarakat melalui pendewasaan usia perkawinan (PUP), pengaturan kelahiran, pembinaan ketahanan keluarga, peningkatan kesejahteraan keluarga kecil, bahagia dan sejahtera. 

                KB merupakan program pemerintah yang dirancang untuk menyeimbangkan antara kebutuhan dan jumlah penduduk. Perlu kamu ketahui, Gerakan Keluarga Berencana Nasional Indonesia telah dianggap masyarakat dunia sebagai program yang berhasil menurunkan angka kelahiran yang bermakna. ',
                'DRAFT',
                'Kampanye-Keluarga-Berencana-2.0',
                'CAMPAIGN',
                'Zoom'
        ]
    ];


        for ($i=0; $i < 6 ; $i++) { 
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
            'status_event' => $data[$i][12],
            'activity_category_event' => $data[$i][14],
            'is_place' => $data[$i][15]
        ]);
        }

        
    }
}
