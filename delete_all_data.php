<?php
// Script to delete ALL data from the database
$host = 'localhost';
$dbname = 'fursati';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "🗑️ Starting complete data deletion...\n\n";
    
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
    
    // Delete data in correct order (respecting foreign keys)
    echo "🗑️ Deleting all data...\n";
    
    // Delete job-related data first
    $pdo->exec("DELETE FROM favorite_jobs");
    echo "✓ Deleted favorite_jobs\n";
    
    $pdo->exec("DELETE FROM job_applications");
    echo "✓ Deleted job_applications\n";
    
    $pdo->exec("DELETE FROM jobs");
    echo "✓ Deleted jobs\n";
    
    // Delete user data
    $pdo->exec("DELETE FROM users WHERE id > 1"); // Keep admin user if exists
    echo "✓ Deleted users (except admin)\n";
    
    // Delete lookup data
    $pdo->exec("DELETE FROM work_fields");
    echo "✓ Deleted work_fields\n";
    
    $pdo->exec("DELETE FROM countries");
    echo "✓ Deleted countries\n";
    
    $pdo->exec("DELETE FROM education_levels");
    echo "✓ Deleted education_levels\n";
    
    $pdo->exec("DELETE FROM companies");
    echo "✓ Deleted companies\n";
    
    // Reset auto-increment counters
    $pdo->exec("ALTER TABLE work_fields AUTO_INCREMENT = 1");
    $pdo->exec("ALTER TABLE countries AUTO_INCREMENT = 1");
    $pdo->exec("ALTER TABLE education_levels AUTO_INCREMENT = 1");
    $pdo->exec("ALTER TABLE jobs AUTO_INCREMENT = 1");
    $pdo->exec("ALTER TABLE companies AUTO_INCREMENT = 1");
    $pdo->exec("ALTER TABLE job_applications AUTO_INCREMENT = 1");
    $pdo->exec("ALTER TABLE favorite_jobs AUTO_INCREMENT = 1");
    echo "✓ Reset auto-increment counters\n";
    
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
    
    echo "\n✅ All data deleted successfully!\n";
    echo "📝 Database is now clean and ready for fresh data.\n";
    
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
} 