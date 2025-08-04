<?php

// Simple script to create basic data
$host = 'localhost';
$dbname = 'fursati';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected to database successfully!\n";
    
    // Create countries
    $pdo->exec("INSERT IGNORE INTO countries (name) VALUES 
        ('السعودية'), ('الإمارات'), ('مصر'), ('الأردن')");
    echo "Countries created/checked\n";
    
    // Create education levels
    $pdo->exec("INSERT IGNORE INTO education_levels (name) VALUES 
        ('ثانوية عامة'), ('دبلوم'), ('بكالوريوس'), ('ماجستير'), ('دكتوراه')");
    echo "Education levels created/checked\n";
    
    // Create work fields
    $pdo->exec("INSERT IGNORE INTO work_fields (name) VALUES 
        ('تكنولوجيا المعلومات'), ('التصميم الجرافيكي'), ('التسويق'), ('المحاسبة'), ('الموارد البشرية')");
    echo "Work fields created/checked\n";
    
    // Create business user
    $stmt = $pdo->prepare("INSERT IGNORE INTO users (name, email, password, role, country_id, education_level_id, work_experience, phone, bio, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");
    $stmt->execute([
        'شركة التقنية المتقدمة',
        'tech@company.com',
        password_hash('password', PASSWORD_DEFAULT),
        'business_man',
        1, 1, 5, '+966501234567', 'شركة تقنية متقدمة'
    ]);
    echo "Business user created/checked\n";
    
    // Get business user ID
    $businessUserId = $pdo->query("SELECT id FROM users WHERE role = 'business_man' LIMIT 1")->fetchColumn();
    
    // Create jobs
    $stmt = $pdo->prepare("INSERT IGNORE INTO jobs (title, work_place, gender_preference, education_level_id, work_experience, work_field_id, country_of_graduation, country_of_residence, business_man_id, description, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");
    
    $jobs = [
        ['مطور ويب', 'الرياض', 'all', 1, 2, 1, 1, 1, $businessUserId, 'نحتاج مطور ويب ذو خبرة في Laravel و React', 'active'],
        ['مصمم جرافيك', 'جدة', 'all', 2, 1, 2, 1, 1, $businessUserId, 'نحتاج مصمم جرافيك مبدع', 'active'],
        ['مدير تسويق', 'الدمام', 'all', 3, 3, 3, 1, 1, $businessUserId, 'نحتاج مدير تسويق ذو خبرة في التسويق الرقمي', 'active']
    ];
    
    foreach ($jobs as $job) {
        $stmt->execute($job);
    }
    echo "Jobs created successfully!\n";
    
    echo "All basic data created successfully!\n";
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
} 