<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    echo "Cleaning duplicate data...\n";
    
    // Clean duplicate work fields
    $duplicates = \App\Models\WorkField::select('name')
        ->groupBy('name')
        ->havingRaw('COUNT(*) > 1')
        ->get();
    
    foreach ($duplicates as $duplicate) {
        $fields = \App\Models\WorkField::where('name', $duplicate->name)->get();
        // Keep the first one, delete the rest
        for ($i = 1; $i < count($fields); $i++) {
            $fields[$i]->delete();
        }
        echo "Cleaned duplicates for: {$duplicate->name}\n";
    }
    
    // Clean duplicate countries
    $duplicates = \App\Models\Country::select('name')
        ->groupBy('name')
        ->havingRaw('COUNT(*) > 1')
        ->get();
    
    foreach ($duplicates as $duplicate) {
        $countries = \App\Models\Country::where('name', $duplicate->name)->get();
        // Keep the first one, delete the rest
        for ($i = 1; $i < count($countries); $i++) {
            $countries[$i]->delete();
        }
        echo "Cleaned duplicates for: {$duplicate->name}\n";
    }
    
    // Clean duplicate education levels
    $duplicates = \App\Models\EducationLevel::select('name')
        ->groupBy('name')
        ->havingRaw('COUNT(*) > 1')
        ->get();
    
    foreach ($duplicates as $duplicate) {
        $levels = \App\Models\EducationLevel::where('name', $duplicate->name)->get();
        // Keep the first one, delete the rest
        for ($i = 1; $i < count($levels); $i++) {
            $levels[$i]->delete();
        }
        echo "Cleaned duplicates for: {$duplicate->name}\n";
    }
    
    echo "Data cleaning completed!\n";
    
    // Show current counts
    echo "\nCurrent data counts:\n";
    echo "Work Fields: " . \App\Models\WorkField::count() . "\n";
    echo "Countries: " . \App\Models\Country::count() . "\n";
    echo "Education Levels: " . \App\Models\EducationLevel::count() . "\n";
    echo "Jobs: " . \App\Models\Job::count() . "\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} 