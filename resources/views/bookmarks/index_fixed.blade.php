@extends('layouts.app')

@section('title', 'الوظائف المحفوظة')

@push('styles')
<style>
.bookmarks-page {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    padding: 2rem 0;
}

.bookmarks-container {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    padding: 2rem;
    margin: 2rem auto;
    backdrop-filter: blur(10px);
}

.bookmarks-header {
    text-align: center;
    margin-bottom: 3rem;
    position: relative;
}

.bookmarks-header::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #667eea, #764ba2);
    border-radius: 2px;
}

.bookmarks-header h2 {
    color: #2d3748;
    font-weight: 700;
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.bookmarks-header .subtitle {
    color: #718096;
    font-size: 1.1rem;
    margin-top: 1rem;
}

.job-card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
    background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
    margin-bottom: 2rem;
}

.job-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.job-card .card-body {
    padding: 1.5rem;
    position: relative;
}

.job-card .card-title {
    color: #2d3748;
    font-weight: 600;
    font-size: 1.25rem;
    margin-bottom: 1rem;
    line-height: 1.4;
}

.job-card .card-text {
    color: #4a5568;
    line-height: 1.6;
    margin-bottom: 1rem;
}

.job-card .card-text strong {
    color: #2d3748;
    font-weight: 600;
}

.salary-info {
    background: linear-gradient(135deg, #48bb78, #38a169);
    color: white;
    padding: 0.75rem;
    border-radius: 10px;
    margin: 1rem 0;
    text-align: center;
    font-weight: 600;
    box-shadow: 0 4px 15px rgba(72, 187, 120, 0.3);
}

.btn-custom-primary {
    background: linear-gradient(135deg, #667eea, #764ba2);
    border: none;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-custom-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    color: white;
}

.btn-custom-danger {
    background: linear-gradient(135deg, #fc8181, #e53e3e);
    border: none;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-custom-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(229, 62, 62, 0.4);
    color: white;
}

.action-buttons {
    background: rgba(255, 255, 255, 0.9);
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    margin-top: 3rem;
    text-align: center;
}

.btn-action {
    padding: 1rem 2rem;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1.1rem;
    margin: 0 0.5rem;
    transition: all 0.3s ease;
    border: none;
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
}

.btn-clear-all {
    background: linear-gradient(135deg, #fc8181, #e53e3e);
    color: white;
}

.btn-clear-all:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(229, 62, 62, 0.4);
    color: white;
}

.btn-export {
    background: linear-gradient(135deg, #48bb78, #38a169);
    color: white;
}

.btn-export:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(72, 187, 120, 0.4);
    color: white;
}

.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.empty-state i {
    color: #a0aec0;
    margin-bottom: 2rem;
    opacity: 0.7;
}

.empty-state h4 {
    color: #4a5568;
    font-weight: 600;
    margin-bottom: 1rem;
}

.empty-state p {
    color: #718096;
    font-size: 1.1rem;
    margin-bottom: 2rem;
}

@media (max-width: 768px) {
    .bookmarks-page {
        padding: 1rem 0;
    }
    
    .bookmarks-container {
        margin: 1rem;
        padding: 1.5rem;
        border-radius: 15px;
    }
    
    .bookmarks-header h2 {
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
    <div class="container">
        <div class="bookmarks-container">
            <div class="bookmarks-header">
                <h2>الوظائف المحفوظة</h2>
                <p class="subtitle">إدارة ومتابعة الوظائف التي قمت بحفظها</p>
            </div>
            
            @if(isset($bookmarkedJobs) && $bookmarkedJobs->count() > 0)
                <div class="row">
                    @foreach($bookmarkedJobs as $job)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card job-card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $job->title }}</h5>
                                <p class="card-text">
                                    <strong>الشركة:</strong> {{ $job->company_name ?? 'غير محدد' }}<br>
                                    <strong>الموقع:</strong> {{ $job->location ?? 'غير محدد' }}<br>
                                    <strong>النوع:</strong> {{ $job->type ?? 'دوام كامل' }}
                                </p>
                                @if($job->salary_min && $job->salary_max)
                                    <div class="salary-info">
                                        <strong>الراتب:</strong> {{ number_format($job->salary_min) }} - {{ number_format($job->salary_max) }} ريال
                                    </div>
                                @endif
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-custom-primary btn-sm">
                                        <i class="fas fa-eye"></i> عرض التفاصيل
                                    </a>
                                    <button class="btn btn-custom-danger btn-sm" onclick="removeBookmark({{ $job->id }})">
                                        <i class="fas fa-trash"></i> إزالة
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="action-buttons">
                    <button class="btn btn-action btn-clear-all" onclick="clearAllBookmarks()">
                        <i class="fas fa-trash-alt"></i> مسح جميع المحفوظات
                    </button>
                    <button class="btn btn-action btn-export" onclick="exportBookmarks()">
                        <i class="fas fa-download"></i> تصدير المحفوظات
                    </button>
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-bookmark fa-4x"></i>
                    <h4>لا توجد وظائف محفوظة</h4>
                    <p>لم تقم بحفظ أي وظائف بعد. ابدأ بتصفح الوظائف المتاحة واحفظ ما يهمك.</p>
                    <a href="{{ route('jobs.index') }}" class="btn btn-custom-primary">
                        <i class="fas fa-search"></i> تصفح الوظائف
                    </a>
                </div>
            @endif
        </div>
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
        const btn = document.querySelector('.btn-clear-all');
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
