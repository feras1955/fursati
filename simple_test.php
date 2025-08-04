<?php
// Simple test script
echo "Testing PHP...\n";

// Test database connection
try {
    $pdo = new PDO("mysql:host=localhost;dbname=fursati;charset=utf8", "root", "");
    echo "Database connection successful!\n";
    
    // Test if tables exist
    $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
    echo "Tables found: " . implode(", ", $tables) . "\n";
    
    // Test if jobs table has data
    $jobCount = $pdo->query("SELECT COUNT(*) FROM jobs")->fetchColumn();
    echo "Jobs count: $jobCount\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?> 