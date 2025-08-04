@extends('layouts.app')

@section('title', 'الوظائف المحفوظة')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">الوظائف المحفوظة</h2>
            
            @if(isset($bookmarkedJobs) && $bookmarkedJobs->count() > 0)
                <div class="row">
                    @foreach($bookmarkedJobs as $job)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $job->title }}</h5>
                                <p class="card-text">
                                    <strong>الشركة:</strong> {{ $job->company_name ?? 'غير محدد' }}<br>
                                    <strong>الموقع:</strong> {{ $job->location ?? 'غير محدد' }}<br>
                                    <strong>النوع:</strong> {{ $job->type ?? 'دوام كامل' }}
                                </p>
                                @if($job->salary_min && $job->salary_max)
                                    <p class="text-success">
                                        <strong>الراتب:</strong> {{ number_format($job->salary_min) }} - {{ number_format($job->salary_max) }} ريال
                                    </p>
                                @endif
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-primary btn-sm">عرض التفاصيل</a>
                                    <button class="btn btn-outline-danger btn-sm" onclick="removeBookmark({{ $job->id }})">
                                        <i class="fas fa-bookmark"></i> إزالة
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="mt-4 text-center">
                    <button class="btn btn-danger me-2" onclick="clearAllBookmarks()">
                        <i class="fas fa-trash"></i> مسح جميع المحفوظات
                    </button>
                    <button class="btn btn-success" onclick="exportBookmarks()">
                        <i class="fas fa-download"></i> تصدير المحفوظات
                    </button>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-bookmark fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">لا توجد وظائف محفوظة</h4>
                    <p class="text-muted">لم تقم بحفظ أي وظائف بعد</p>
                    <a href="{{ route('jobs.index') }}" class="btn btn-primary">
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
        });
    }
}

function exportBookmarks() {
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
    });
}
</script>
@endpush
