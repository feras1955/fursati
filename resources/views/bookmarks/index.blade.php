@extends('layouts.app')

@section('title', 'الوظائف المحفوظة - فرصتي')

@section('content')
<!-- Bookmarks Container -->
<div class="bookmarks-container">
    <div class="container">
        <div class="page-header">
            <h2 class="page-title">الوظائف المحفوظة</h2>
            <p class="page-subtitle">إدارة الوظائف التي قمت بحفظها للرجوع إليها لاحقاً</p>
        </div>

        <div class="bookmarks-content">
            <div class="bookmarks-filters">
                <div class="filter-group">
                    <label>ترتيب حسب:</label>
                    <select class="form-control" onchange="sortBookmarks(this.value)">
                        <option value="date">تاريخ الحفظ</option>
                        <option value="title">اسم الوظيفة</option>
                        <option value="company">اسم الشركة</option>
                        <option value="salary">الراتب</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>حالة الوظيفة:</label>
                    <select class="form-control" onchange="filterByStatus(this.value)">
                        <option value="all">جميع الوظائف</option>
                        <option value="active">نشطة</option>
                        <option value="expired">منتهية الصلاحية</option>
                        <option value="filled">تم شغلها</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>المجال:</label>
                    <select class="form-control" onchange="filterByCategory(this.value)">
                        <option value="all">جميع المجالات</option>
                        <option value="technology">تقنية المعلومات</option>
                        <option value="marketing">التسويق</option>
                        <option value="finance">المالية</option>
                        <option value="hr">الموارد البشرية</option>
                        <option value="sales">المبيعات</option>
                    </select>
                </div>
            </div>

            <div class="bookmarks-stats">
                <div class="stat-item">
                    <span class="stat-number">8</span>
                    <span class="stat-label">وظيفة محفوظة</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">5</span>
                    <span class="stat-label">وظيفة نشطة</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">2</span>
                    <span class="stat-label">وظيفة منتهية الصلاحية</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">1</span>
                    <span class="stat-label">وظيفة تم شغلها</span>
                </div>
            </div>

            <div class="bookmarks-grid">
                <!-- Bookmarked Job 1 -->
                <div class="job-card bookmarked" data-job-id="1" data-category="technology" data-status="active">
                    <div class="job-header">
                        <div class="job-title">
                            <h3>مطور ويب متقدم</h3>
                            <span class="job-status active">نشطة</span>
                        </div>
                        <button class="bookmark-btn bookmarked" onclick="toggleBookmark(1)" data-job-id="1">
                            <i class="fas fa-bookmark"></i>
                        </button>
                    </div>
                    <div class="company-info">
                        <img src="{{ asset('images/company1.jpg') }}" alt="شركة التقنية المتقدمة" class="company-logo">
                        <div class="company-details">
                            <h4>شركة التقنية المتقدمة</h4>
                            <p><i class="fas fa-map-marker-alt"></i> الرياض، السعودية</p>
                        </div>
                    </div>
                    <div class="job-details">
                        <div class="detail-item">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>15,000 - 25,000 ريال</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-clock"></i>
                            <span>دوام كامل</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>منذ 3 أيام</span>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="tag">Laravel</span>
                        <span class="tag">Vue.js</span>
                        <span class="tag">MySQL</span>
                        <span class="tag">5 سنوات خبرة</span>
                    </div>
                    <div class="job-actions">
                        <button class="btn btn-primary" onclick="applyForJob(1)">
                            <i class="fas fa-paper-plane"></i> تقديم طلب
                        </button>
                        <a href="{{ route('jobs.show', 1) }}" class="btn btn-outline">
                            <i class="fas fa-eye"></i> عرض التفاصيل
                        </a>
                    </div>
                </div>

                <!-- Bookmarked Job 2 -->
                <div class="job-card bookmarked" data-job-id="2" data-category="technology" data-status="active">
                    <div class="job-header">
                        <div class="job-title">
                            <h3>مطور تطبيقات جوال</h3>
                            <span class="job-status active">نشطة</span>
                        </div>
                        <button class="bookmark-btn bookmarked" onclick="toggleBookmark(2)" data-job-id="2">
                            <i class="fas fa-bookmark"></i>
                        </button>
                    </div>
                    <div class="company-info">
                        <img src="{{ asset('images/company2.jpg') }}" alt="مجموعة الحلول الرقمية" class="company-logo">
                        <div class="company-details">
                            <h4>مجموعة الحلول الرقمية</h4>
                            <p><i class="fas fa-map-marker-alt"></i> جدة، السعودية</p>
                        </div>
                    </div>
                    <div class="job-details">
                        <div class="detail-item">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>12,000 - 20,000 ريال</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-clock"></i>
                            <span>دوام كامل</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>منذ أسبوع</span>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="tag">React Native</span>
                        <span class="tag">Flutter</span>
                        <span class="tag">Firebase</span>
                        <span class="tag">3 سنوات خبرة</span>
                    </div>
                    <div class="job-actions">
                        <button class="btn btn-primary" onclick="applyForJob(2)">
                            <i class="fas fa-paper-plane"></i> تقديم طلب
                        </button>
                        <a href="{{ route('jobs.show', 2) }}" class="btn btn-outline">
                            <i class="fas fa-eye"></i> عرض التفاصيل
                        </a>
                    </div>
                </div>

                <!-- Bookmarked Job 3 -->
                <div class="job-card bookmarked" data-job-id="3" data-category="marketing" data-status="active">
                    <div class="job-header">
                        <div class="job-title">
                            <h3>مدير تسويق رقمي</h3>
                            <span class="job-status active">نشطة</span>
                        </div>
                        <button class="bookmark-btn bookmarked" onclick="toggleBookmark(3)" data-job-id="3">
                            <i class="fas fa-bookmark"></i>
                        </button>
                    </div>
                    <div class="company-info">
                        <img src="{{ asset('images/company3.jpg') }}" alt="شركة التسويق الإبداعي" class="company-logo">
                        <div class="company-details">
                            <h4>شركة التسويق الإبداعي</h4>
                            <p><i class="fas fa-map-marker-alt"></i> الدمام، السعودية</p>
                        </div>
                    </div>
                    <div class="job-details">
                        <div class="detail-item">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>18,000 - 30,000 ريال</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-clock"></i>
                            <span>دوام كامل</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>منذ 5 أيام</span>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="tag">التسويق الرقمي</span>
                        <span class="tag">Google Ads</span>
                        <span class="tag">Facebook Ads</span>
                        <span class="tag">4 سنوات خبرة</span>
                    </div>
                    <div class="job-actions">
                        <button class="btn btn-primary" onclick="applyForJob(3)">
                            <i class="fas fa-paper-plane"></i> تقديم طلب
                        </button>
                        <a href="{{ route('jobs.show', 3) }}" class="btn btn-outline">
                            <i class="fas fa-eye"></i> عرض التفاصيل
                        </a>
                    </div>
                </div>

                <!-- Bookmarked Job 4 -->
                <div class="job-card bookmarked" data-job-id="4" data-category="finance" data-status="expired">
                    <div class="job-header">
                        <div class="job-title">
                            <h3>محلل مالي</h3>
                            <span class="job-status expired">منتهية الصلاحية</span>
                        </div>
                        <button class="bookmark-btn bookmarked" onclick="toggleBookmark(4)" data-job-id="4">
                            <i class="fas fa-bookmark"></i>
                        </button>
                    </div>
                    <div class="company-info">
                        <img src="{{ asset('images/company4.jpg') }}" alt="مجموعة الاستثمار المالي" class="company-logo">
                        <div class="company-details">
                            <h4>مجموعة الاستثمار المالي</h4>
                            <p><i class="fas fa-map-marker-alt"></i> الرياض، السعودية</p>
                        </div>
                    </div>
                    <div class="job-details">
                        <div class="detail-item">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>20,000 - 35,000 ريال</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-clock"></i>
                            <span>دوام كامل</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>منذ أسبوعين</span>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="tag">التحليل المالي</span>
                        <span class="tag">Excel</span>
                        <span class="tag">Power BI</span>
                        <span class="tag">6 سنوات خبرة</span>
                    </div>
                    <div class="job-actions">
                        <button class="btn btn-disabled" disabled>
                            <i class="fas fa-times"></i> منتهية الصلاحية
                        </button>
                        <a href="{{ route('jobs.show', 4) }}" class="btn btn-outline">
                            <i class="fas fa-eye"></i> عرض التفاصيل
                        </a>
                    </div>
                </div>

                <!-- Bookmarked Job 5 -->
                <div class="job-card bookmarked" data-job-id="5" data-category="hr" data-status="filled">
                    <div class="job-header">
                        <div class="job-title">
                            <h3>مدير موارد بشرية</h3>
                            <span class="job-status filled">تم شغلها</span>
                        </div>
                        <button class="bookmark-btn bookmarked" onclick="toggleBookmark(5)" data-job-id="5">
                            <i class="fas fa-bookmark"></i>
                        </button>
                    </div>
                    <div class="company-info">
                        <img src="{{ asset('images/company5.jpg') }}" alt="شركة الخدمات الإدارية" class="company-logo">
                        <div class="company-details">
                            <h4>شركة الخدمات الإدارية</h4>
                            <p><i class="fas fa-map-marker-alt"></i> جدة، السعودية</p>
                        </div>
                    </div>
                    <div class="job-details">
                        <div class="detail-item">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>25,000 - 40,000 ريال</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-clock"></i>
                            <span>دوام كامل</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>منذ 3 أسابيع</span>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="tag">إدارة الموارد البشرية</span>
                        <span class="tag">التوظيف</span>
                        <span class="tag">التدريب</span>
                        <span class="tag">8 سنوات خبرة</span>
                    </div>
                    <div class="job-actions">
                        <button class="btn btn-disabled" disabled>
                            <i class="fas fa-check"></i> تم شغلها
                        </button>
                        <a href="{{ route('jobs.show', 5) }}" class="btn btn-outline">
                            <i class="fas fa-eye"></i> عرض التفاصيل
                        </a>
                    </div>
                </div>

                <!-- Bookmarked Job 6 -->
                <div class="job-card bookmarked" data-job-id="6" data-category="technology" data-status="active">
                    <div class="job-header">
                        <div class="job-title">
                            <h3>مهندس DevOps</h3>
                            <span class="job-status active">نشطة</span>
                        </div>
                        <button class="bookmark-btn bookmarked" onclick="toggleBookmark(6)" data-job-id="6">
                            <i class="fas fa-bookmark"></i>
                        </button>
                    </div>
                    <div class="company-info">
                        <img src="{{ asset('images/company6.jpg') }}" alt="شركة التقنية السحابية" class="company-logo">
                        <div class="company-details">
                            <h4>شركة التقنية السحابية</h4>
                            <p><i class="fas fa-map-marker-alt"></i> الرياض، السعودية</p>
                        </div>
                    </div>
                    <div class="job-details">
                        <div class="detail-item">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>22,000 - 35,000 ريال</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-clock"></i>
                            <span>دوام كامل</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>منذ يومين</span>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="tag">Docker</span>
                        <span class="tag">Kubernetes</span>
                        <span class="tag">AWS</span>
                        <span class="tag">4 سنوات خبرة</span>
                    </div>
                    <div class="job-actions">
                        <button class="btn btn-primary" onclick="applyForJob(6)">
                            <i class="fas fa-paper-plane"></i> تقديم طلب
                        </button>
                        <a href="{{ route('jobs.show', 6) }}" class="btn btn-outline">
                            <i class="fas fa-eye"></i> عرض التفاصيل
                        </a>
                    </div>
                </div>

                <!-- Bookmarked Job 7 -->
                <div class="job-card bookmarked" data-job-id="7" data-category="sales" data-status="active">
                    <div class="job-header">
                        <div class="job-title">
                            <h3>مدير مبيعات</h3>
                            <span class="job-status active">نشطة</span>
                        </div>
                        <button class="bookmark-btn bookmarked" onclick="toggleBookmark(7)" data-job-id="7">
                            <i class="fas fa-bookmark"></i>
                        </button>
                    </div>
                    <div class="company-info">
                        <img src="{{ asset('images/company7.jpg') }}" alt="شركة المبيعات العالمية" class="company-logo">
                        <div class="company-details">
                            <h4>شركة المبيعات العالمية</h4>
                            <p><i class="fas fa-map-marker-alt"></i> الدمام، السعودية</p>
                        </div>
                    </div>
                    <div class="job-details">
                        <div class="detail-item">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>15,000 - 25,000 ريال + عمولة</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-clock"></i>
                            <span>دوام كامل</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>منذ 4 أيام</span>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="tag">المبيعات</span>
                        <span class="tag">إدارة الفريق</span>
                        <span class="tag">CRM</span>
                        <span class="tag">5 سنوات خبرة</span>
                    </div>
                    <div class="job-actions">
                        <button class="btn btn-primary" onclick="applyForJob(7)">
                            <i class="fas fa-paper-plane"></i> تقديم طلب
                        </button>
                        <a href="{{ route('jobs.show', 7) }}" class="btn btn-outline">
                            <i class="fas fa-eye"></i> عرض التفاصيل
                        </a>
                    </div>
                </div>

                <!-- Bookmarked Job 8 -->
                <div class="job-card bookmarked" data-job-id="8" data-category="technology" data-status="expired">
                    <div class="job-header">
                        <div class="job-title">
                            <h3>مطور Full Stack</h3>
                            <span class="job-status expired">منتهية الصلاحية</span>
                        </div>
                        <button class="bookmark-btn bookmarked" onclick="toggleBookmark(8)" data-job-id="8">
                            <i class="fas fa-bookmark"></i>
                        </button>
                    </div>
                    <div class="company-info">
                        <img src="{{ asset('images/company8.jpg') }}" alt="استوديو التطوير الرقمي" class="company-logo">
                        <div class="company-details">
                            <h4>استوديو التطوير الرقمي</h4>
                            <p><i class="fas fa-map-marker-alt"></i> جدة، السعودية</p>
                        </div>
                    </div>
                    <div class="job-details">
                        <div class="detail-item">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>18,000 - 28,000 ريال</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-clock"></i>
                            <span>دوام كامل</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>منذ أسبوع</span>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="tag">React</span>
                        <span class="tag">Node.js</span>
                        <span class="tag">MongoDB</span>
                        <span class="tag">3 سنوات خبرة</span>
                    </div>
                    <div class="job-actions">
                        <button class="btn btn-disabled" disabled>
                            <i class="fas fa-times"></i> منتهية الصلاحية
                        </button>
                        <a href="{{ route('jobs.show', 8) }}" class="btn btn-outline">
                            <i class="fas fa-eye"></i> عرض التفاصيل
                        </a>
                    </div>
                </div>
            </div>

            <div class="bookmarks-actions">
                <button class="btn btn-outline" onclick="clearAllBookmarks()">
                    <i class="fas fa-trash"></i> مسح جميع المحفوظات
                </button>
                <button class="btn btn-primary" onclick="exportBookmarks()">
                    <i class="fas fa-download"></i> تصدير المحفوظات
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function sortBookmarks(sortBy) {
    const bookmarksGrid = document.querySelector('.bookmarks-grid');
    const jobCards = Array.from(bookmarksGrid.querySelectorAll('.job-card'));
    
    jobCards.sort((a, b) => {
        let aValue, bValue;
        
        switch(sortBy) {
            case 'date':
                // Sort by date (assuming newer jobs come first)
                aValue = new Date(a.querySelector('.detail-item:last-child span').textContent);
                bValue = new Date(b.querySelector('.detail-item:last-child span').textContent);
                return bValue - aValue;
            case 'title':
                aValue = a.querySelector('.job-title h3').textContent;
                bValue = b.querySelector('.job-title h3').textContent;
                return aValue.localeCompare(bValue, 'ar');
            case 'company':
                aValue = a.querySelector('.company-details h4').textContent;
                bValue = b.querySelector('.company-details h4').textContent;
                return aValue.localeCompare(bValue, 'ar');
            case 'salary':
                // Extract salary numbers for comparison
                aValue = parseInt(a.querySelector('.detail-item span').textContent.match(/\d+/)[0]);
                bValue = parseInt(b.querySelector('.detail-item span').textContent.match(/\d+/)[0]);
                return bValue - aValue;
        }
    });
    
    // Re-append sorted cards
    jobCards.forEach(card => bookmarksGrid.appendChild(card));
}

