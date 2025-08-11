<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountrySeeder::class,
            EducationLevelSeeder::class,
            WorkFieldSeeder::class,
            CompanySeeder::class,
            JobSeeder::class,
            FAQSeeder::class,
            PolicySeeder::class,
            UserSeeder::class,
        ]);
    }
}
