<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Country;
use App\Models\EducationLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // التحقق من صحة البيانات
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // محاولة تسجيل الدخول
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'))->with('success', 'تم تسجيل الدخول بنجاح!');
        }

        return back()->withErrors([
            'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.',
        ])->withInput();
    }

    public function showRegister()
    {
        $countries = Country::all();
        $educationLevels = EducationLevel::all();
        return view('auth.register', compact('countries', 'educationLevels'));
    }

    public function register(Request $request)
    {
        // التحقق من صحة البيانات
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:job_seeker,business_man',
            'country_id' => 'required|exists:countries,id',
            'education_level_id' => 'nullable|exists:education_levels,id',
            'work_experience' => 'nullable|integer|min:0',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // إنشاء المستخدم الجديد
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'country_id' => $request->country_id,
            'education_level_id' => $request->education_level_id,
            'work_experience' => $request->work_experience ?? 0,
            'phone' => $request->phone,
            'bio' => $request->bio,
        ]);

        // تسجيل الدخول تلقائياً
        Auth::login($user);

        return redirect()->route('home')->with('success', 'تم التسجيل بنجاح!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('home')->with('success', 'تم تسجيل الخروج بنجاح!');
    }

    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        // Placeholder for forgot password logic
        return redirect()->route('login');
    }

    public function showResetPassword($token)
    {
        return view('auth.reset-password', compact('token'));
    }

    public function resetPassword(Request $request)
    {
        // Placeholder for reset password logic
        return redirect()->route('login');
    }

    public function redirectToProvider($provider)
    {
        // Placeholder for social login
        return redirect()->route('login');
    }

    public function handleProviderCallback($provider)
    {
        // Placeholder for social login callback
        return redirect()->route('home');
    }
}