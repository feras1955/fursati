<?php

namespace Database\Seeders;

use App\Models\WorkField;
use Illuminate\Database\Seeder;

class WorkFieldSeeder extends Seeder
{
    public function run(): void
    {
        $fields = [
            'تكنولوجيا المعلومات',
            'التسويق',
            'المبيعات',
            'الموارد البشرية',
            'المحاسبة',
            'الهندسة',
            'الطب',
            'التعليم',
            'السياحة',
            'الخدمات المالية',
            'التجارة',
            'الصناعة',
            'الزراعة',
            'النقل',
            'الإعلام',
        ];

        foreach ($fields as $field) {
            WorkField::firstOrCreate(['name' => $field]);
        }
    }
} 