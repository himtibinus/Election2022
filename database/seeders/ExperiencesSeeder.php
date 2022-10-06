<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ExperiencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Candidate 1
        DB::table('experiences')->insert([
            'candidate_id' => 1,
            'experience' => 'Member of Relation Expansion Commision',
        ]);

        DB::table('experiences')->insert([
            'candidate_id' => 1,
            'experience' => 'Member of Publication and Marketing Division HIMTI 2022',
        ]);

        DB::table('experiences')->insert([
            'candidate_id' => 1,
            'experience' => 'PIC of HIMTI\'s social media and media partner',
        ]);

        DB::table('experiences')->insert([
            'candidate_id' => 1,
            'experience' => 'Member of HISHOT 2022\'s Promotion Division',
        ]);

        DB::table('experiences')->insert([
            'candidate_id' => 1,
            'experience' => 'Member of TECHFEST 2022\'s Event Division',
        ]);

        DB::table('experiences')->insert([
            'candidate_id' => 1,
            'experience' => 'Member of HIVENT 2022\'s DnD Division',
        ]);

        // Candidate 2
        DB::table('experiences')->insert([
            'candidate_id' => 2,
            'experience' => 'Koordinator divisi acara Himti Anniversary 2022',
        ]);

        DB::table('experiences')->insert([
            'candidate_id' => 2,
            'experience' => 'Koordinator divisi acara HINGAR 2022',
        ]);

        DB::table('experiences')->insert([
            'candidate_id' => 2,
            'experience' => 'Sekretaris Responsi 2021 – 2022 B25 Bandung',
        ]);

        // Candidate 3
        DB::table('experiences')->insert([
            'candidate_id' => 3,
            'experience' => 'Digital Festival Panitia, koor divisi acara Seminar Series',
        ]);

        DB::table('experiences')->insert([
            'candidate_id' => 3,
            'experience' => 'Techno Panitia, anggota divisi visualisasi',
        ]);

        DB::table('experiences')->insert([
            'candidate_id' => 3,
            'experience' => 'TechFest Panitia, DPI acara sebagai sekretaris II',
        ]);

        DB::table('experiences')->insert([
            'candidate_id' => 3,
            'experience' => 'Hivent Panitia, anggota divisi design',
        ]);
    }
}
