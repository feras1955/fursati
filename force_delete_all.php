<?php
// Force delete ALL data from the database
$host = 'localhost';
$dbname = 'fursati';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "💥 FORCE DELETING ALL DATA...\n\n";
    
    // Disable foreign key checks temporarily
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 0");
    echo "🔓 Disabled foreign key checks\n";
    
    // Show initial counts
    echo "📊 Initial Data Counts:\n";
    $workFields = $pdo->query("SELECT COUNT(*) FROM work_fields")->fetchColumn();
    $countries = $pdo->query("SELECT COUNT(*) FROM countries")->fetchColumn();
    $educationLevels = $pdo->query("SELECT COUNT(*) FROM education_levels")->fetchColumn();
    $jobs = $pdo->query("SELECT COUNT(*) FROM jobs")->fetchColumn();
    $users = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
    $jobApplications = $pdo->query("SELECT COUNT(*) FROM job_applications")->fetchColumn();
    $favoriteJobs = $pdo->query("SELECT COUNT(*) FROM favorite_jobs")->fetchColumn();
    $companies = $pdo->query("SELECT COUNT(*) FROM companies")->fetchColumn();
    
    echo "Work Fields: $workFields\n";
    echo "Countries: $countries\n";
    echo "Education Levels: $educationLevels\n";
    echo "Jobs: $jobs\n";
    echo "Users: $users\n";
    echo "Job Applications: $jobApplications\n";
    echo "Favorite Jobs: $favoriteJobs\n";
    echo "Companies: $companies\n\n";
    
    // Force delete ALL data
    echo "🗑️ FORCE DELETING ALL DATA...\n";
    
    $pdo->exec("TRUNCATE TABLE favorite_jobs");
    echo "✓ TRUNCATED favorite_jobs\n";
    
    $pdo->exec("TRUNCATE TABLE job_applications");
    echo "✓ TRUNCATED job_applications\n";
    
    $pdo->exec("TRUNCATE TABLE jobs");
    echo "✓ TRUNCATED jobs\n";
    
    $pdo->exec("DELETE FROM users WHERE id > 1");
    echo "✓ DELETED users (except admin)\n";
    
    $pdo->exec("TRUNCATE TABLE work_fields");
    echo "✓ TRUNCATED work_fields\n";
    
    $pdo->exec("TRUNCATE TABLE countries");
    echo "✓ TRUNCATED countries\n";
    
    $pdo->exec("TRUNCATE TABLE education_levels");
    echo "✓ TRUNCATED education_levels\n";
    
    $pdo->exec("TRUNCATE TABLE companies");
    echo "✓ TRUNCATED companies\n";
    
    // Re-enable foreign key checks
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 1");
    echo "🔒 Re-enabled foreign key checks\n";
    
    // Show final counts
    echo "\n📊 Final Data Counts:\n";
    $workFields = $pdo->query("SELECT COUNT(*) FROM work_fields")->fetchColumn();
    $countries = $pdo->query("SELECT COUNT(*) FROM countries")->fetchColumn();
    $educationLevels = $pdo->query("SELECT COUNT(*) FROM education_levels")->fetchColumn();
    $jobs = $pdo->query("SELECT COUNT(*) FROM jobs")->fetchColumn();
    $users = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
    $jobApplications = $pdo->query("SELECT COUNT(*) FROM job_applications")->fetchColumn();
    $favoriteJobs = $pdo->query("SELECT COUNT(*) FROM favorite_jobs")->fetchColumn();
    $companies = $pdo->query("SELECT COUNT(*) FROM companies")->fetchColumn();
    
    echo "Work Fields: $workFields\n";
    echo "Countries: $countries\n";
    echo "Education Levels: $educationLevels\n";
    echo "Jobs: $jobs\n";
    echo "Users: $users\n";
    echo "Job Applications: $jobApplications\n";
    echo "Favorite Jobs: $favoriteJobs\n";
    echo "Companies: $companies\n";
    
    echo "\n✅ ALL DATA FORCE DELETED SUCCESSFULLY!\n";
    echo "🗑️ Database is now completely empty!\n";
    
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
} 