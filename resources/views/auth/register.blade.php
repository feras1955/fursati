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
        <div style="max-width: 500px; margin: 2rem auto; background: white; padding: 2rem; border-radius: var(--radius); box-shadow: var(--shadow);">
            <h3 class="section-title" style="text-align: center;">إنشاء حساب جديد</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label>الاسم الكامل</label>
                    <input type="text" class="form-control" name="name" placeholder="ادخل اسمك الكامل" required>
                </div>
                <div class="form-group">
                    <label>البريد الإلكتروني</label>
                    <input type="email" class="form-control" name="email" placeholder="ادخل بريدك الإلكتروني" required>
                </div>
                <div class="form-group">
                    <label>كلمة المرور</label>
                    <input type="password" class="form-control" name="password" placeholder="ادخل كلمة المرور" required>
                </div>
                <div class="form-group">
                    <label>تأكيد كلمة المرور</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="أعد إدخال كلمة المرور" required>
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