<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $companies = [
            [
                'name' => 'شركة التقنية المتقدمة',
                'description' => 'شركة رائدة في مجال تكنولوجيا المعلومات',
                'email' => 'info@techcompany.com',
                'phone' => '+966501234567',
                'website' => 'https://techcompany.com',
                'is_active' => true,
            ],
            [
                'name' => 'مجموعة الخدمات المالية',
                'description' => 'شركة خدمات مالية متكاملة',
                'email' => 'contact@financial.com',
                'phone' => '+966507654321',
                'website' => 'https://financial.com',
                'is_active' => true,
            ],
            [
                'name' => 'شركة التسويق الرقمي',
                'description' => 'متخصصون في التسويق الرقمي والإعلانات',
                'email' => 'hello@digitalmarketing.com',
                'phone' => '+966509876543',
                'website' => 'https://digitalmarketing.com',
                'is_active' => true,
            ],
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }
    }
} 