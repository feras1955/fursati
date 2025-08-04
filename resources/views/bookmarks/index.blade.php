@extends('layouts.app')

@section('title', 'الوظائف المحفوظة')

@push('styles')
<style>
/* استخدام نفس متغيرات CSS الخاصة بالموقع */
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

body {
    font-family: 'Cairo', sans-serif;
    background-color: #f1f5f9;
    color: var(--dark);
    direction: rtl;
}

.bookmarks-page {
    background-color: #f1f5f9;
    min-height: 100vh;
    padding: 2rem 0;
}

/* هيدر الصفحة بنفس تصميم صفحة البحث */
.page-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 2.5rem;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    margin-bottom: 2rem;
}

.page-title {
    font-weight: 700;
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
    text-align: center;
}

.page-subtitle {
    text-align: center;
    font-size: 1.2rem;
    opacity: 0.9;
}

/* بطاقات الوظائف بنفس تصميم الموقع */
.jobs-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
    gap: 2rem;
    margin-bottom: 2rem;
}

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
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
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
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.job-description {
    color: var(--dark);
    font-size: 0.95rem;
    line-height: 1.5;
    margin-bottom: 1rem;
    text-align: justify;
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

.job-salary {
    color: var(--success);
    font-weight: 600;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background-color: #f0f9ff;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    border: 1px solid #bae6fd;
}

.job-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 1.5rem;
    background-color: #f8fafc;
    border-top: 1px solid var(--border);
}

.job-actions {
    display: flex;
    gap: 0.5rem;
    align-items: center;
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

/* أزرار بنفس تصميم الموقع */
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
    color: white;
}

.btn-outline {
    background-color: transparent;
    border: 2px solid var(--danger);
    color: var(--danger);
}

.btn-outline:hover {
    background-color: var(--danger);
    color: white;
    transform: translateY(-2px);
}

/* قسم الإجراءات */
.action-section {
    background: white;
    padding: 2rem;
    border-radius: var(--radius);
    margin-top: 2rem;
    text-align: center;
    box-shadow: var(--shadow);
}

.btn-action {
    padding: 1rem 2rem;
    margin: 0.5rem;
    border-radius: var(--radius);
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
}

.btn-clear {
    background-color: var(--danger);
    color: white;
}

.btn-clear:hover {
    background-color: #dc2626;
    transform: translateY(-2px);
}

.btn-export {
    background-color: var(--success);
    color: white;
}

.btn-export:hover {
    background-color: #16a34a;
    transform: translateY(-2px);
}

/* شريط البحث */
.search-section {
    margin-top: 2rem;
}

.search-form {
    max-width: 600px;
    margin: 0 auto;
}

.search-input-group {
    position: relative;
    display: flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.2);
    border-radius: var(--radius);
    padding: 0.5rem;
    backdrop-filter: blur(10px);
}

.search-input {
    flex: 1;
    border: none;
    background: transparent;
    color: white;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    outline: none;
    border-radius: var(--radius);
}

.search-input::placeholder {
    color: rgba(255, 255, 255, 0.8);
}

.search-btn {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: white;
    padding: 0.75rem 1rem;
    border-radius: var(--radius);
    cursor: pointer;
    transition: all 0.3s ease;
    margin-left: 0.5rem;
}

.search-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-1px);
}

.clear-search-btn {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: white;
    padding: 0.75rem 1rem;
    border-radius: var(--radius);
    text-decoration: none;
    transition: all 0.3s ease;
    margin-left: 0.5rem;
    display: flex;
    align-items: center;
}

.clear-search-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    color: white;
    transform: translateY(-1px);
}

.search-results-text {
    text-align: center;
    margin-top: 1rem;
    color: rgba(255, 255, 255, 0.9);
    font-size: 1rem;
}

/* رسالة فارغة */
.empty-message {
    text-align: center;
    padding: 4rem 2rem;
    background: white;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
}

.empty-message i {
    color: var(--gray);
    margin-bottom: 2rem;
    opacity: 0.7;
}

.empty-message h4 {
    color: var(--dark);
    font-weight: 600;
    margin-bottom: 1rem;
    font-size: 1.5rem;
}

