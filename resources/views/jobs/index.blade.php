@extends('layouts.app')

@section('title', 'الوظائف - فرصتي')

@push('styles')
<style>
/* Custom CSS for Jobs Page */
:root {
    --primary: #2563eb;
    --primary-dark: #1d4ed8;
    --secondary: #10b981;
    --dark: #1e293b;
    --light: #f8fafc;
    --gray: #94a3b8;
    --border: #e2e8f0;
    --success: #22c55e;
    --warning: #f59e0b;
    --danger: #ef4444;
    --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --radius: 8px;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Cairo', sans-serif;
    background-color: #f1f5f9;
    color: var(--dark);
    direction: rtl;
}

.container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

/* Search and Filter Section */
.search-filter-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 2.5rem;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    margin-bottom: 2rem;
}

.search-filter-section label {
    color: white;
    font-weight: 600;
    margin-bottom: 0.5rem;
    display: block;
}

.search-filter-section .form-control {
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: var(--dark);
    transition: all 0.3s ease;
    width: 100%;
    padding: 0.8rem;
    border-radius: var(--radius);
    font-family: 'Cairo', sans-serif;
    font-size: 1rem;
}

.search-filter-section .form-control:focus {
    background: white;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    outline: none;
}

.search-filter-section .btn-primary {
    background: rgba(255, 255, 255, 0.2);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    font-weight: 600;
    padding: 0.8rem 2rem;
    transition: all 0.3s ease;
    border-radius: var(--radius);
    cursor: pointer;
}

.search-filter-section .btn-primary:hover {
    background: rgba(255, 255, 255, 0.3);
    border-color: rgba(255, 255, 255, 0.5);
    transform: translateY(-2px);
}

.search-filter-section .btn-outline {
    background: transparent;
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    font-weight: 600;
    padding: 0.8rem 2rem;
    transition: all 0.3s ease;
    border-radius: var(--radius);
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
}

.search-filter-section .btn-outline:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.5);
    transform: translateY(-2px);
}

/* Jobs Container */
.jobs-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
    gap: 2rem;
    margin-bottom: 2rem;
}

/* Job Cards */
.job-card {
    background-color: white;
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: transform 0.3s ease;
}

.job-card:hover {
    transform: translateY(-5px);
}

.job-header {
    padding: 1.5rem;
    border-bottom: 1px solid var(--border);
}

.job-field {
    background-color: #dbeafe;
    color: var(--primary);
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    font-size: 0.85rem;
    display: inline-block;
    margin-bottom: 0.8rem;
}

.job-title {
    font-weight: 700;
    font-size: 1.3rem;
    margin-bottom: 0.5rem;
    color: var(--dark);
}

.job-company {
    font-weight: 500;
    font-size: 1rem;
    margin-bottom: 0.5rem;
    color: var(--gray);
}

.job-description {
    color: var(--dark);
    font-size: 0.95rem;
    line-height: 1.5;
    margin-bottom: 1rem;
    text-align: justify;
}

.job-salary {
    color: var(--success);
    font-weight: 600;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.job-body {
    padding: 1.5rem;
}

.job-details {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.job-detail {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
    color: var(--dark);
}

.job-skills {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-bottom: 1.5rem;
}

.skill-tag {
    background-color: #f1f5f9;
    color: var(--dark);
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    font-size: 0.85rem;
}

.job-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 1.5rem;
    background-color: #f8fafc;
    border-top: 1px solid var(--border);
}

.job-time-left {
    color: var(--warning);
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.job-actions {
    display: flex;
    gap: 0.5rem;
    align-items: center;
}

/* Form Styles */
.form-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1rem;
    margin-bottom: 1rem;
}

.form-group {
    margin-bottom: 1rem;
}

/* Button Styles */
.btn {
    padding: 0.6rem 1.2rem;
    border-radius: var(--radius);
    font-weight: 600;
    cursor: pointer;
    border: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    text-decoration: none;
}

.btn-primary {
    background-color: var(--primary);
    color: white;
}

.btn-primary:hover {
    background-color: var(--primary-dark);
    transform: translateY(-2px);
}

.btn-outline {
    background-color: transparent;
    border: 2px solid var(--primary);
    color: var(--primary);
}

.btn-outline:hover {
    background-color: var(--primary);
    color: white;
    transform: translateY(-2px);
}

/* Pagination Styles - تحسين تصميم الأسهم */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.8rem;
    margin: 3rem 0;
    padding: 1rem;
}

