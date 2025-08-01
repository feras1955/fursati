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
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::with(['businessMan', 'educationLevel', 'workField', 'countryOfGraduation', 'countryOfResidence'])
            ->where('status', 'active');

        // فلترة حسب المعايير
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
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

        $favorite = FavoriteJob::where('job_id', $id)
            ->where('user_id', $userId)
            ->first();

        if ($favorite) {
            $favorite->delete();
            $message = 'تم إزالة الوظيفة من المفضلة';
            $isFavorite = false;
        } else {
            FavoriteJob::create([
                'job_id' => $id,
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