<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Starting database setup...\n";

try {
    // Run migrations
    echo "Running migrations...\n";
    $migrator = $app->make('Illuminate\Database\Migrations\Migrator');
    $migrator->run();
    echo "Migrations completed!\n";
    
    // Run seeders
    echo "Running seeders...\n";
    $seeder = $app->make('Illuminate\Database\Seeder');
    
    // Run specific seeders
    $seeders = [
        'DatabaseSeeder',
        'CountrySeeder', 
        'EducationLevelSeeder',
        'WorkFieldSeeder',
        'CompanySeeder',
        'FAQSeeder',
        'PolicySeeder',
        'JobSeeder'
    ];
    
    foreach ($seeders as $seederClass) {
        echo "Running $seederClass...\n";
        $seederInstance = $app->make("Database\\Seeders\\$seederClass");
        $seederInstance->run();
    }
    
    echo "Database setup completed successfully!\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
} 