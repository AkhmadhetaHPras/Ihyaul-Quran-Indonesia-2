<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'username' => 'admin1',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('12345678'),
                'name' => 'Yukina Sato',
                'phone' => '085678154235',
                'photo' => 'img/1.png',
            ],
            [
                'username' => 'admin2',
                'email' => 'admin2@gmail.com',
                'password' => Hash::make('12345678'),
                'name' => 'Wahyu',
                'phone' => '0812786712',
                'photo' => 'img/2.png',
            ],
            [
                'username' => 'admin3',
                'email' => 'admin3@gmail.com',
                'password' => Hash::make('12345678'),
                'name' => 'Bram Widantyo',
                'phone' => '087898765243',
                'photo' => 'img/3.png',
            ],
            [
                'username' => 'admin4',
                'email' => 'admin4@gmail.com',
                'password' => Hash::make('12345678'),
                'name' => 'Wisnu Utama',
                'phone' => '09817263571',
                'photo' => 'img/4.png',
            ],
            [
                'username' => 'admin5',
                'email' => 'admin5@gmail.com',
                'password' => Hash::make('12345678'),
                'name' => 'Akhmadheta Hafid',
                'phone' => '098871627561',
                'photo' => 'img/5.png',
            ],
        ];

        User::insert($datas);
    }
}
