<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nim' => '24',
            'name' => 'Verified student',
            'email' => 'student@binus.ac.id',
            'email_verified_at' => now()
        ]);
        User::create([
            'nim' => 'D001',
            'name' => 'Verified lecturer',
            'email' => 'lecturer@binus.edu',
            'email_verified_at' => now()
        ]);
        User::create([
            'nim' => '25',
            'name' => 'Unverified student'
        ]);
        User::create([
            'nim' => 'D002',
            'name' => 'Unverified lecturer'
        ]);
        User::create([
            'nim' => '22',
            'name' => 'User',
        ]);
    }
}
