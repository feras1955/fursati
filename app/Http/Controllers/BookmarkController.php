<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class BookmarkController extends Controller
{
    public function index(Request $request)
    {
        // Get user's bookmarked jobs
        $bookmarkedJobs = collect();
        if (Auth::check()) {
            $query = DB::table('job_bookmarks')
                ->join('jobs', 'job_bookmarks.job_id', '=', 'jobs.id')
                ->leftJoin('countries as residence_country', 'jobs.country_of_residence', '=', 'residence_country.id')
                ->leftJoin('work_fields', 'jobs.work_field_id', '=', 'work_fields.id')
                ->leftJoin('education_levels', 'jobs.education_level_id', '=', 'education_levels.id')
                ->where('job_bookmarks.user_id', Auth::id())
                ->select(
                    'jobs.*',
                    'residence_country.name as country_name',
                    'work_fields.name as work_field_name',
                    'education_levels.name as education_level_name'
                );
            
            // إضافة البحث إذا تم إدخال كلمة بحث
            if ($request->filled('search')) {
                $search = $request->get('search');
                $query->where(function($q) use ($search) {
                    $q->where('jobs.title', 'LIKE', "%{$search}%")
                      ->orWhere('jobs.description', 'LIKE', "%{$search}%")
                      ->orWhere('jobs.work_place', 'LIKE', "%{$search}%")
                      ->orWhere('residence_country.name', 'LIKE', "%{$search}%")
                      ->orWhere('work_fields.name', 'LIKE', "%{$search}%")
                      ->orWhere('education_levels.name', 'LIKE', "%{$search}%");
                });
            }
            
            // ترتيب حسب تاريخ الحفظ (الأحدث أولاً)
            $bookmarkedJobs = $query->orderBy('job_bookmarks.created_at', 'desc')->get();
        }
        
        return view('bookmarks.index', compact('bookmarkedJobs'));
    }

    public function clearAll(Request $request)
    {
        try {
            if (!Auth::check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'يجب تسجيل الدخول أولاً'
                ], 401);
            }

            // Delete all bookmarks for the current user
            $deleted = DB::table('job_bookmarks')
                ->where('user_id', Auth::id())
                ->delete();

            return response()->json([
                'success' => true,
                'message' => 'تم مسح جميع الوظائف المحفوظة بنجاح',
                'deleted_count' => $deleted
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء مسح المحفوظات: ' . $e->getMessage()
            ], 500);
        }
    }

    public function export(Request $request)
    {
        try {
            if (!Auth::check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'يجب تسجيل الدخول أولاً'
                ], 401);
            }

            // Get user's bookmarked jobs
            $bookmarkedJobs = DB::table('job_bookmarks')
                ->join('jobs', 'job_bookmarks.job_id', '=', 'jobs.id')
                ->leftJoin('companies', 'jobs.company_id', '=', 'companies.id')
                ->where('job_bookmarks.user_id', Auth::id())
                ->select(
                    'jobs.title',
                    'jobs.description',
                    'jobs.salary_min',
                    'jobs.salary_max',
                    'jobs.location',
                    'jobs.type',
                    'jobs.created_at',
                    'companies.name as company_name'
                )
                ->get();

            if ($bookmarkedJobs->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'لا توجد وظائف محفوظة للتصدير'
                ], 404);
            }

            // Generate text file for export
            $filename = 'saved_jobs_' . date('Y-m-d') . '.txt';
            
            // For now, return a simple text file as PDF generation requires additional setup
            $content = "الوظائف المحفوظة\n\n";
            foreach ($bookmarkedJobs as $job) {
                $content .= "العنوان: {$job->title}\n";
                $content .= "الشركة: {$job->company_name}\n";
                $content .= "الموقع: {$job->location}\n";
                $content .= "النوع: {$job->type}\n";
                if ($job->salary_min && $job->salary_max) {
                    $content .= "الراتب: {$job->salary_min} - {$job->salary_max} ريال\n";
                }
                $content .= "تاريخ النشر: " . date('Y-m-d', strtotime($job->created_at)) . "\n";
                $content .= "الوصف: " . strip_tags($job->description) . "\n";
                $content .= "\n" . str_repeat('-', 50) . "\n\n";
            }

            return Response::make($content, 200, [
                'Content-Type' => 'text/plain; charset=utf-8',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء تصدير المحفوظات: ' . $e->getMessage()
            ], 500);
        }
    }
}