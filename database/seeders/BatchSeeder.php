<?php

namespace Database\Seeders;

use App\Models\Batch;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BatchSeeder extends Seeder
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
                'batch' => 1,
                'closed_date' => Carbon::parse('20-04-2022'),
                'created_at' => Carbon::parse('8-04-2022'),
            ],
            [
                'program_id' => 1,
                'batch' => 2,
                'closed_date' => Carbon::parse('20-06-2022'),
                'created_at' => Carbon::parse('9-06-2022'),
            ],
            [
                'program_id' => 1,
                'batch' => 3,
                'closed_date' => Carbon::parse('20-07-2022'),
                'created_at' => Carbon::parse('6-07-2022'),
            ],
            [
                'program_id' => 1,
                'batch' => 4,
                'closed_date' => Carbon::parse('20-08-2022'),
                'created_at' => Carbon::parse('10-08-2022'),
            ],
        ];

        Batch::insert($datas);
    }
}
