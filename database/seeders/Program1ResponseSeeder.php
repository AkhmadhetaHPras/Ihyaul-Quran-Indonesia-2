<?php

namespace Database\Seeders;

use App\Models\Program1Response;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Program1ResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'participant_id' => 1,
                'infaq_id' => null,
                'batch_id' => 1,

                'a1' => true,
                'a2' => null,

                'b1' => false,
                'b2' => 'Ingin memantapkan lagi hafalan juz 30',

                'c1' => 'Online',
                'c2' => null,
                'c3' => '16:00-17:00',

                'resources' => 'MADRASAH QURAN OFFLINE',
                'motivation_target' => 'Ingin memahami Al Quran',
            ],
            [
                'participant_id' => 2,
                'infaq_id' => 1,
                'batch_id' => 1,

                'a1' => true,
                'a2' => null,

                'b1' => true,
                'b2' => 'Insyaallah siap',

                'c1' => 'Online',
                'c2' => null,
                'c3' => '18:30-19:30',

                'resources' => 'TEMAN',
                'motivation_target' => 'ingin mempelajari dan mengamalkan alquran',
            ],
            [
                'participant_id' => 3,
                'infaq_id' => null,
                'batch_id' => 1,

                'a1' => true,
                'a2' => null,

                'b1' => true,
                'b2' => 'Insyaallah siap',

                'c1' => 'Online',
                'c2' => null,
                'c3' => '20:00-21:00',

                'resources' => 'WA GRUP',
                'motivation_target' => 'ingin menghapal alquran supaya bisa menemani anak2 murojaah',
            ],
            [
                'participant_id' => 4,
                'infaq_id' => null,
                'batch_id' => 2,

                'a1' => false,
                'a2' => true,

                'b1' => false,
                'b2' => 'Ingin menambah hafalan',

                'c1' => 'Online',
                'c2' => null,
                'c3' => '20:00-21:00',

                'resources' => 'TEMAN',
                'motivation_target' => 'Hafal Quran dan maknanya',
            ],
            [
                'participant_id' => 5,
                'infaq_id' => null,
                'batch_id' => 2,

                'a1' => true,
                'a2' => null,

                'b1' => false,
                'b2' => 'Ingin menambah hafalan',

                'c1' => 'Online',
                'c2' => null,
                'c3' => '08:00-09:00',

                'resources' => 'WA GRUP',
                'motivation_target' => 'Agar lebih mantap lagi membaca Alquran',
            ],
            [
                'participant_id' => 6,
                'infaq_id' => 2,
                'batch_id' => 2,

                'a1' => true,
                'a2' => null,

                'b1' => false,
                'b2' => 'Ingin menambah hafalan',

                'c1' => 'Offline',
                'c2' => 'Araya',
                'c3' => '10:00-11:00',

                'resources' => 'MADRASAH QURAN OFFLINE',
                'motivation_target' => 'Ingin mempelajari Al Qur’an secara lengkap.. menghafal dan mentadaburi .. dan semoga bisa mengajarkan. Supaya bisa berinteraksi lebih dekat dengan al quran',
            ],
            [
                'participant_id' => 7,
                'infaq_id' => null,
                'batch_id' => 3,

                'a1' => true,
                'a2' => null,

                'b1' => false,
                'b2' => 'Ingin memantapkan lagi hafalan juz 30',

                'c1' => 'Offline',
                'c2' => 'Kantor Agung Wisata',
                'c3' => '20:00-21:00',

                'resources' => 'WA GRUP',
                'motivation_target' => 'Ingin menghafal Quran untuk mengajarkan kepada anak dan keluarga',
            ],
            [
                'participant_id' => 8,
                'infaq_id' => null,
                'batch_id' => 3,

                'a1' => true,
                'a2' => null,

                'b1' => false,
                'b2' => 'Ingin memantapkan lagi hafalan juz 30',

                'c1' => 'Offline',
                'c2' => 'Araya',
                'c3' => '16:00-17:00',

                'resources' => 'WA GRUP',
                'motivation_target' => 'Ingin hafal juz Amma dan bisa mengajarkan terutama untuk cucu',
            ],
            [
                'participant_id' => 9,
                'infaq_id' => null,
                'batch_id' => 3,

                'a1' => false,
                'a2' => true,

                'b1' => false,
                'b2' => 'Ingin memantapkan lagi hafalan juz 30',

                'c1' => 'Offline',
                'c2' => 'Araya',
                'c3' => '18:30-19:30',

                'resources' => 'MADRASAH QURAN ONLINE',
                'motivation_target' => 'Bisa sbg syafaat di akhirat nanti dan diamalkan sbg bacaan di dalam sholat',
            ],
            [
                'participant_id' => 10,
                'infaq_id' => 4,
                'batch_id' => 4,

                'a1' => true,
                'a2' => null,

                'b1' => true,
                'b2' => 'Insyaallah siap',

                'c1' => 'Offline',
                'c2' => 'Sawojajar',
                'c3' => '18:30-19:30',

                'resources' => 'KAJIAN USTADZAH MAYA',
                'motivation_target' => 'Mengharap ridho Alloh SWT',
            ],
        ];

        Program1Response::insert($datas);
    }
}
