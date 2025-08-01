@extends('layouts.app')

@section('title', 'الملف الشخصي - فرصتي')

@section('content')
<!-- Profile Page (مطابق للكود الأصلي) -->
<section id="profile" class="page-container active" style="padding:0;">
    <div class="container">
        <div class="page-header">
            <h2 class="page-title">الملف الشخصي</h2>
            <button class="btn btn-outline">
                <i class="fas fa-edit"></i> تعديل الملف
            </button>
        </div>
        <div class="profile-container">
            <div class="profile-sidebar">
                <div class="profile-header">
                    <div class="profile-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <h3 class="profile-name">عمر أحمد</h3>
                    <p class="profile-title">مطور تطبيقات جوال</p>
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
                    <p>مطور تطبيقات جوال بخبرة 4 سنوات في React Native وFlutter. حاصل على شهادة البكالوريوس في علوم الحاسوب من جامعة الملك سعود. أتمتع بمهارات قوية في حل المشكلات والعمل الجماعي.</p>
                </div>
            </div>
            <div class="profile-content">
                <h3 class="section-title">السيرة الذاتية</h3>
                <div class="bio-content">
                    <p><strong>التعليم:</strong> بكالوريوس علوم الحاسوب - جامعة الملك سعود (2016-2020)</p>
                    <p><strong>المهارات التقنية:</strong> React Native, Flutter, JavaScript, Dart, Redux, Firebase, Git</p>
                    <p><strong>اللغات:</strong> العربية (اللغة الأم), الإنجليزية (متقدمة)</p>
                    <p><strong>الشهادات:</strong> مطور React Native معتمد من Meta, شهادة Flutter من Google</p>
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