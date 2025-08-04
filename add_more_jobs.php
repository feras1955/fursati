<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    echo "Adding more fake jobs...\n";
    
    // Get business user
    $businessUser = \App\Models\User::where('role', 'business_man')->first();
    if (!$businessUser) {
        echo "Creating business user...\n";
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
    }
    
    // More jobs data
    $jobsData = [
        [
            'title' => 'مطور تطبيقات جوال',
            'work_place' => 'الرياض',
            'gender_preference' => 'all',
            'education_level_id' => 1,
            'work_experience' => 3,
            'work_field_id' => 1,
            'country_of_graduation' => 1,
            'country_of_residence' => 1,
            'business_man_id' => $businessUser->id,
            'description' => 'نحتاج مطور تطبيقات جوال ذو خبرة في React Native و Flutter',
            'requirements' => 'خبرة في React Native, Flutter, JavaScript',
            'salary_min' => 4000,
            'salary_max' => 7000,
            'salary_range' => '4000-7000',
            'job_type' => 'دوام كامل',
            'skills' => 'React Native, Flutter, JavaScript, Mobile Development',
            'status' => 'active'
        ],
        [
            'title' => 'مدير مشاريع تقنية',
            'work_place' => 'جدة',
            'gender_preference' => 'all',
            'education_level_id' => 3,
            'work_experience' => 5,
            'work_field_id' => 1,
            'country_of_graduation' => 1,
            'country_of_residence' => 1,
            'business_man_id' => $businessUser->id,
            'description' => 'نحتاج مدير مشاريع تقنية ذو خبرة في إدارة فرق التطوير',
            'requirements' => 'خبرة في إدارة المشاريع التقنية وإدارة الفرق',
            'salary_min' => 8000,
            'salary_max' => 12000,
            'salary_range' => '8000-12000',
            'job_type' => 'دوام كامل',
            'skills' => 'Project Management, Agile, Scrum, Team Leadership',
            'status' => 'active'
        ],
        [
            'title' => 'محلل بيانات',
            'work_place' => 'الدمام',
            'gender_preference' => 'all',
            'education_level_id' => 2,
            'work_experience' => 2,
            'work_field_id' => 1,
            'country_of_graduation' => 1,
            'country_of_residence' => 1,
            'business_man_id' => $businessUser->id,
            'description' => 'نحتاج محلل بيانات ذو خبرة في تحليل البيانات وإعداد التقارير',
            'requirements' => 'خبرة في Excel, SQL, Power BI',
            'salary_min' => 3500,
            'salary_max' => 6000,
            'salary_range' => '3500-6000',
            'job_type' => 'دوام كامل',
            'skills' => 'Data Analysis, Excel, SQL, Power BI, Statistics',
            'status' => 'active'
        ],
        [
            'title' => 'مصمم واجهات المستخدم',
            'work_place' => 'الرياض',
            'gender_preference' => 'all',
            'education_level_id' => 2,
            'work_experience' => 2,
            'work_field_id' => 2,
            'country_of_graduation' => 1,
            'country_of_residence' => 1,
            'business_man_id' => $businessUser->id,
            'description' => 'نحتاج مصمم واجهات مستخدم مبدع ومتميز',
            'requirements' => 'خبرة في Figma, Adobe XD, UI/UX Design',
            'salary_min' => 3000,
            'salary_max' => 5500,
            'salary_range' => '3000-5500',
            'job_type' => 'دوام جزئي',
            'skills' => 'UI/UX Design, Figma, Adobe XD, Prototyping',
            'status' => 'active'
        ],
        [
            'title' => 'مطور باك إند',
            'work_place' => 'جدة',
            'gender_preference' => 'all',
            'education_level_id' => 1,
            'work_experience' => 4,
            'work_field_id' => 1,
            'country_of_graduation' => 1,
            'country_of_residence' => 1,
            'business_man_id' => $businessUser->id,
            'description' => 'نحتاج مطور باك إند ذو خبرة في Node.js و Python',
            'requirements' => 'خبرة في Node.js, Python, APIs, Databases',
            'salary_min' => 5000,
            'salary_max' => 9000,
            'salary_range' => '5000-9000',
            'job_type' => 'دوام كامل',
            'skills' => 'Node.js, Python, APIs, MySQL, MongoDB',
            'status' => 'active'
        ]
    ];
    
    foreach ($jobsData as $jobData) {
        \App\Models\Job::create($jobData);
        echo "Created job: {$jobData['title']}\n";
    }
    
    echo "Successfully added " . count($jobsData) . " more jobs!\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} 