.pagination .page-item {
    margin: 0;
}

.pagination .page-link {
    color: var(--primary);
    background-color: white;
    border: 2px solid var(--border);
    padding: 0.8rem 1rem;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 48px;
    height: 48px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 1rem;
}

.pagination .page-link:hover {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    border-color: var(--primary);
    transform: translateY(-3px);
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
}

.pagination .page-item.active .page-link {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    border-color: var(--primary);
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
}

/* تحسين تصميم الأسهم */
.pagination .page-link[rel="prev"],
.pagination .page-link[rel="next"] {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border: none;
    font-size: 1.2rem;
    min-width: 56px;
    height: 56px;
    border-radius: 50%;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
}

.pagination .page-link[rel="prev"]:hover,
.pagination .page-link[rel="next"]:hover {
    background: linear-gradient(135deg, #5a67d8, #6b46c1);
    transform: translateY(-4px) scale(1.05);
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
}

/* أسهم محسنة بأيقونات أجمل */
.pagination .page-link[rel="prev"]:before {
    content: "←";
    font-size: 1.5rem;
    font-weight: bold;
}

.pagination .page-link[rel="next"]:before {
    content: "→";
    font-size: 1.5rem;
    font-weight: bold;
}

.pagination .page-link[rel="prev"] span,
.pagination .page-link[rel="next"] span {
    display: none;
}

/* إضافة تأثيرات إضافية للأسهم */
.pagination .page-link[rel="prev"]:active,
.pagination .page-link[rel="next"]:active {
    transform: translateY(-2px) scale(0.98);
}

/* تحسين الأرقام */
.pagination .page-link:not([rel]) {
    font-family: 'Cairo', sans-serif;
    font-weight: 700;
}

.pagination .page-item.disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none !important;
    box-shadow: none !important;
}

/* Pagination Wrapper Styles */
.pagination-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1.5rem;
    margin: 3rem 0;
    padding: 2rem;
    background: white;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
}

.pagination-info {
    text-align: center;
}

.pagination-text {
    color: var(--dark);
    font-size: 1rem;
    font-weight: 500;
    margin: 0;
}

.pagination-text .font-bold {
    font-weight: 700;
    color: var(--primary);
}

.pagination-controls {
    display: flex;
    justify-content: center;
    width: 100%;
}

/* تحسين الأسهم للاتجاه العربي */
.pagination .page-link i.fa-chevron-right,
.pagination .page-link i.fa-chevron-left {
    font-size: 1.2rem;
    font-weight: bold;
}