function filterByStatus(status) {
    const jobCards = document.querySelectorAll('.job-card');
    
    jobCards.forEach(card => {
        const cardStatus = card.dataset.status;
        if (status === 'all' || cardStatus === status) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
    
    updateBookmarksStats();
}

function filterByCategory(category) {
    const jobCards = document.querySelectorAll('.job-card');
    
    jobCards.forEach(card => {
        const cardCategory = card.dataset.category;
        if (category === 'all' || cardCategory === category) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
    
    updateBookmarksStats();
}

function updateBookmarksStats() {
    const visibleCards = document.querySelectorAll('.job-card[style="display: block"], .job-card:not([style*="display"])');
    const totalBookmarks = visibleCards.length;
    const activeJobs = Array.from(visibleCards).filter(card => card.dataset.status === 'active').length;
    const expiredJobs = Array.from(visibleCards).filter(card => card.dataset.status === 'expired').length;
    const filledJobs = Array.from(visibleCards).filter(card => card.dataset.status === 'filled').length;
    
    // Update stats display
    document.querySelector('.stat-item:nth-child(1) .stat-number').textContent = totalBookmarks;
    document.querySelector('.stat-item:nth-child(2) .stat-number').textContent = activeJobs;
    document.querySelector('.stat-item:nth-child(3) .stat-number').textContent = expiredJobs;
    document.querySelector('.stat-item:nth-child(4) .stat-number').textContent = filledJobs;
}

function clearAllBookmarks() {
    if (confirm('هل أنت متأكد من مسح جميع الوظائف المحفوظة؟')) {
        fetch('{{ route("bookmarks.clear-all") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove all bookmarked jobs from the page
                document.querySelectorAll('.job-card').forEach(card => {
                    card.remove();
                });
                
                // Update stats
                updateBookmarksStats();
                
                showNotification('تم مسح جميع الوظائف المحفوظة بنجاح', 'success');
            } else {
                showNotification('حدث خطأ أثناء مسح المحفوظات', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('حدث خطأ أثناء مسح المحفوظات', 'error');
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
        a.download = 'bookmarked_jobs.pdf';
        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);
        document.body.removeChild(a);
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('حدث خطأ أثناء تصدير المحفوظات', 'error');
    });
}

function toggleBookmark(jobId) {
    // Send AJAX request to toggle bookmark
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
            // Remove the job card from bookmarks page
            const jobCard = document.querySelector(`[data-job-id="${jobId}"]`);
            if (jobCard) {
                jobCard.remove();
                updateBookmarksStats();
                showNotification('تم إزالة الوظيفة من المحفوظات', 'success');
            }
        } else {
            showNotification('حدث خطأ أثناء إزالة الوظيفة من المحفوظات', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('حدث خطأ أثناء إزالة الوظيفة من المحفوظات', 'error');
    });
}

function applyForJob(jobId) {
    // Send AJAX request to apply for job
    fetch(`/jobs/${jobId}/apply`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('تم تقديم طلبك بنجاح', 'success');
        } else {
            showNotification('حدث خطأ أثناء تقديم الطلب', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('حدث خطأ أثناء تقديم الطلب', 'error');
    });
}

function showNotification(message, type) {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.textContent = message;
    
    // Add to page
    document.body.appendChild(notification);
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    updateBookmarksStats();
});
</script>
@endpush 