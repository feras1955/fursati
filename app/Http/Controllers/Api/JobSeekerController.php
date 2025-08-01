<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\FavoriteJob;
use App\Models\JobApplication;
use App\Models\Country;
use App\Models\WorkField;
use App\Models\EducationLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobSeekerController extends Controller
{
    /**
     * عرض جميع الوظائف مع فلترة
     */
    public function getAllJobs(Request $request)
    {
        $query = Job::with(['businessMan', 'educationLevel', 'workField', 'countryOfGraduation', 'countryOfResidence'])
            ->active();

        // فلترة حسب المعايير
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('work_place')) {
            $query->where('work_place', 'like', '%' . $request->work_place . '%');
        }

        if ($request->filled('work_field_id')) {
            $query->where('work_field_id', $request->work_field_id);
        }

        if ($request->filled('country_of_graduation')) {
            $query->where('country_of_graduation', $request->country_of_graduation);
        }

        if ($request->filled('country_of_residence')) {
            $query->where('country_of_residence', $request->country_of_residence);
        }

        if ($request->filled('education_level_id')) {
            $query->where('education_level_id', $request->education_level_id);
        }

        if ($request->filled('gender_preference')) {
            $query->where('gender_preference', $request->gender_preference);
        }

        if ($request->filled('work_experience')) {
            $query->where('work_experience', '<=', $request->work_experience);
        }

        if ($request->filled('business_man_id')) {
            $query->where('business_man_id', $request->business_man_id);
        }

        // فلترة حسب التاريخ إذا تم توفيره
        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $jobs = $query->latest()->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $jobs,
            'message' => 'تم جلب الوظائف بنجاح'
        ]);
    }

    /**
     * عرض تفاصيل وظيفة محددة
     */
    public function getJobDetails($id)
    {
        $job = Job::with(['businessMan', 'educationLevel', 'workField', 'countryOfGraduation', 'countryOfResidence'])
            ->active()
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $job,
            'message' => 'تم جلب تفاصيل الوظيفة بنجاح'
        ]);
    }

    /**
     * إضافة/إزالة وظيفة من المفضلة
     */
    public function markFavorite($jobId)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'يجب تسجيل الدخول أولاً'
            ], 401);
        }

        $job = Job::findOrFail($jobId);
        $userId = Auth::id();

        $favorite = FavoriteJob::where('job_id', $jobId)
            ->where('user_id', $userId)
            ->first();

        if ($favorite) {
            $favorite->delete();
            $message = 'تم إزالة الوظيفة من المفضلة';
            $isFavorite = false;
        } else {
            FavoriteJob::create([
                'job_id' => $jobId,
                'user_id' => $userId
            ]);
            $message = 'تم إضافة الوظيفة للمفضلة';
            $isFavorite = true;
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'isFavorite' => $isFavorite
        ]);
    }

    /**
     * عرض الوظائف المفضلة
     */
    public function getFavoriteJobs()
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'يجب تسجيل الدخول أولاً'
            ], 401);
        }

        $favoriteJobs = FavoriteJob::with(['job.businessMan', 'job.educationLevel', 'job.workField', 'job.countryOfGraduation', 'job.countryOfResidence'])
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $favoriteJobs,
            'message' => 'تم جلب الوظائف المفضلة بنجاح'
        ]);
    }

    /**
     * التقدم لوظيفة
     */
    public function applyForJob(Request $request, $jobId)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'يجب تسجيل الدخول أولاً'
            ], 401);
        }

        $job = Job::findOrFail($jobId);
        $userId = Auth::id();

        // التحقق من عدم التقدم مسبقاً
        $existingApplication = JobApplication::where('job_id', $jobId)
            ->where('user_id', $userId)
            ->first();

        if ($existingApplication) {
            return response()->json([
                'success' => false,
                'message' => 'لقد تقدمت لهذه الوظيفة مسبقاً'
            ], 400);
        }

        // التحقق من وجود فيديو
        if (!$request->hasFile('video')) {
            return response()->json([
                'success' => false,
                'message' => 'يجب رفع فيديو'
            ], 400);
        }

        $request->validate([
            'video' => 'required|file|mimes:mp4,avi,mov|max:10240', // 10MB max
        ]);

        // حفظ الفيديو
        $videoPath = $request->file('video')->store('applications/videos', 'public');

        // إنشاء طلب التوظيف
        JobApplication::create([
            'job_id' => $jobId,
            'user_id' => $userId,
            'video' => $videoPath,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'تم التقدم للوظيفة بنجاح'
        ]);
    }
} 