/* Responsive للـ pagination */
@media (max-width: 768px) {
    .pagination-wrapper {
        flex-direction: column;
        gap: 1rem;
        padding: 1.5rem;
    }
    
    .pagination {
        gap: 0.5rem;
    }
    
    .pagination .page-link {
        min-width: 40px;
        height: 40px;
        padding: 0.6rem 0.8rem;
        font-size: 0.9rem;
    }
    
    .pagination .page-link[rel="prev"],
    .pagination .page-link[rel="next"] {
        min-width: 48px;
        height: 48px;
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .jobs-container {
        grid-template-columns: 1fr;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .search-filter-section {
        padding: 1.5rem;
    }
    
    .job-actions {
        flex-direction: column;
        gap: 0.5rem;
    }
}
</style>
@endpush

@section('content')
<div class="container">
    <div class="page-header">
        <h2 class="page-title">البحث عن الوظائف</h2>
    </div>
    
    <!-- Search and Filter Section -->
    <div class="search-filter-section">
        <form method="GET" action="{{ route('jobs.index') }}">
            <div class="form-row">
                <div class="form-group">
                    <label>البحث</label>
                    <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="ابحث عن وظيفة، شركة، أو مهارة">
                </div>
                <div class="form-group">
                    <label>المجال المهني</label>
                    <select name="field" class="form-control">
                        <option value="">جميع المجالات</option>
                        @foreach($workFields as $field)
                            <option value="{{ $field->name }}" {{ request('field') == $field->name ? 'selected' : '' }}>
                                {{ $field->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>الموقع</label>
                    <select name="location" class="form-control">
                        <option value="">جميع المواقع</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->name }}" {{ request('location') == $country->name ? 'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label>نوع العمل</label>
                    <select name="type" class="form-control">
                        <option value="">جميع الأنواع</option>
                        <option value="دوام كامل" {{ request('type') == 'دوام كامل' ? 'selected' : '' }}>دوام كامل</option>
                        <option value="دوام جزئي" {{ request('type') == 'دوام جزئي' ? 'selected' : '' }}>دوام جزئي</option>
                        <option value="عمل عن بعد" {{ request('type') == 'عمل عن بعد' ? 'selected' : '' }}>عمل عن بعد</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>نطاق الراتب</label>
                    <select name="salary" class="form-control">
                        <option value="">جميع الرواتب</option>
                        <option value="3000-5000" {{ request('salary') == '3000-5000' ? 'selected' : '' }}>3,000 - 5,000 ر.س</option>
                        <option value="5000-8000" {{ request('salary') == '5000-8000' ? 'selected' : '' }}>5,000 - 8,000 ر.س</option>
                        <option value="8000-12000" {{ request('salary') == '8000-12000' ? 'selected' : '' }}>8,000 - 12,000 ر.س</option>
                        <option value="12000-18000" {{ request('salary') == '12000-18000' ? 'selected' : '' }}>12,000 - 18,000 ر.س</option>
                        <option value="18000+" {{ request('salary') == '18000+' ? 'selected' : '' }}>18,000+ ر.س</option>
                    </select>
                </div>
                <div class="form-group" style="display: flex; align-items: end;">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i> بحث
                    </button>
                    <a href="{{ route('jobs.index') }}" class="btn btn-outline" style="margin-right: 1rem;">
                        <i class="fas fa-refresh"></i> إعادة تعيين
                    </a>
                </div>
            </div>
        </form>
    </div>
    
    <!-- Jobs Container -->
    <div class="jobs-container">
        @forelse($jobs as $job)
            <div class="job-card">
                <div class="job-header">
                    <span class="job-field">{{ $job->workField->name ?? 'غير محدد' }}</span>
                    <h3 class="job-title">{{ $job->title ?? 'وظيفة غير محددة' }}</h3>
                    <p class="job-company">{{ $job->businessMan->name ?? 'شركة غير محددة' }}</p>
                    <div class="job-salary">
                        <i class="fas fa-money-bill-wave"></i>
                        {{ $job->salary_min ?? 0 }} - {{ $job->salary_max ?? 0 }} ر.س
                    </div>
                </div>
                <div class="job-body">
                    @if($job->description)
                        <p class="job-description">{{ Str::limit($job->description, 150) }}</p>
                    @endif
                    <div class="job-details">
                        <div class="job-detail">
                            <i class="fas fa-briefcase"></i>
                            <span>{{ $job->work_experience ?? 0 }}+ سنوات خبرة</span>
                        </div>
                        <div class="job-detail">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $job->work_place ?? 'غير محدد' }}</span>
                        </div>
                        <div class="job-detail">
                            <i class="fas fa-clock"></i>
                            <span>{{ $job->job_type ?? 'دوام كامل' }}</span>
                        </div>
                        @if($job->educationLevel)
                            <div class="job-detail">
                                <i class="fas fa-graduation-cap"></i>
                                <span>{{ $job->educationLevel->name }}</span>
                            </div>
                        @endif
                    </div>
                    
                    @if($job->skills)
                        <div class="job-skills">
                            @foreach(explode(',', $job->skills) as $skill)
                                <span class="skill-tag">{{ trim($skill) }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="job-footer">
                    <div class="job-time-left">
                        <i class="fas fa-clock"></i>
                        منشور منذ {{ $job->created_at->diffForHumans() }}
                    </div>
                    <div class="job-actions">
                        <button onclick="toggleBookmark({{ $job->id }})" class="btn btn-outline bookmark-btn" data-job-id="{{ $job->id }}">
                            <i class="fas fa-bookmark"></i>
                        </button>
                        <button onclick="applyForJob({{ $job->id }})" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> تقديم الآن
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; background: white; border-radius: var(--radius); box-shadow: var(--shadow);">
                <i class="fas fa-search" style="font-size: 3rem; color: var(--gray); margin-bottom: 1rem;"></i>
                <h3 style="color: var(--dark); margin-bottom: 1rem;">لا توجد وظائف متاحة</h3>
                <p style="color: var(--gray);">جرب تغيير معايير البحث أو العودة لاحقاً</p>
            </div>
        @endforelse
    </div>
    
    <!-- Pagination معرب ومحسن -->
    @if($jobs->hasPages())
        <div class="pagination-wrapper">
            <div class="pagination-info">
                <p class="pagination-text">
                    عرض 
                    <span class="font-bold">{{ $jobs->firstItem() }}</span>
                    إلى 
                    <span class="font-bold">{{ $jobs->lastItem() }}</span>
                    من أصل 
                    <span class="font-bold">{{ $jobs->total() }}</span>
                    نتيجة
                </p>
            </div>
            
            <div class="pagination-controls">
                <div class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($jobs->onFirstPage())
                        <span class="page-item disabled">
                            <span class="page-link" aria-disabled="true">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        </span>
                    @else
                        <a href="{{ $jobs->previousPageUrl() }}" class="page-item">
                            <span class="page-link" aria-label="السابق">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                        @if ($page == $jobs->currentPage())
                            <span class="page-item active">
                                <span class="page-link">{{ $page }}</span>
                            </span>
                        @else
                            <a href="{{ $url }}" class="page-item">
                                <span class="page-link">{{ $page }}</span>
                            </a>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($jobs->hasMorePages())
                        <a href="{{ $jobs->nextPageUrl() }}" class="page-item">
                            <span class="page-link" aria-label="التالي">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                        </a>
                    @else
                        <span class="page-item disabled">
                            <span class="page-link" aria-disabled="true">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
// وظيفة لإظهار الرسائل المؤقتة
function showToast(message, type = 'info') {
    // إنشاء عنصر Toast
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    toast.innerHTML = `
        <div class="toast-content">
            <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle'}"></i>
            <span>${message}</span>
        </div>
    `;
    
    // إضافة التنسيقات
    toast.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#3b82f6'};
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        z-index: 9999;
        transform: translateX(100%);
        transition: transform 0.3s ease;
        font-family: 'Cairo', sans-serif;
        direction: rtl;
    `;
    
    // إضافة للصفحة
    document.body.appendChild(toast);
    
    // إظهار Toast
    setTimeout(() => {
        toast.style.transform = 'translateX(0)';
    }, 100);
    
    // إخفاء Toast بعد 3 ثواني
    setTimeout(() => {
        toast.style.transform = 'translateX(100%)';
        setTimeout(() => {
            if (toast.parentNode) {
                toast.parentNode.removeChild(toast);
            }
        }, 300);
    }, 3000);
}

function toggleBookmark(jobId) {
    // التحقق من تسجيل الدخول أولاً
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        showToast('يجب تسجيل الدخول أولاً', 'error');
        setTimeout(() => {
            window.location.href = '/login';
        }, 2000);
        return;
    }
    
    // التحقق من وجود زر تسجيل الدخول في الصفحة (يعني المستخدم غير مسجل)
    const loginButton = document.querySelector('button[onclick*="login"]');
    if (loginButton) {
        showToast('يجب تسجيل الدخول أولاً', 'error');
        setTimeout(() => {
            window.location.href = '/login';
        }, 2000);
        return;
    }

    const button = event.target.closest('button');
    const icon = button.querySelector('i');
    
    // تعطيل الزر مؤقتاً لمنع النقر المتكرر
    button.disabled = true;
    
    fetch(`/jobs/${jobId}/bookmark`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // تغيير لون الأيقونة فوراً
            if (data.isBookmarked) {
                // محفوظ - زر مملوء أصفر
                icon.style.color = '#f59e0b';
                icon.classList.remove('far');
                icon.classList.add('fas');
                button.title = 'إزالة من المحفوظات';
            } else {
                // غير محفوظ - زر فارغ رمادي
                icon.style.color = '#6c757d';
                icon.classList.remove('fas');
                icon.classList.add('far');
                button.title = 'حفظ الوظيفة';
            }
            
            // إظهار رسالة نجاح صغيرة
            showToast(data.message, 'success');
        } else {
            showToast(data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('حدث خطأ أثناء حفظ الوظيفة', 'error');
    })
    .finally(() => {
        // إعادة تفعيل الزر
        button.disabled = false;
    });
}

function applyForJob(jobId) {
    // التحقق من تسجيل الدخول
    if (!document.querySelector('meta[name="csrf-token"]')) {
        showToast('يجب تسجيل الدخول أولاً', 'error');
        window.location.href = '/login';
        return;
    }

    // إظهار نافذة تأكيد
    if (confirm('هل أنت متأكد من التقديم لهذه الوظيفة؟')) {
        // توجيه المستخدم لصفحة تفاصيل الوظيفة للتقديم
        window.location.href = `/jobs/${jobId}`;
    }
}
</script>
@endpush