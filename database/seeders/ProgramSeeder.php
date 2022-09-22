<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
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
                'title' => 'AMMA',
                'concept' => 'Ayo Menghafal dan Memahami Al-Quran (AMMA) merupakan program menghafal Al-Quran beserta artinya dan mentadaburi maknanya. Program ini sangat cocok untuk diikuti oleh pemula atau siapapun yang ingin menghafalkan Al-Quran. Hanya dengan 30-60 menit/hari, anda dapat menghafal Al-Quran dengan mudah dan menyenangkan.',
                'superiority' => '<div class="single-features"><div class="features-icon"><img src="/img/icon/right-icon.svg" alt=""></div><div class="features-caption"><p>Hafal 3-5 ayat/hari beserta arti dan tadaburnya</p></div></div>
                                <div class="single-features"><div class="features-icon"><img src="/img/icon/right-icon.svg" alt=""></div><div class="features-caption"><p>Dilaksanakan secara berkelompok(max. 20 Orang)</p></div></div>
                                <div class="single-features"><div class="features-icon"><img src="/img/icon/right-icon.svg" alt=""></div><div class="features-caption"><p>Intensif, 30-60 menit/hari selama 4 hari tiap pekan secara Online/Offline*</p></div></div>
                                <div class="single-features"><div class="features-icon"><img src="/img/icon/right-icon.svg" alt=""></div><div class="features-caption"><p>Didampingi fasilitator yang sabar dan berkompeten</p></div></div>
                                <div class="single-features"><div class="features-icon"><img src="/img/icon/right-icon.svg" alt=""></div><div class="features-caption"><p>Kajian bersama Ustadzah Maya Novita, Lc, MA dan Ustadz Dr. Jalaluddin, Lc, MA</p></div></div>
                                <div class="single-features"><div class="features-icon"><img src="/img/icon/right-icon.svg" alt=""></div><div class="features-caption"><p>Circle menghafal yang menyenangkan dan komunitas belajar mengajar Al-Quran</p></div></div>',
                'requirement' => '<div class="single-features"><div class="features-icon"><img src="/img/icon/right-icon.svg" alt=""></div><div class="features-caption"><p>Muslim/Muslimah dengan rentang usia 12-70 Tahun</p></div></div>
                                <div class="single-features"><div class="features-icon"><img src="/img/icon/right-icon.svg" alt=""></div><div class="features-caption"><p>Memiliki kemauan kuat untuk menghafal Al-Quran</p></div></div>',
                'program_implementation' => '<div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="single-defination text-center">
                                        <h1 class="mb-20 d-inline-block badge-pill badge-warning px-5 py-1">Online</h1>
                                        <p>Dilaksanakan secara daring (dalam jaringan) <b>via zoom</b>, sehingga dapat menjangkau peserta dimanapun berada.</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="single-defination text-center">
                                        <h1 class="mb-20 d-inline-block badge-pill badge-info px-5 py-1">Offline</h1>
                                        <p>Bagi yang bertempat tinggal di area <b>Malang Raya</b> bisa mengikuti program AMMA dengan tatap muka secara langsung bersama fasilitator.</p>
                                    </div>
                                </div>
                            </div>',
                'status' => 'Dibuka',
            ],
        ];

        Program::insert($datas);
    }
}
