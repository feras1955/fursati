@extends('layouts.app')

@section('title', 'الملف الشخصي - فرصتي')

@section('content')
<!-- Profile Page (مطابق للكود الأصلي) -->
<section id="profile" class="page-container active" style="padding:0;">
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="page-header">
            <h2 class="page-title">الملف الشخصي</h2>
            <a href="{{ route('profile.edit') }}" class="btn btn-outline">
                <i class="fas fa-edit"></i> تعديل الملف
            </a>
        </div>
        <div class="profile-container">
            <div class="profile-sidebar">
                <div class="profile-header">
                    <div class="profile-avatar">
                        @if($user->profile_image)
                            <img src="{{ Storage::url($user->profile_image) }}" alt="صورة الملف الشخصي">
                        @else
                            <i class="fas fa-user"></i>
                        @endif
                    </div>
                    <h3 class="profile-name">{{ $user->name }}</h3>
                    <p class="profile-title">{{ $user->role == 'job_seeker' ? 'باحث عن عمل' : 'صاحب عمل' }}</p>
                </div>
                <div class="profile-stats">
                    <div class="stat-item">
                        <div class="stat-value">24</div>
                        <div class="stat-label">التقديمات</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">8</div>
                        <div class="stat-label">المقابلات</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">3</div>
                        <div class="stat-label">العروض</div>
                    </div>
                </div>
                <div class="profile-bio">
                    <h4>نبذة عني</h4>
                    <p>{{ $user->bio ?: 'لم يتم إضافة نبذة شخصية بعد.' }}</p>
                </div>
            </div>
            <div class="profile-content">
                <h3 class="section-title">المعلومات الشخصية</h3>
                <div class="bio-content">
                    <p><strong>البريد الإلكتروني:</strong> {{ $user->email }}</p>
                    <p><strong>الدولة:</strong> {{ $user->country ? $user->country->name : 'غير محدد' }}</p>
                    <p><strong>مستوى التعليم:</strong> {{ $user->educationLevel ? $user->educationLevel->name : 'غير محدد' }}</p>
                    <p><strong>سنوات الخبرة:</strong> {{ $user->work_experience }} سنوات</p>
                    <p><strong>رقم الهاتف:</strong> {{ $user->phone ?: 'غير محدد' }}</p>
                    <p><strong>تاريخ التسجيل:</strong> {{ $user->created_at->format('Y/m/d') }}</p>
                </div>
                <div class="applied-jobs">
                    <h3 class="section-title">الوظائف المتقدم لها</h3>
                    <table class="job-table">
                        <thead>
                            <tr>
                                <th>الوظيفة</th>
                                <th>الشركة</th>
                                <th>تاريخ التقديم</th>
                                <th>الحالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>مطور تطبيقات جوال</td>
                                <td>شركة التقنية المتقدمة</td>
                                <td>15/03/2023</td>
                                <td><span class="status-badge status-accepted">مقبول</span></td>
                            </tr>
                            <tr>
                                <td>مطور React Native</td>
                                <td>مجموعة الحلول الرقمية</td>
                                <td>10/03/2023</td>
                                <td><span class="status-badge status-reviewed">قيد المراجعة</span></td>
                            </tr>
                            <tr>
                                <td>مهندس برمجيات جوال</td>
                                <td>شركة الابتكار التقني</td>
                                <td>05/03/2023</td>
                                <td><span class="status-badge status-pending">قيد الانتظار</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 