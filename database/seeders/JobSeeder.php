<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\User;
use App\Models\WorkField;
use App\Models\EducationLevel;
use App\Models\Country;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        // التأكد من وجود البيانات الأساسية
        $this->call([
            CountrySeeder::class,
            WorkFieldSeeder::class,
            EducationLevelSeeder::class,
        ]);

        $countries = Country::all();
        $workFields = WorkField::all();
        $educationLevels = EducationLevel::all();

        // إنشاء مستخدم صاحب عمل
        $businessUser = User::firstOrCreate(
            ['email' => 'ahmed@company.com'],
            [
                'name' => 'أحمد الشركة',
                'password' => bcrypt('password123'),
                'role' => 'business_man',
                'country_id' => $countries->first()->id,
                'work_experience' => 10,
                'phone' => '+966501234567',
                'bio' => 'مدير شركة تقنية'
            ]
        );

        // بيانات الوظائف
        $jobs = [
            [
                'title' => 'مطور تطبيقات ويب',
                'work_place' => 'الرياض',
                'gender_preference' => 'all',
                'education_level_id' => $educationLevels->first()->id,
                'work_experience' => 3,
                'work_field_id' => $workFields->first()->id,
                'country_of_graduation' => $countries->first()->id,
                'country_of_residence' => $countries->first()->id,
                'business_man_id' => $businessUser->id,
                'status' => 'active',
                'description' => 'نبحث عن مطور ويب ذو خبرة في Laravel و React',
                'requirements' => 'خبرة 3+ سنوات في تطوير الويب',
                'salary_range' => '8000-12000',
                'job_type' => 'دوام كامل',
                'skills' => 'Laravel,React,JavaScript,PHP'
            ],
            [
                'title' => 'مطور تطبيقات جوال',
                'work_place' => 'جدة',
                'gender_preference' => 'all',
                'education_level_id' => $educationLevels->first()->id,
                'work_experience' => 2,
                'work_field_id' => $workFields->first()->id,
                'country_of_graduation' => $countries->first()->id,
                'country_of_residence' => $countries->first()->id,
                'business_man_id' => $businessUser->id,
                'status' => 'active',
                'description' => 'نحتاج مطور تطبيقات جوال ذو خبرة في React Native',
                'requirements' => 'خبرة 2+ سنوات في تطوير تطبيقات الجوال',
                'salary_range' => '9000-14000',
                'job_type' => 'دوام كامل',
                'skills' => 'React Native,Flutter,JavaScript'
            ],
            [
                'title' => 'مدير تسويق رقمي',
                'work_place' => 'الدمام',
                'gender_preference' => 'all',
                'education_level_id' => $educationLevels->first()->id,
                'work_experience' => 4,
                'work_field_id' => $workFields->first()->id,
                'country_of_graduation' => $countries->first()->id,
                'country_of_residence' => $countries->first()->id,
                'business_man_id' => $businessUser->id,
                'status' => 'active',
                'description' => 'نبحث عن مدير تسويق رقمي ذو خبرة',
                'requirements' => 'خبرة 4+ سنوات في التسويق الرقمي',
                'salary_range' => '12000-18000',
                'job_type' => 'دوام كامل',
                'skills' => 'Digital Marketing,Google Ads,SEO'
            ]
        ];

        foreach ($jobs as $jobData) {
            Job::create($jobData);
        }

        $this->command->info('تم إنشاء ' . count($jobs) . ' وظيفة بنجاح!');
    }
} 