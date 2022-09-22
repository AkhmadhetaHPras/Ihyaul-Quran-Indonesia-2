<?php

namespace Database\Seeders;

use App\Models\Participant;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
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
                'name' => 'Julian Sibastian',
                'email' => 'hfdhfd768@gmail.com',
                'gender' => 'Ikhwan',
                'city' => 'Malang',
                'birth' => Carbon::parse('12-02-1986'),
                'phone' => '085803056443',
                'job' => 'Wiraswasta',
                'skill' => 'Memasak',
            ],
            [
                'name' => 'Bambang Setiawan',
                'email' => 'hfdhfd768@gmail.com',
                'gender' => 'Ikhwan',
                'city' => 'Malang',
                'birth' => Carbon::parse('16-07-1981'),
                'phone' => '085803056443',
                'job' => 'Dokter',
                'skill' => 'Menulis',
            ],
            [
                'name' => 'Anggi Ardhiasti',
                'email' => 'hfdhfd768@gmail.com',
                'gender' => 'Akhwat',
                'city' => 'Malang',
                'birth' => Carbon::parse('19-12-1983'),
                'phone' => '085803056443',
                'job' => 'Dosen',
                'skill' => 'Menulis',
            ],
            [
                'name' => 'Rahayu Ningtias',
                'email' => 'hfdhfd768@gmail.com',
                'gender' => 'Akhwat',
                'city' => 'Sidoarjo',
                'birth' => Carbon::parse('07-07-1996'),
                'phone' => '085803056443',
                'job' => 'Karyawan',
                'skill' => 'Marketing',
            ],
            [
                'name' => 'Risma dgrewa',
                'email' => 'hfdhfd768@gmail.com',
                'gender' => 'Akhwat',
                'city' => 'Kediri',
                'birth' => Carbon::parse('09-03-1994'),
                'phone' => '085803056443',
                'job' => 'Mahasiswa',
                'skill' => 'Memasak',
            ],
            [
                'name' => 'Dion Pratama',
                'email' => 'hfdhfd768@gmail.com',
                'gender' => 'Ikhwan',
                'city' => 'Malang',
                'birth' => Carbon::parse('06-09-1963'),
                'phone' => '085803056443',
                'job' => 'Pensiunan IT',
                'skill' => 'Koding',
            ],
            [
                'name' => 'Maryam Hasan',
                'email' => 'akhmadheta@gmail.com',
                'gender' => 'Akhwat',
                'city' => 'Malang',
                'birth' => Carbon::parse('01-04-1989'),
                'phone' => '081233954025',
                'job' => 'Karywati',
                'skill' => 'Tilawah Alquran',
            ],
            [
                'name' => 'Fatonah',
                'email' => 'akhmadheta097@gmail.com',
                'gender' => 'Akhwat',
                'city' => 'Malang',
                'birth' => Carbon::parse('08-05-1954'),
                'phone' => '081233954025',
                'job' => 'Ibu Rumah Tangga',
                'skill' => 'Memasak',
            ],
            [
                'name' => 'Reiny Lukitasari',
                'email' => 'akhmadheta097@gmail.com',
                'gender' => 'Akhwat',
                'city' => 'Malang',
                'birth' => Carbon::parse('27-11-1971'),
                'phone' => '085803056443',
                'job' => 'Wiraswasta',
                'skill' => 'Memasak',
            ],
            [
                'name' => 'Fahri Bagas',
                'email' => 'hfdhfd768@gmail.com',
                'gender' => 'Ikhwan',
                'city' => 'Malang',
                'birth' => Carbon::parse('12-1-1999'),
                'phone' => '085803056443',
                'job' => 'Mahasiswa',
                'skill' => null,
            ],
        ];

        Participant::insert($datas);
    }
}
