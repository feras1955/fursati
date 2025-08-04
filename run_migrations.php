<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Starting migrations...\n";

try {
    $migrator = $app->make('Illuminate\Database\Migrations\Migrator');
    $migrator->run();
    
    echo "Migrations completed successfully!\n";
    
    // Check migration status
    $ran = $migrator->getRepository()->getRan();
    echo "Ran migrations:\n";
    foreach ($ran as $migration) {
        echo "- $migration\n";
    }
    
} catch (Exception $e) {
    echo "Error running migrations: " . $e->getMessage() . "\n";
} 