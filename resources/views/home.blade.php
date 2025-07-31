@extends('layouts.app')

@section('title', 'الرئيسية - فرصتي')

@section('content')
<div class="container">
    <div class="welcome-section">
        <h1 class="welcome-title">مرحباً بك في منصة فرصتي</h1>
        <p class="welcome-text">منصة عربية رائدة توفر لك أحدث الوظائف في مختلف المجالات والتخصصات. ابحث عن وظيفة أحلامك وتقدم لها الآن!</p>
        <a href="{{ route('jobs.index') }}" class="btn btn-primary">
            <i class="fas fa-search"></i> ابحث عن وظيفة
        </a>
    </div>
    
    <div class="page-header">
        <h2 class="section-title">أحدث الوظائف</h2>
        <a href="{{ route('jobs.index') }}" class="btn btn-outline">
            عرض الكل <i class="fas fa-arrow-left"></i>
        </a>
    </div>
    
    <div class="jobs-container">
        <!-- Job Card 1 -->
        <div class="job-card">
            <div class="job-header">
                <span class="job-field">تطوير الويب والجوال</span>
                <h3 class="job-company">شركة التقنية المتقدمة</h3>
                <div class="job-salary">
                    <i class="fas fa-money-bill-wave"></i>
                    8,000 - 12,000 ر.س
                </div>
            </div>
            <div class="job-body">
                <div class="job-details">
                    <div class="job-detail">
                        <i class="fas fa-briefcase"></i>
                        <span>3+ سنوات خبرة</span>
                    </div>
                    <div class="job-detail">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>الرياض، السعودية</span>
                    </div>
                </div>
                
                <div class="job-skills">
                    <span class="skill-tag">JavaScript</span>
                    <span class="skill-tag">React</span>
                    <span class="skill-tag">Node.js</span>
                    <span class="skill-tag">API</span>
                </div>
            </div>
            <div class="job-footer">
                <div class="job-time-left">
                    <i class="fas fa-clock"></i>
                    متبقي 3 أيام
                </div>
                <a href="{{ route('jobs.show', 1) }}" class="btn btn-primary">تقديم الآن</a>
            </div>
        </div>
        
        <!-- Job Card 2 -->
        <div class="job-card">
            <div class="job-header">
                <span class="job-field">التسويق الرقمي</span>
                <h3 class="job-company">مجموعة التسويق الحديث</h3>
                <div class="job-salary">
                    <i class="fas fa-money-bill-wave"></i>
                    6,000 - 9,000 ر.س
                </div>
            </div>
            <div class="job-body">
                <div class="job-details">
                    <div class="job-detail">
                        <i class="fas fa-briefcase"></i>
                        <span>2+ سنوات خبرة</span>
                    </div>
                    <div class="job-detail">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>جدة، السعودية</span>
                    </div>
                </div>
                
                <div class="job-skills">
                    <span class="skill-tag">SEO</span>
                    <span class="skill-tag">Social Media</span>
                    <span class="skill-tag">Google Ads</span>
                    <span class="skill-tag">Content Marketing</span>
                </div>
            </div>
            <div class="job-footer">
                <div class="job-time-left">
                    <i class="fas fa-clock"></i>
                    متبقي 5 أيام
                </div>
                <a href="{{ route('jobs.show', 2) }}" class="btn btn-primary">تقديم الآن</a>
            </div>
        </div>
        
        <!-- Job Card 3 -->
        <div class="job-card">
            <div class="job-header">
                <span class="job-field">المحاسبة والمالية</span>
                <h3 class="job-company">الشركة المتحدة للاستثمار</h3>
                <div class="job-salary">
                    <i class="fas fa-money-bill-wave"></i>
                    7,000 - 10,000 ر.س
                </div>
            </div>
            <div class="job-body">
                <div class="job-details">
                    <div class="job-detail">
                        <i class="fas fa-briefcase"></i>
                        <span>4+ سنوات خبرة</span>
                    </div>
                    <div class="job-detail">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>الدمام، السعودية</span>
                    </div>
                </div>
                
                <div class="job-skills">
                    <span class="skill-tag">المحاسبة</span>
                    <span class="skill-tag">التقارير المالية</span>
                    <span class="skill-tag">Zakat & Tax</span>
                    <span class="skill-tag">ERP Systems</span>
                </div>
            </div>
            <div class="job-footer">
                <div class="job-time-left">
                    <i class="fas fa-clock"></i>
                    متبقي 7 أيام
                </div>
                <a href="{{ route('jobs.show', 3) }}" class="btn btn-primary">تقديم الآن</a>
            </div>
        </div>
    </div>
</div>
@endsection 