<?php

namespace Database\Seeders;

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
        $this->call(CandidatesSeeder::class);
        $this->call(ExperiencesSeeder::class);
        $this->call(WorkProgramsSeeder::class);
        // $this->call(UserSeeder::class);
    }
}
