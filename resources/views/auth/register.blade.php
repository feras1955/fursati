@extends('layouts.app')

@section('title', 'إنشاء حساب جديد - فرصتي')

@section('content')
<!-- Register Page (مطابق للكود الأصلي) -->
<section id="register" class="page-container active" style="padding:0;">
    <div class="container">
        <div class="welcome-section">
            <h1 class="welcome-title">مرحباً بك في منصة فرصتي</h1>
            <p class="welcome-text">سجل الدخول أو أنشئ حساباً جديداً للوصول إلى آلاف الفرص الوظيفية المميزة</p>
        </div>
        <div style="max-width: 600px; margin: 2rem auto; background: white; padding: 2rem; border-radius: var(--radius); box-shadow: var(--shadow);">
            <h3 class="section-title" style="text-align: center;">إنشاء حساب جديد</h3>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin: 0; padding-right: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label>الاسم الكامل *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="ادخل اسمك الكامل" required>
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>البريد الإلكتروني *</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="ادخل بريدك الإلكتروني" required>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>كلمة المرور *</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="ادخل كلمة المرور (8 أحرف على الأقل)" required>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>تأكيد كلمة المرور *</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="أعد إدخال كلمة المرور" required>
                </div>
                
                <div class="form-group">
                    <label>نوع الحساب *</label>
                    <select class="form-control @error('role') is-invalid @enderror" name="role" required>
                        <option value="">اختر نوع الحساب</option>
                        <option value="job_seeker" {{ old('role') == 'job_seeker' ? 'selected' : '' }}>باحث عن عمل</option>
                        <option value="business_man" {{ old('role') == 'business_man' ? 'selected' : '' }}>صاحب عمل</option>
                    </select>
                    @error('role')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>الدولة *</label>
                    <select class="form-control @error('country_id') is-invalid @enderror" name="country_id" required>
                        <option value="">اختر الدولة</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('country_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>مستوى التعليم</label>
                    <select class="form-control @error('education_level_id') is-invalid @enderror" name="education_level_id">
                        <option value="">اختر مستوى التعليم</option>
                        @foreach($educationLevels as $level)
                            <option value="{{ $level->id }}" {{ old('education_level_id') == $level->id ? 'selected' : '' }}>
                                {{ $level->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('education_level_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>سنوات الخبرة</label>
                    <input type="number" class="form-control @error('work_experience') is-invalid @enderror" name="work_experience" value="{{ old('work_experience') }}" placeholder="عدد سنوات الخبرة" min="0">
                    @error('work_experience')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>رقم الهاتف</label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="+966501234567">
                    @error('phone')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>نبذة شخصية</label>
                    <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" rows="3" placeholder="اكتب نبذة مختصرة عنك">{{ old('bio') }}</textarea>
                    @error('bio')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <button class="btn btn-primary d-flex justify-content-center align-items-center" style="width: 100%; text-align: center;" type="submit">إنشاء الحساب</button>
                <div style="text-align: center; margin-top: 2rem;">
                    <p>لديك حساب بالفعل؟ <a href="{{ route('login') }}" style="color: var(--primary); font-weight: 600;">تسجيل الدخول</a></p>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection 