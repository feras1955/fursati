<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
use Illuminate\Database\Seeder;

class EducationLevelSeeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            'ثانوية عامة',
            'دبلوم',
            'بكالوريوس',
            'ماجستير',
            'دكتوراه',
        ];

        foreach ($levels as $level) {
            EducationLevel::firstOrCreate(['name' => $level]);
        }
    }
} 