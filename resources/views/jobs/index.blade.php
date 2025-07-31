@extends('layouts.app')

@section('title', 'الوظائف - فرصتي')

@section('content')
<div class="container">
    <div class="page-header">
        <h2 class="page-title">البحث عن الوظائف</h2>
    </div>
    
    <!-- Search and Filter Section -->
    <div class="search-filter-section" style="background: white; padding: 2rem; border-radius: var(--radius); box-shadow: var(--shadow); margin-bottom: 2rem;">
        <form id="job-filters" onsubmit="filterJobs(); return false;">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label>البحث</label>
                    <input type="text" id="job-search" name="search" class="form-control" placeholder="ابحث عن وظيفة، شركة، أو مهارة">
                </div>
                <div class="form-group">
                    <label>المجال المهني</label>
                    <select name="field" class="form-control">
                        <option value="">جميع المجالات</option>
                        <option value="technology">تكنولوجيا المعلومات</option>
                        <option value="marketing">التسويق والمبيعات</option>
                        <option value="accounting">المحاسبة والمالية</option>
                        <option value="hr">الموارد البشرية</option>
                        <option value="engineering">الهندسة</option>
                        <option value="education">التعليم</option>
                    </select>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label>المكان</label>
                    <select name="location" class="form-control">
                        <option value="">جميع الأماكن</option>
                        <option value="riyadh">الرياض</option>
                        <option value="jeddah">جدة</option>
                        <option value="dammam">الدمام</option>
                        <option value="makkah">مكة المكرمة</option>
                        <option value="madinah">المدينة المنورة</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>نوع العمل</label>
                    <select name="type" class="form-control">
                        <option value="">جميع الأنواع</option>
                        <option value="full-time">دوام كامل</option>
                        <option value="part-time">دوام جزئي</option>
                        <option value="remote">عمل عن بعد</option>
                        <option value="contract">عقود</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>الراتب</label>
                    <select name="salary" class="form-control">
                        <option value="">أي راتب</option>
                        <option value="3000-5000">3,000 - 5,000 ر.س</option>
                        <option value="5000-8000">5,000 - 8,000 ر.س</option>
                        <option value="8000-12000">8,000 - 12,000 ر.س</option>
                        <option value="12000-18000">12,000 - 18,000 ر.س</option>
                        <option value="18000+">18,000+ ر.س</option>
                    </select>
                </div>
            </div>
            
            <div style="text-align: center; margin-top: 1rem;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> بحث
                </button>
                <button type="button" onclick="resetFilters()" class="btn btn-outline">
                    <i class="fas fa-refresh"></i> إعادة تعيين
                </button>
            </div>
        </form>
    </div>
    
    <!-- Jobs Results -->
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
                    <div class="job-detail">
                        <i class="fas fa-clock"></i>
                        <span>دوام كامل</span>
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
                <div style="display: flex; gap: 0.5rem;">
                    <button onclick="toggleBookmark(1)" class="btn btn-outline" data-job-id="1">
                        <i class="fas fa-bookmark"></i>
                    </button>
                    <a href="{{ route('jobs.show', 1) }}" class="btn btn-primary">تقديم الآن</a>
                </div>
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
                    <div class="job-detail">
                        <i class="fas fa-clock"></i>
                        <span>دوام كامل</span>
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
                <div style="display: flex; gap: 0.5rem;">
                    <button onclick="toggleBookmark(2)" class="btn btn-outline" data-job-id="2">
                        <i class="fas fa-bookmark"></i>
                    </button>
                    <a href="{{ route('jobs.show', 2) }}" class="btn btn-primary">تقديم الآن</a>
                </div>
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
                    <div class="job-detail">
                        <i class="fas fa-clock"></i>
                        <span>دوام كامل</span>
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
                <div style="display: flex; gap: 0.5rem;">
                    <button onclick="toggleBookmark(3)" class="btn btn-outline" data-job-id="3">
                        <i class="fas fa-bookmark"></i>
                    </button>
                    <a href="{{ route('jobs.show', 3) }}" class="btn btn-primary">تقديم الآن</a>
                </div>
            </div>
        </div>
        
        <!-- Job Card 4 -->
        <div class="job-card">
            <div class="job-header">
                <span class="job-field">تطوير تطبيقات الجوال</span>
                <h3 class="job-company">شركة الابتكار التقني</h3>
                <div class="job-salary">
                    <i class="fas fa-money-bill-wave"></i>
                    9,000 - 14,000 ر.س
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
                    <div class="job-detail">
                        <i class="fas fa-clock"></i>
                        <span>دوام كامل</span>
                    </div>
                </div>
                
                <div class="job-skills">
                    <span class="skill-tag">React Native</span>
                    <span class="skill-tag">Flutter</span>
                    <span class="skill-tag">iOS</span>
                    <span class="skill-tag">Android</span>
                </div>
            </div>
            <div class="job-footer">
                <div class="job-time-left">
                    <i class="fas fa-clock"></i>
                    متبقي 2 أيام
                </div>
                <div style="display: flex; gap: 0.5rem;">
                    <button onclick="toggleBookmark(4)" class="btn btn-outline" data-job-id="4">
                        <i class="fas fa-bookmark"></i>
                    </button>
                    <a href="{{ route('jobs.show', 4) }}" class="btn btn-primary">تقديم الآن</a>
                </div>
            </div>
        </div>
        
        <!-- Job Card 5 -->
        <div class="job-card">
            <div class="job-header">
                <span class="job-field">تصميم جرافيك</span>
                <h3 class="job-company">استوديو التصميم الإبداعي</h3>
                <div class="job-salary">
                    <i class="fas fa-money-bill-wave"></i>
                    5,000 - 8,000 ر.س
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
                    <div class="job-detail">
                        <i class="fas fa-clock"></i>
                        <span>دوام جزئي</span>
                    </div>
                </div>
                
                <div class="job-skills">
                    <span class="skill-tag">Adobe Photoshop</span>
                    <span class="skill-tag">Illustrator</span>
                    <span class="skill-tag">InDesign</span>
                    <span class="skill-tag">UI/UX Design</span>
                </div>
            </div>
            <div class="job-footer">
                <div class="job-time-left">
                    <i class="fas fa-clock"></i>
                    متبقي 10 أيام
                </div>
                <div style="display: flex; gap: 0.5rem;">
                    <button onclick="toggleBookmark(5)" class="btn btn-outline" data-job-id="5">
                        <i class="fas fa-bookmark"></i>
                    </button>
                    <a href="{{ route('jobs.show', 5) }}" class="btn btn-primary">تقديم الآن</a>
                </div>
            </div>
        </div>
        
        <!-- Job Card 6 -->
        <div class="job-card">
            <div class="job-header">
                <span class="job-field">إدارة المشاريع</span>
                <h3 class="job-company">مجموعة الإدارة الاستراتيجية</h3>
                <div class="job-salary">
                    <i class="fas fa-money-bill-wave"></i>
                    12,000 - 18,000 ر.س
                </div>
            </div>
            <div class="job-body">
                <div class="job-details">
                    <div class="job-detail">
                        <i class="fas fa-briefcase"></i>
                        <span>5+ سنوات خبرة</span>
                    </div>
                    <div class="job-detail">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>الرياض، السعودية</span>
                    </div>
                    <div class="job-detail">
                        <i class="fas fa-clock"></i>
                        <span>دوام كامل</span>
                    </div>
                </div>
                
                <div class="job-skills">
                    <span class="skill-tag">PMP</span>
                    <span class="skill-tag">Agile</span>
                    <span class="skill-tag">Scrum</span>
                    <span class="skill-tag">Risk Management</span>
                </div>
            </div>
            <div class="job-footer">
                <div class="job-time-left">
                    <i class="fas fa-clock"></i>
                    متبقي 15 يوم
                </div>
                <div style="display: flex; gap: 0.5rem;">
                    <button onclick="toggleBookmark(6)" class="btn btn-outline" data-job-id="6">
                        <i class="fas fa-bookmark"></i>
                    </button>
                    <a href="{{ route('jobs.show', 6) }}" class="btn btn-primary">تقديم الآن</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function resetFilters() {
    document.getElementById('job-filters').reset();
    // You can add logic to reload all jobs here
}
</script>
@endsection 