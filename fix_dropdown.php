<?php
// Simple script to fix dropdown duplicates
$host = 'localhost';
$dbname = 'fursati';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Fixing dropdown duplicates...\n";
    
    // Clean duplicate work fields
    $pdo->exec("DELETE w1 FROM work_fields w1 INNER JOIN work_fields w2 WHERE w1.id > w2.id AND w1.name = w2.name");
    echo "✓ Cleaned duplicate work fields\n";
    
    // Clean duplicate countries
    $pdo->exec("DELETE c1 FROM countries c1 INNER JOIN countries c2 WHERE c1.id > c2.id AND c1.name = c2.name");
    echo "✓ Cleaned duplicate countries\n";
    
    // Clean duplicate education levels
    $pdo->exec("DELETE e1 FROM education_levels e1 INNER JOIN education_levels e2 WHERE e1.id > e2.id AND e1.name = e2.name");
    echo "✓ Cleaned duplicate education levels\n";
    
    // Show final counts
    $workFields = $pdo->query("SELECT COUNT(*) FROM work_fields")->fetchColumn();
    $countries = $pdo->query("SELECT COUNT(*) FROM countries")->fetchColumn();
    $educationLevels = $pdo->query("SELECT COUNT(*) FROM education_levels")->fetchColumn();
    $jobs = $pdo->query("SELECT COUNT(*) FROM jobs")->fetchColumn();
    
    echo "\n📊 Final Data Counts:\n";
    echo "Work Fields: $workFields\n";
    echo "Countries: $countries\n";
    echo "Education Levels: $educationLevels\n";
    echo "Jobs: $jobs\n";
    
    echo "\n✅ Dropdown duplicates fixed successfully!\n";
    
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
} 