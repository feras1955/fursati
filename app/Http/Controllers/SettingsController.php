<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('settings.index', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:500',
            'location' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'البيانات غير صحيحة',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $user = Auth::user();
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'bio' => $request->bio,
                'location' => $request->location,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'تم تحديث الملف الشخصي بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء تحديث الملف الشخصي'
            ], 500);
        }
    }

    public function updateNotifications(Request $request)
    {
        try {
            $user = Auth::user();
            
            // حفظ إعدادات الإشعارات في JSON field أو جدول منفصل
            $notifications = [
                'email_jobs' => $request->boolean('email_jobs'),
                'email_applications' => $request->boolean('email_applications'),
                'sms_jobs' => $request->boolean('sms_jobs'),
                'push_notifications' => $request->boolean('push_notifications'),
            ];

            $user->update([
                'notification_settings' => json_encode($notifications)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'تم تحديث إعدادات الإشعارات بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء تحديث إعدادات الإشعارات'
            ], 500);
        }
    }

    public function updatePrivacy(Request $request)
    {
        try {
            $user = Auth::user();
            
            $privacy = [
                'profile_visibility' => $request->input('profile_visibility', 'public'),
                'show_email' => $request->boolean('show_email'),
                'show_phone' => $request->boolean('show_phone'),
                'allow_messages' => $request->boolean('allow_messages'),
            ];

            $user->update([
                'privacy_settings' => json_encode($privacy)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'تم تحديث إعدادات الخصوصية بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء تحديث إعدادات الخصوصية'
            ], 500);
        }
    }

    public function updateLanguage(Request $request)
    {
        try {
            $user = Auth::user();
            $language = $request->input('language', 'ar');
            
            $user->update(['preferred_language' => $language]);

            return response()->json([
                'success' => true,
                'message' => 'تم تحديث إعدادات اللغة بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء تحديث إعدادات اللغة'
            ], 500);
        }
    }

    public function updateSecurity(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'البيانات غير صحيحة',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $user = Auth::user();
            
            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'كلمة المرور الحالية غير صحيحة'
                ], 422);
            }

            $user->update([
                'password' => Hash::make($request->new_password)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'تم تحديث كلمة المرور بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء تحديث كلمة المرور'
            ], 500);
        }
    }

    public function changeLanguage(Request $request)
    {
        try {
            $language = $request->input('language', 'ar');
            session(['locale' => $language]);
            
            if (Auth::check()) {
                Auth::user()->update(['preferred_language' => $language]);
            }

            return response()->json([
                'success' => true,
                'message' => 'تم تغيير اللغة بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء تغيير اللغة'
            ], 500);
        }
    }

    public function exportData(Request $request)
    {
        try {
            $user = Auth::user();
            
            // جمع بيانات المستخدم
            $userData = [
                'profile' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'bio' => $user->bio,
                    'location' => $user->location,
                    'created_at' => $user->created_at,
                ],
                'bookmarks' => DB::table('job_bookmarks')
                    ->join('jobs', 'job_bookmarks.job_id', '=', 'jobs.id')
                    ->where('job_bookmarks.user_id', $user->id)
                    ->select('jobs.title', 'jobs.work_place', 'job_bookmarks.created_at')
                    ->get(),
                'applications' => DB::table('job_applications')
                    ->join('jobs', 'job_applications.job_id', '=', 'jobs.id')
                    ->where('job_applications.user_id', $user->id)
                    ->select('jobs.title', 'jobs.work_place', 'job_applications.created_at', 'job_applications.status')
                    ->get()
            ];

            $fileName = 'user_data_' . $user->id . '_' . date('Y-m-d') . '.json';
            $filePath = storage_path('app/temp/' . $fileName);
            
            // إنشاء مجلد temp إذا لم يكن موجود
            if (!file_exists(dirname($filePath))) {
                mkdir(dirname($filePath), 0755, true);
            }
            
            file_put_contents($filePath, json_encode($userData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            return response()->download($filePath, $fileName)->deleteFileAfterSend();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء تصدير البيانات'
            ], 500);
        }
    }

    public function deleteAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'confirmation' => 'required|in:DELETE'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'البيانات غير صحيحة'
            ], 422);
        }

        try {
            $user = Auth::user();
            
            if (!Hash::check($request->password, $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'كلمة المرور غير صحيحة'
                ], 422);
            }

            // حذف البيانات المرتبطة
            DB::table('job_bookmarks')->where('user_id', $user->id)->delete();
            DB::table('job_applications')->where('user_id', $user->id)->delete();
            
            // حذف الحساب
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'تم حذف الحساب بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء حذف الحساب'
            ], 500);
        }
    }

    public function logoutAllDevices(Request $request)
    {
        try {
            $user = Auth::user();
            
            // إبطال جميع الجلسات
            DB::table('sessions')->where('user_id', $user->id)->delete();
            
            // تحديث remember_token
            $user->update(['remember_token' => null]);

            return response()->json([
                'success' => true,
                'message' => 'تم تسجيل الخروج من جميع الأجهزة بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء تسجيل الخروج'
            ], 500);
        }
    }
}