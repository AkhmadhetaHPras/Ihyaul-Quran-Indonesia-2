<?php

namespace Database\Seeders;

use App\Models\Infaq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfaqSeeder extends Seeder
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
                'name' => 'Bambang Setiawan',
                'email' => 'hfdhfd768@gmail.com',
                'phone' => '085803056443',
                'infaq' => 10000,
                'status' => 'Lunas',
            ],
            [
                'name' => 'Dion Pratama',
                'email' => 'hfdhfd768@gmail.com',
                'phone' => '085803056443',
                'infaq' => 500000,
                'status' => 'Lunas',
            ],
            [
                'name' => 'Rahmat Novanto',
                'email' => 'hfdhfd768@gmail.com',
                'phone' => '085803056443',
                'infaq' => 970000,
                'status' => 'Lunas',
            ],
            [
                'name' => 'Fahri Bagas',
                'email' => 'akhmadhetahafid@gmail.com',
                'phone' => '085803056443',
                'infaq' => 123000,
                'status' => 'Pending',
            ],
        ];

        Infaq::insert($datas);
    }
}
