<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a demo job seeker user
        User::updateOrCreate(
            ['email' => 'demo.jobseeker@example.com'],
            [
                'name' => 'Demo Job Seeker',
                'password' => Hash::make('password123'),
                'role' => 'job_seeker',
                'country_id' => 1, // ensure CountrySeeder seeded this ID
                'education_level_id' => null,
                'work_experience' => 0,
                'phone' => null,
                'bio' => null,
            ]
        );

        // Optionally, create a demo business man user
        User::updateOrCreate(
            ['email' => 'demo.business@example.com'],
            [
                'name' => 'Demo Business',
                'password' => Hash::make('password123'),
                'role' => 'business_man',
                'country_id' => 1,
                'education_level_id' => null,
                'work_experience' => 0,
                'phone' => null,
                'bio' => null,
            ]
        );
    }
}
