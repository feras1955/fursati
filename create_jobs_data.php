<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    $db = $app->make('Illuminate\Database\Connection');
    
    echo "Creating jobs data...\n";
    
    // First, let's create a business user if it doesn't exist
    $businessUser = \App\Models\User::where('role', 'business_man')->first();
    if (!$businessUser) {
        $businessUser = \App\Models\User::create([
            'name' => 'شركة التقنية المتقدمة',
            'email' => 'tech@company.com',
            'password' => bcrypt('password'),
            'role' => 'business_man',
            'country_id' => 1,
            'education_level_id' => 1,
            'work_experience' => 5,
            'phone' => '+966501234567',
            'bio' => 'شركة تقنية متقدمة'
        ]);
        echo "Created business user: {$businessUser->name}\n";
    }
    
    // Check if jobs table has the required columns
    $columns = $db->select('DESCRIBE jobs');
    $columnNames = array_column($columns, 'Field');
    
    echo "Available columns in jobs table: " . implode(', ', $columnNames) . "\n";
    
    // Create sample jobs
    $jobsData = [
        [
            'title' => 'مطور ويب',
            'work_place' => 'الرياض',
            'gender_preference' => 'all',
            'education_level_id' => 1,
            'work_experience' => 2,
            'work_field_id' => 1,
            'country_of_graduation' => 1,
            'country_of_residence' => 1,
            'business_man_id' => $businessUser->id,
            'description' => 'نحتاج مطور ويب ذو خبرة في Laravel و React',
            'requirements' => 'خبرة في PHP, Laravel, JavaScript, React',
            'salary_min' => 3000,
            'salary_max' => 5000,
            'salary_range' => '3000-5000',
            'job_type' => 'دوام كامل',
            'skills' => 'PHP, Laravel, JavaScript, React, MySQL',
            'status' => 'active'
        ],
        [
            'title' => 'مصمم جرافيك',
            'work_place' => 'جدة',
            'gender_preference' => 'all',
            'education_level_id' => 2,
            'work_experience' => 1,
            'work_field_id' => 2,
            'country_of_graduation' => 1,
            'country_of_residence' => 1,
            'business_man_id' => $businessUser->id,
            'description' => 'نحتاج مصمم جرافيك مبدع',
            'requirements' => 'خبرة في Adobe Photoshop, Illustrator',
            'salary_min' => 2500,
            'salary_max' => 4000,
            'salary_range' => '2500-4000',
            'job_type' => 'دوام جزئي',
            'skills' => 'Photoshop, Illustrator, InDesign, Creative Design',
            'status' => 'active'
        ],
        [
            'title' => 'مدير تسويق',
            'work_place' => 'الدمام',
            'gender_preference' => 'all',
            'education_level_id' => 3,
            'work_experience' => 3,
            'work_field_id' => 3,
            'country_of_graduation' => 1,
            'country_of_residence' => 1,
            'business_man_id' => $businessUser->id,
            'description' => 'نحتاج مدير تسويق ذو خبرة في التسويق الرقمي',
            'requirements' => 'خبرة في التسويق الرقمي وإدارة الحملات',
            'salary_min' => 5000,
            'salary_max' => 8000,
            'salary_range' => '5000-8000',
            'job_type' => 'دوام كامل',
            'skills' => 'Digital Marketing, Social Media, Google Ads, Analytics',
            'status' => 'active'
        ]
    ];
    
    foreach ($jobsData as $jobData) {
        // Only include columns that exist in the table
        $filteredData = array_intersect_key($jobData, array_flip($columnNames));
        
        $job = \App\Models\Job::create($filteredData);
        echo "Created job: {$job->title}\n";
    }
    
    echo "Jobs data created successfully!\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
} 