@extends('layouts.app')

@section('title', 'تسجيل الدخول - فرصتي')

@section('content')
<!-- Login Page (مطابق للكود الأصلي) -->
<section id="login" class="page-container active" style="padding:0;">
    <div class="container">
        <div class="welcome-section">
            <h1 class="welcome-title">مرحباً بك في منصة فرصتي</h1>
            <p class="welcome-text">سجل الدخول أو أنشئ حساباً جديداً للوصول إلى آلاف الفرص الوظيفية المميزة</p>
        </div>
        <div style="max-width: 500px; margin: 2rem auto; background: white; padding: 2rem; border-radius: var(--radius); box-shadow: var(--shadow);">
            <h3 class="section-title" style="text-align: center;">تسجيل الدخول</h3>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin: 0; padding-right: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label>البريد الإلكتروني</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="ادخل بريدك الإلكتروني" required autofocus>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>كلمة المرور</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="ادخل كلمة المرور" required>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group" style="text-align: left;">
                    <div class="checkbox-group">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">تذكرني</label>
                    </div>
                </div>
                <button class="btn btn-primary d-flex justify-content-center align-items-center" style="width: 100%; text-align: center;" type="submit">تسجيل الدخول</button>
                <div style="text-align: center; margin: 1.5rem 0;">
                    <a href="{{ route('password.request') }}" style="color: var(--primary);">نسيت كلمة المرور؟</a>
                </div>
                <div style="text-align: center; margin-top: 2rem;">
                    <p>ليس لديك حساب؟ <a href="{{ route('register') }}" style="color: var(--primary); font-weight: 600;">أنشئ حساب جديد</a></p>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection 