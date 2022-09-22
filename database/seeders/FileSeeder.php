<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
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
                'program_id' => 1,
                'title' => 'Fotokopi Ijazah TK / PAUD',
                'description' => '<b>Jika ada, 2 Lembar.<b> Tidak harus dibawa saat pendaftaran, namun harus diberikan sebelum KBM dimulai.',
            ],
            [
                'program_id' => 1,
                'title' => 'Fotokopi Akta Kelahiran',
                'description' => '<b>2 Lembar.<b> Harus dibawa saat datang mengikuti Tes PSB.',
            ],
            [
                'program_id' => 1,
                'title' => 'Fotokopi Kartu Keluarga',
                'description' => '<b>2 Lembar.<b> Harus dibawa saat datang mengikuti Tes PSB.',
            ],
            [
                'program_id' => 1,
                'title' => 'Surat Keterangan Sehat dari Dokter',
                'description' => '<b>2 Lembar(1 Asli, 1 Fotokopi).<b>. Harus dibawa saat datang mengikuti Tes PSB.',
            ],
            [
                'program_id' => 1,
                'title' => 'Fotokopi SKCK',
                'description' => '<b>2 Lembar.<b> Harus dibawa saat datang mengikuti Tes PSB.',
            ],
            [
                'program_id' => 1,
                'title' => 'Foto Calon Pendaftar',
                'description' => '<b>Ukuran 4×6, 2 Lembar.<b> Harus dibawa saat datang mengikuti Tes PSB.',
            ],
        ];

        File::insert($datas);
    }
}
