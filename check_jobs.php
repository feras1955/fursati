<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Job;

echo "=== فحص بيانات الوظائف ===\n";

$jobs = Job::with(['businessMan', 'workField', 'educationLevel'])->take(3)->get();

foreach ($jobs as $job) {
    echo "ID: " . $job->id . "\n";
    echo "العنوان: " . ($job->title ?? 'غير محدد') . "\n";
    echo "الشركة: " . ($job->businessMan ? $job->businessMan->name : 'غير محدد') . "\n";
    echo "المجال: " . ($job->workField ? $job->workField->name : 'غير محدد') . "\n";
    echo "الوصف: " . substr($job->description ?? 'غير محدد', 0, 100) . "...\n";
    echo "الراتب الأدنى: " . ($job->salary_min ?? 'غير محدد') . "\n";
    echo "الراتب الأعلى: " . ($job->salary_max ?? 'غير محدد') . "\n";
    echo "مكان العمل: " . ($job->work_place ?? 'غير محدد') . "\n";
    echo "نوع العمل: " . ($job->job_type ?? 'غير محدد') . "\n";
    echo "الحالة: " . ($job->status ?? 'غير محدد') . "\n";
    echo "-------------------\n";
}

echo "إجمالي الوظائف: " . Job::count() . "\n";
echo "الوظائف النشطة: " . Job::where('status', 'active')->count() . "\n";
