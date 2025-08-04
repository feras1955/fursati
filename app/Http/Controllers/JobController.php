<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Country;
use App\Models\WorkField;
use App\Models\EducationLevel;
use App\Models\FavoriteJob;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::with(['businessMan', 'educationLevel', 'workField', 'countryOfGraduation', 'countryOfResidence'])
            ->where('status', 'active');

        // فلترة حسب المعايير
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }

        if ($request->filled('field')) {
            $query->whereHas('workField', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->field . '%');
            });
        }

        if ($request->filled('location')) {
            $query->where('work_place', 'like', '%' . $request->location . '%');
        }

        if ($request->filled('type')) {
            $query->where('job_type', $request->type);
        }

        if ($request->filled('salary')) {
            $salaryRange = $request->salary;
            if ($salaryRange == '3000-5000') {
                $query->where('salary_range', 'like', '%3000%')->orWhere('salary_range', 'like', '%5000%');
            } elseif ($salaryRange == '5000-8000') {
                $query->where('salary_range', 'like', '%5000%')->orWhere('salary_range', 'like', '%8000%');
            } elseif ($salaryRange == '8000-12000') {
                $query->where('salary_range', 'like', '%8000%')->orWhere('salary_range', 'like', '%12000%');
            } elseif ($salaryRange == '12000-18000') {
                $query->where('salary_range', 'like', '%12000%')->orWhere('salary_range', 'like', '%18000%');
            } elseif ($salaryRange == '18000+') {
                $query->where('salary_range', 'like', '%18000%')->orWhere('salary_range', 'like', '%22000%');
            }
        }

        $jobs = $query->latest()->paginate(10);

        // البيانات للفلترة
        $countries = Country::all();
        $workFields = WorkField::all();
        $educationLevels = EducationLevel::all();

        return view('jobs.index', compact('jobs', 'countries', 'workFields', 'educationLevels'));
    }

    public function show($id)
    {
        $job = Job::with(['businessMan', 'educationLevel', 'workField', 'countryOfGraduation', 'countryOfResidence'])
            ->findOrFail($id);

        // التحقق من إضافة الوظيفة للمفضلة
        $isFavorite = false;
        if (Auth::check()) {
            $isFavorite = FavoriteJob::where('job_id', $id)
                ->where('user_id', Auth::id())
                ->exists();
        }

        // التحقق من التقدم للوظيفة
        $hasApplied = false;
        if (Auth::check()) {
            $hasApplied = JobApplication::where('job_id', $id)
                ->where('user_id', Auth::id())
                ->exists();
        }

        return view('jobs.show', compact('job', 'isFavorite', 'hasApplied'));
    }

    public function toggleBookmark($id)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'يجب تسجيل الدخول أولاً']);
        }

        $job = Job::findOrFail($id);
        $userId = Auth::id();

        // Check if bookmark exists in job_bookmarks table
        $bookmark = DB::table('job_bookmarks')
            ->where('job_id', $id)
            ->where('user_id', $userId)
            ->first();

        if ($bookmark) {
            // Remove bookmark
            DB::table('job_bookmarks')
                ->where('job_id', $id)
                ->where('user_id', $userId)
                ->delete();
            $message = 'تم إزالة الوظيفة من المحفوظات';
            $isBookmarked = false;
        } else {
            // Add bookmark
            DB::table('job_bookmarks')->insert([
                'job_id' => $id,
                'user_id' => $userId,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $message = 'تم إضافة الوظيفة للمحفوظات';
            $isBookmarked = true;
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'isBookmarked' => $isBookmarked
        ]);
    }

    public function apply(Request $request, $id)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'يجب تسجيل الدخول أولاً']);
        }

        $job = Job::findOrFail($id);
        $userId = Auth::id();

        // التحقق من عدم التقدم مسبقاً
        $existingApplication = JobApplication::where('job_id', $id)
            ->where('user_id', $userId)
            ->first();

        if ($existingApplication) {
            return response()->json(['success' => false, 'message' => 'لقد تقدمت لهذه الوظيفة مسبقاً']);
        }

        // التحقق من وجود فيديو
        if (!$request->hasFile('video')) {
            return response()->json(['success' => false, 'message' => 'يجب رفع فيديو']);
        }

        $request->validate([
            'video' => 'required|file|mimes:mp4,avi,mov|max:10240', // 10MB max
            'cover_letter' => 'nullable|string|max:1000',
        ]);

        // حفظ الفيديو
        $videoPath = $request->file('video')->store('applications/videos', 'public');

        // إنشاء طلب التوظيف
        JobApplication::create([
            'job_id' => $id,
            'user_id' => $userId,
            'video' => $videoPath,
            'cover_letter' => $request->cover_letter,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'تم التقدم للوظيفة بنجاح'
        ]);
    }

    public function search(Request $request)
    {
        return view('jobs.index');
    }

    public function filter(Request $request)
    {
        return view('jobs.index');
    }

    public function apiSearch(Request $request)
    {
        return response()->json(['results' => []]);
    }

    public function apiFilter(Request $request)
    {
        return response()->json(['results' => []]);
    }
}