.empty-message p {
    color: var(--gray);
    font-size: 1.1rem;
    margin-bottom: 2rem;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .bookmarks-page {
        padding: 1rem 0;
    }
    
    .jobs-container {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .page-title {
        font-size: 2rem;
    }
    
    .btn-action {
        display: block;
        width: 100%;
        margin: 0.5rem 0;
        justify-content: center;
    }
}
</style>
@endpush

@section('content')
<div class="bookmarks-page">
    <div class="page-header">
        <div class="container">
            <h1 class="page-title">الوظائف المحفوظة</h1>
            <p class="page-subtitle">إدارة ومتابعة الوظائف التي قمت بحفظها</p>
            
            <!-- شريط البحث -->
            <div class="search-section mt-4">
                <form method="GET" action="{{ route('bookmarks.index') }}" class="search-form">
                    <div class="search-input-group">
                        <input type="text" name="search" value="{{ request('search') }}" 
                               placeholder="ابحث في الوظائف المحفوظة..." class="search-input">
                        <button type="submit" class="search-btn">
                            <i class="fas fa-search"></i>
                        </button>
                        @if(request('search'))
                            <a href="{{ route('bookmarks.index') }}" class="clear-search-btn">
                                <i class="fas fa-times"></i>
                            </a>
                        @endif
                    </div>
                </form>
                @if(request('search'))
                    <p class="search-results-text">
                        نتائج البحث عن: <strong>"{{ request('search') }}"</strong>
                    </p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="container">
        @if(isset($bookmarkedJobs) && $bookmarkedJobs->count() > 0)
            <div class="jobs-container">
                @foreach($bookmarkedJobs as $job)
                <div class="job-card">
                    <div class="job-header">
                        @if($job->work_field_name)
                            <div class="job-field">
                                <i class="fas fa-tag"></i>
                                {{ $job->work_field_name }}
                            </div>
                        @endif
                        <h3 class="job-title">{{ $job->title }}</h3>
                        <p class="job-company">
                            <i class="fas fa-building"></i>
                            شركة خاصة
                        </p>
                    </div>
                    
                    <div class="job-body">
                        @if($job->description)
                            <div class="job-description">
                                {{ Str::limit($job->description, 120) }}
                            </div>
                        @endif
                        
                        <div class="job-details">
                            <div class="job-detail">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $job->work_place ?: ($job->country_name ?: 'عن بعد') }}</span>
                            </div>
                            <div class="job-detail">
                                <i class="fas fa-clock"></i>
                                <span>{{ $job->job_type ?: 'دوام كامل' }}</span>
                            </div>
                            @if($job->education_level_name)
                                <div class="job-detail">
                                    <i class="fas fa-graduation-cap"></i>
                                    <span>{{ $job->education_level_name }}</span>
                                </div>
                            @endif
                            @if($job->work_experience)
                                <div class="job-detail">
                                    <i class="fas fa-briefcase"></i>
                                    <span>{{ $job->work_experience }} سنوات خبرة</span>
                                </div>
                            @endif
                        </div>
                        
                        @if($job->salary_min && $job->salary_max)
                            <div class="job-salary">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>{{ number_format($job->salary_min) }} - {{ number_format($job->salary_max) }} ريال</span>
                            </div>
                        @elseif($job->salary_min)
                            <div class="job-salary">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>من {{ number_format($job->salary_min) }} ريال</span>
                            </div>
                        @endif
                        
                        @if($job->skills)
                            <div class="job-skills">
                                @foreach(explode(',', $job->skills) as $skill)
                                    @if(trim($skill))
                                        <span class="skill-tag">{{ trim($skill) }}</span>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                    
                    <div class="job-footer">
                        <div class="job-actions">
                            <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                                عرض التفاصيل
                            </a>
                            <button class="btn btn-outline" onclick="removeBookmark({{ $job->id }})">
                                <i class="fas fa-trash"></i>
                                إزالة
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="action-section">
                <button class="btn-action btn-clear" onclick="clearAllBookmarks()">
                    <i class="fas fa-trash-alt"></i>
                    مسح جميع المحفوظات
                </button>
                <button class="btn-action btn-export" onclick="exportBookmarks()">
                    <i class="fas fa-download"></i>
                    تصدير المحفوظات
                </button>
            </div>
        @else
            <div class="empty-message">
                <i class="fas fa-bookmark fa-4x"></i>
                <h4>لا توجد وظائف محفوظة</h4>
                <p>لم تقم بحفظ أي وظائف بعد. ابدأ بتصفح الوظائف المتاحة واحفظ ما يهمك.</p>
                <a href="{{ route('jobs.index') }}" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                    تصفح الوظائف
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
function removeBookmark(jobId) {
    if (confirm('هل تريد إزالة هذه الوظيفة من المحفوظات؟')) {
        fetch(`/jobs/${jobId}/bookmark`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('حدث خطأ أثناء إزالة الوظيفة');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('حدث خطأ أثناء إزالة الوظيفة');
        });
    }
}

function clearAllBookmarks() {
    if (confirm('هل أنت متأكد من مسح جميع الوظائف المحفوظة؟ هذه العملية غير قابلة للتراجع!')) {
        const btn = document.querySelector('.btn-action.btn-clear');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري المسح...';
        btn.disabled = true;
        
        fetch('{{ route("bookmarks.clear-all") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('حدث خطأ أثناء مسح المحفوظات');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('حدث خطأ أثناء مسح المحفوظات');
        })
        .finally(() => {
            btn.innerHTML = originalText;
            btn.disabled = false;
        });
    }
}

function exportBookmarks() {
    const btn = document.querySelector('.btn-export');
    const originalText = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري التصدير...';
    btn.disabled = true;
    
    fetch('{{ route("bookmarks.export") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
    .then(response => response.blob())
    .then(blob => {
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `saved_jobs_${new Date().toISOString().split('T')[0]}.txt`;
        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);
        document.body.removeChild(a);
    })
    .catch(error => {
        console.error('Error:', error);
        alert('حدث خطأ أثناء تصدير المحفوظات');
    })
    .finally(() => {
        btn.innerHTML = originalText;
        btn.disabled = false;
    });
}
</script>
@endpush
