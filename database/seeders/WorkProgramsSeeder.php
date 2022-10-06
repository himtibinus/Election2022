<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class WorkProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Candidate 1
        DB::table('work_programs')->insert([
            'candidate_id' => 1,
            'work_program' => 'HICamp (HIMTI Camp)',
        ]);
        DB::table('work_programs')->insert([
            'candidate_id' => 1,
            'work_program' => 'HIMTI Awarding Night ',
        ]);

        // Candidate 2
        DB::table('work_programs')->insert([
            'candidate_id' => 2,
            'work_program' => 'Study Tour',
        ]);
        DB::table('work_programs')->insert([
            'candidate_id' => 2,
            'work_program' => 'Leadership Training',
        ]);

        // Candidate 3
        DB::table('work_programs')->insert([
            'candidate_id' => 3,
            'work_program' => 'Bonding Night',
        ]);
        DB::table('work_programs')->insert([
            'candidate_id' => 3,
            'work_program' => 'IFess',
        ]);
    }
}
