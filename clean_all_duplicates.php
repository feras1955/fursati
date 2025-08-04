<?php
// Comprehensive script to clean ALL duplicates
$host = 'localhost';
$dbname = 'fursati';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "🧹 Starting comprehensive duplicate cleanup...\n\n";
    
    // Show initial counts
    echo "📊 Initial Data Counts:\n";
    $workFields = $pdo->query("SELECT COUNT(*) FROM work_fields")->fetchColumn();
    $countries = $pdo->query("SELECT COUNT(*) FROM countries")->fetchColumn();
    $educationLevels = $pdo->query("SELECT COUNT(*) FROM education_levels")->fetchColumn();
    $jobs = $pdo->query("SELECT COUNT(*) FROM jobs")->fetchColumn();
    
    echo "Work Fields: $workFields\n";
    echo "Countries: $countries\n";
    echo "Education Levels: $educationLevels\n";
    echo "Jobs: $jobs\n\n";
    
    // Clean work_fields - keep only unique names
    echo "🔧 Cleaning work_fields...\n";
    $pdo->exec("DELETE w1 FROM work_fields w1 
                INNER JOIN work_fields w2 
                WHERE w1.id > w2.id AND w1.name = w2.name");
    $deleted = $pdo->query("SELECT ROW_COUNT()")->fetchColumn();
    echo "✓ Deleted $deleted duplicate work fields\n";
    
    // Clean countries - keep only unique names
    echo "🔧 Cleaning countries...\n";
    $pdo->exec("DELETE c1 FROM countries c1 
                INNER JOIN countries c2 
                WHERE c1.id > c2.id AND c1.name = c2.name");
    $deleted = $pdo->query("SELECT ROW_COUNT()")->fetchColumn();
    echo "✓ Deleted $deleted duplicate countries\n";
    
    // Clean education_levels - keep only unique names
    echo "🔧 Cleaning education_levels...\n";
    $pdo->exec("DELETE e1 FROM education_levels e1 
                INNER JOIN education_levels e2 
                WHERE e1.id > e2.id AND e1.name = e2.name");
    $deleted = $pdo->query("SELECT ROW_COUNT()")->fetchColumn();
    echo "✓ Deleted $deleted duplicate education levels\n";
    
    // Show final counts
    echo "\n📊 Final Data Counts:\n";
    $workFields = $pdo->query("SELECT COUNT(*) FROM work_fields")->fetchColumn();
    $countries = $pdo->query("SELECT COUNT(*) FROM countries")->fetchColumn();
    $educationLevels = $pdo->query("SELECT COUNT(*) FROM education_levels")->fetchColumn();
    $jobs = $pdo->query("SELECT COUNT(*) FROM jobs")->fetchColumn();
    
    echo "Work Fields: $workFields\n";
    echo "Countries: $countries\n";
    echo "Education Levels: $educationLevels\n";
    echo "Jobs: $jobs\n\n";
    
    // Show sample data to verify
    echo "📋 Sample Data Verification:\n";
    echo "Work Fields:\n";
    $fields = $pdo->query("SELECT id, name FROM work_fields ORDER BY id LIMIT 5")->fetchAll();
    foreach ($fields as $field) {
        echo "  - ID: {$field['id']}, Name: {$field['name']}\n";
    }
    
    echo "\nCountries:\n";
    $countries = $pdo->query("SELECT id, name FROM countries ORDER BY id LIMIT 5")->fetchAll();
    foreach ($countries as $country) {
        echo "  - ID: {$country['id']}, Name: {$country['name']}\n";
    }
    
    echo "\nEducation Levels:\n";
    $levels = $pdo->query("SELECT id, name FROM education_levels ORDER BY id LIMIT 5")->fetchAll();
    foreach ($levels as $level) {
        echo "  - ID: {$level['id']}, Name: {$level['name']}\n";
    }
    
    echo "\n✅ All duplicates cleaned successfully!\n";
    
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
} 