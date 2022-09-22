<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Program1Response;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ProgramSeeder::class,
            BatchSeeder::class,
            FileSeeder::class,
            InfaqSeeder::class,
            ParticipantSeeder::class,
            Program1ResponseSeeder::class,
        ]);
    }
}
