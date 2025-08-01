<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Country;
use App\Models\EducationLevel;
use App\Models\JobApplication;
use App\Models\FavoriteJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user()->load(['country', 'educationLevel']);
        $countries = Country::all();
        $educationLevels = EducationLevel::all();
        
        return view('profile.index', compact('user', 'countries', 'educationLevels'));
    }

    public function edit()
    {
        $user = Auth::user()->load(['country', 'educationLevel']);
        $countries = Country::all();
        $educationLevels = EducationLevel::all();
        
        return view('profile.edit', compact('user', 'countries', 'educationLevels'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'country_id' => 'required|exists:countries,id',
            'education_level_id' => 'nullable|exists:education_levels,id',
            'work_experience' => 'nullable|integer|min:0',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:1000',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->country_id = $request->country_id;
        $user->education_level_id = $request->education_level_id;
        $user->work_experience = $request->work_experience ?? 0;
        $user->phone = $request->phone;
        $user->bio = $request->bio;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'تم تحديث الملف الشخصي بنجاح!');
    }

    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            // حذف الصورة القديمة إذا وجدت
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            // حفظ الصورة الجديدة
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->profile_image = $path;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'تم رفع الصورة بنجاح',
                'avatar_url' => Storage::url($path)
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'لم يتم رفع أي ملف'
        ], 400);
    }

    public function uploadCV(Request $request)
    {
        $request->validate([
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120'
        ]);

        $user = Auth::user();

        if ($request->hasFile('cv')) {
            // حذف الملف القديم إذا وجد
            if ($user->cv_path) {
                Storage::disk('public')->delete($user->cv_path);
            }

            // حفظ الملف الجديد
            $path = $request->file('cv')->store('cvs', 'public');
            $user->cv_path = $path;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'تم رفع السيرة الذاتية بنجاح',
                'cv_url' => Storage::url($path)
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'لم يتم رفع أي ملف'
        ], 400);
    }
}