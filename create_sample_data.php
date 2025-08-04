<?php
// Create sample data for testing
$host = 'localhost';
$dbname = 'fursati';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "🎯 Creating sample data...\n\n";
    
    // Create work fields
    $workFields = [
        'تطوير الويب والجوال',
        'التسويق الرقمي',
        'المحاسبة والمالية',
        'الموارد البشرية',
        'الهندسة',
        'التعليم',
        'الطب',
        'التصميم الجرافيكي',
        'المبيعات',
        'الخدمات المالية'
    ];
    
    foreach ($workFields as $field) {
        $pdo->exec("INSERT INTO work_fields (name, created_at, updated_at) VALUES ('$field', NOW(), NOW())");
    }
    echo "✓ Created work fields\n";
    
    // Create countries
    $countries = [
        ['name' => 'السعودية', 'code' => 'SAU'],
        ['name' => 'الإمارات العربية المتحدة', 'code' => 'UAE'],
        ['name' => 'مصر', 'code' => 'EGY'],
        ['name' => 'الأردن', 'code' => 'JOR'],
        ['name' => 'لبنان', 'code' => 'LBN'],
        ['name' => 'الكويت', 'code' => 'KWT'],
        ['name' => 'قطر', 'code' => 'QAT'],
        ['name' => 'البحرين', 'code' => 'BHR'],
        ['name' => 'عمان', 'code' => 'OMN'],
        ['name' => 'العراق', 'code' => 'IRQ']
    ];
    
    foreach ($countries as $country) {
        $pdo->exec("INSERT INTO countries (name, code, created_at, updated_at) VALUES ('{$country['name']}', '{$country['code']}', NOW(), NOW())");
    }
    echo "✓ Created countries\n";
    
    // Create education levels
    $educationLevels = [
        'ثانوية عامة',
        'دبلوم',
        'بكالوريوس',
        'ماجستير',
        'دكتوراه'
    ];
    
    foreach ($educationLevels as $level) {
        $pdo->exec("INSERT INTO education_levels (name, created_at, updated_at) VALUES ('$level', NOW(), NOW())");
    }
    echo "✓ Created education levels\n";
    
    // Create companies
    $companies = [
        'شركة التقنية المتقدمة',
        'مجموعة التسويق الحديث',
        'الشركة المتحدة للاستثمار',
        'مجموعة الحلول الرقمية',
        'شركة الابتكار التقني',
        'مجموعة الخدمات المالية',
        'شركة التطوير العقاري',
        'مجموعة التعليم المتقدم',
        'شركة الرعاية الصحية',
        'مجموعة النقل والخدمات اللوجستية'
    ];
    
    foreach ($companies as $company) {
        $pdo->exec("INSERT INTO companies (name, description, is_active, created_at, updated_at) VALUES ('$company', 'شركة رائدة في مجالها', 1, NOW(), NOW())");
    }
    echo "✓ Created companies\n";
    
    // Create sample jobs
    $jobs = [
        [
            'title' => 'مطور تطبيقات جوال (React Native)',
            'work_field_id' => 1,
            'business_man_id' => 1,
            'work_place' => 'الرياض، السعودية',
            'work_experience' => 3,
            'education_level_id' => 3,
            'salary_min' => 8000,
            'salary_max' => 12000,
            'job_type' => 'دوام كامل',
            'skills' => 'React Native, JavaScript, Redux, RESTful APIs, Firebase, Git, UI/UX Design',
            'description' => 'نبحث عن مطور تطبيقات جوال متمرس في React Native للانضمام إلى فريقنا التقني في الرياض.',
            'requirements' => 'شهادة بكالوريوس في علوم الحاسوب، 3+ سنوات خبرة في React Native، مهارات تواصل ممتازة'
        ],
        [
            'title' => 'مدير تسويق رقمي',
            'work_field_id' => 2,
            'business_man_id' => 2,
            'work_place' => 'جدة، السعودية',
            'work_experience' => 5,
            'education_level_id' => 3,
            'salary_min' => 10000,
            'salary_max' => 15000,
            'job_type' => 'دوام كامل',
            'skills' => 'SEO, Social Media Marketing, Google Ads, Facebook Ads, Content Marketing, Analytics',
            'description' => 'نبحث عن مدير تسويق رقمي متمرس لقيادة استراتيجيات التسويق الرقمي للشركة.',
            'requirements' => 'بكالوريوس في التسويق أو مجال ذي صلة، 5+ سنوات خبرة في التسويق الرقمي'
        ],
        [
            'title' => 'محاسب مالي',
            'work_field_id' => 3,
            'business_man_id' => 3,
            'work_place' => 'الدمام، السعودية',
            'work_experience' => 4,
            'education_level_id' => 3,
            'salary_min' => 7000,
            'salary_max' => 10000,
            'job_type' => 'دوام كامل',
            'skills' => 'المحاسبة المالية, التقارير المالية, Zakat & Tax, ERP Systems, Excel',
            'description' => 'نبحث عن محاسب مالي متمرس للانضمام إلى فريق المحاسبة في الدمام.',
            'requirements' => 'بكالوريوس في المحاسبة، 4+ سنوات خبرة في المحاسبة المالية'
        ],
        [
            'title' => 'مصمم جرافيكي',
            'work_field_id' => 8,
            'business_man_id' => 4,
            'work_place' => 'الرياض، السعودية',
            'work_experience' => 2,
            'education_level_id' => 3,
            'salary_min' => 5000,
            'salary_max' => 8000,
            'job_type' => 'دوام كامل',
            'skills' => 'Adobe Photoshop, Adobe Illustrator, InDesign, Figma, UI/UX Design',
            'description' => 'نبحث عن مصمم جرافيكي موهوب لإنشاء تصميمات إبداعية ومبتكرة.',
            'requirements' => 'بكالوريوس في التصميم الجرافيكي، 2+ سنوات خبرة في التصميم'
        ],
        [
            'title' => 'مهندس برمجيات',
            'work_field_id' => 1,
            'business_man_id' => 5,
            'work_place' => 'جدة، السعودية',
            'work_experience' => 6,
            'education_level_id' => 4,
            'salary_min' => 12000,
            'salary_max' => 18000,
            'job_type' => 'دوام كامل',
            'skills' => 'Java, Spring Boot, Microservices, Docker, Kubernetes, AWS',
            'description' => 'نبحث عن مهندس برمجيات متمرس لتطوير حلول تقنية متقدمة.',
            'requirements' => 'ماجستير في علوم الحاسوب، 6+ سنوات خبرة في تطوير البرمجيات'
        ]
    ];
    
    foreach ($jobs as $job) {
        $sql = "INSERT INTO jobs (
            title, work_field_id, business_man_id, work_place, work_experience, 
            education_level_id, salary_min, salary_max, job_type, skills, 
            description, requirements, status, created_at, updated_at
        ) VALUES (
            '{$job['title']}', {$job['work_field_id']}, {$job['business_man_id']}, 
            '{$job['work_place']}', {$job['work_experience']}, {$job['education_level_id']}, 
            {$job['salary_min']}, {$job['salary_max']}, '{$job['job_type']}', 
            '{$job['skills']}', '{$job['description']}', '{$job['requirements']}', 
            'active', NOW(), NOW()
        )";
        $pdo->exec($sql);
    }
    echo "✓ Created sample jobs\n";
    
    // Show final counts
    echo "\n📊 Final Data Counts:\n";
    $workFields = $pdo->query("SELECT COUNT(*) FROM work_fields")->fetchColumn();
    $countries = $pdo->query("SELECT COUNT(*) FROM countries")->fetchColumn();
    $educationLevels = $pdo->query("SELECT COUNT(*) FROM education_levels")->fetchColumn();
    $jobs = $pdo->query("SELECT COUNT(*) FROM jobs")->fetchColumn();
    $companies = $pdo->query("SELECT COUNT(*) FROM companies")->fetchColumn();
    
    echo "Work Fields: $workFields\n";
    echo "Countries: $countries\n";
    echo "Education Levels: $educationLevels\n";
    echo "Jobs: $jobs\n";
    echo "Companies: $companies\n";
    
    echo "\n✅ Sample data created successfully!\n";
    echo "🎉 You can now test the jobs page!\n";
    
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
} 