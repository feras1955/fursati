<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    echo "Creating basic data...\n";
    
    // Create basic data using DB facade
    $db = \Illuminate\Support\Facades\DB::connection();
    
    // Create countries if they don't exist
    if ($db->table('countries')->count() == 0) {
        $db->table('countries')->insert([
            ['name' => 'السعودية'],
            ['name' => 'الإمارات'],
            ['name' => 'مصر'],
            ['name' => 'الأردن']
        ]);
        echo "Created countries\n";
    }
    
    // Create education levels if they don't exist
    if ($db->table('education_levels')->count() == 0) {
        $db->table('education_levels')->insert([
            ['name' => 'ثانوية عامة'],
            ['name' => 'دبلوم'],
            ['name' => 'بكالوريوس'],
            ['name' => 'ماجستير'],
            ['name' => 'دكتوراه']
        ]);
        echo "Created education levels\n";
    }
    
    // Create work fields if they don't exist
    if ($db->table('work_fields')->count() == 0) {
        $db->table('work_fields')->insert([
            ['name' => 'تكنولوجيا المعلومات'],
            ['name' => 'التصميم الجرافيكي'],
            ['name' => 'التسويق'],
            ['name' => 'المحاسبة'],
            ['name' => 'الموارد البشرية']
        ]);
        echo "Created work fields\n";
    }
    
    // Create a business user if it doesn't exist
    if ($db->table('users')->where('role', 'business_man')->count() == 0) {
        $db->table('users')->insert([
            'name' => 'شركة التقنية المتقدمة',
            'email' => 'tech@company.com',
            'password' => bcrypt('password'),
            'role' => 'business_man',
            'country_id' => 1,
            'education_level_id' => 1,
            'work_experience' => 5,
            'phone' => '+966501234567',
            'bio' => 'شركة تقنية متقدمة',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        echo "Created business user\n";
    }
    
    // Create some basic jobs
    if ($db->table('jobs')->count() == 0) {
        $businessUserId = $db->table('users')->where('role', 'business_man')->first()->id;
        
        $db->table('jobs')->insert([
            [
                'title' => 'مطور ويب',
                'work_place' => 'الرياض',
                'gender_preference' => 'all',
                'education_level_id' => 1,
                'work_experience' => 2,
                'work_field_id' => 1,
                'country_of_graduation' => 1,
                'country_of_residence' => 1,
                'business_man_id' => $businessUserId,
                'description' => 'نحتاج مطور ويب ذو خبرة في Laravel و React',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
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
                'business_man_id' => $businessUserId,
                'description' => 'نحتاج مصمم جرافيك مبدع',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
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
                'business_man_id' => $businessUserId,
                'description' => 'نحتاج مدير تسويق ذو خبرة في التسويق الرقمي',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
        echo "Created jobs\n";
    }
    
    echo "Basic data created successfully!\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} 