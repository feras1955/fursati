<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    $db = $app->make('Illuminate\Database\Connection');
    
    echo "Checking database tables...\n";
    
    // Check if jobs table exists and has the required columns
    $tables = $db->select('SHOW TABLES');
    echo "Tables in database:\n";
    foreach ($tables as $table) {
        $tableName = array_values((array)$table)[0];
        echo "- $tableName\n";
    }
    
    // Check jobs table structure
    if ($db->getSchemaBuilder()->hasTable('jobs')) {
        echo "\nJobs table columns:\n";
        $columns = $db->select('DESCRIBE jobs');
        foreach ($columns as $column) {
            echo "- {$column->Field} ({$column->Type})\n";
        }
        
        // Check if we have any jobs
        $jobCount = $db->table('jobs')->count();
        echo "\nNumber of jobs in database: $jobCount\n";
        
        if ($jobCount > 0) {
            $jobs = $db->table('jobs')->limit(3)->get();
            echo "Sample jobs:\n";
            foreach ($jobs as $job) {
                echo "- ID: {$job->id}, Title: {$job->title}\n";
            }
        }
    } else {
        echo "\nJobs table does not exist!\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} 