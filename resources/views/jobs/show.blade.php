@extends('layouts.app')

@section('title', 'تفاصيل الوظيفة - فرصتي')

@section('content')
<div class="container">
    <div class="page-header">
        <h2 class="page-title">تفاصيل الوظيفة</h2>
        <a href="{{ route('jobs.index') }}" class="btn btn-outline">
            <i class="fas fa-arrow-right"></i> العودة للوظائف
        </a>
    </div>
    
    <div class="job-details-container">
        <div class="job-details-header">
            <h2 class="job-title">مطور تطبيقات جوال (React Native)</h2>
            
            <div class="job-quick-info">
                <div class="job-info-item">
                    <i class="fas fa-money-bill-wave"></i>
                    <span>الراتب: 9,000 - 14,000 ر.س</span>
                </div>
                <div class="job-info-item">
                    <i class="fas fa-briefcase"></i>
                    <span>الخبرة: 3+ سنوات</span>
                </div>
                <div class="job-info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>المكان: الرياض، السعودية</span>
                </div>
                <div class="job-info-item">
                    <i class="fas fa-building"></i>
                    <span>نوع العمل: دوام كامل</span>
                </div>
            </div>
        </div>
        
        <div class="job-details-body">
            <div class="job-section">
                <h3 class="job-section-title">وصف الوظيفة</h3>
                <div class="job-section-content">
                    <p>نبحث عن مطور تطبيقات جوال متمرس في React Native للانضمام إلى فريقنا التقني في الرياض. ستكون مسؤولاً عن تصميم وتطوير تطبيقات جوال عالية الجودة لأنظمة iOS و Android.</p>
                    <p>المهام الرئيسية تشمل تطوير واجهات مستخدم تفاعلية، تنفيذ عمليات دمج مع واجهات برمجة التطبيقات، تحسين الأداء، وكتابة كود نظيف وقابل للصيانة.</p>
                </div>
            </div>
            
            <div class="job-section">
                <h3 class="job-section-title">متطلبات المرشح</h3>
                <div class="job-section-content">
                    <ul class="requirements-list">
                        <li>شهادة بكالوريوس في علوم الحاسوب أو مجال ذي صلة</li>
                        <li>3+ سنوات خبرة عملية في تطوير تطبيقات الجوال باستخدام React Native</li>
                        <li>خبرة قوية في JavaScript و React.js</li>
                        <li>فهم عميق لمبادئ تطوير تطبيقات الجوال (iOS و Android)</li>
                        <li>خبرة في التعامل مع واجهات برمجة التطبيقات RESTful</li>
                        <li>خبرة في أنظمة التحكم بالإصدار مثل Git</li>
                        <li>مهارات تواصل ممتازة وقدرة على العمل ضمن فريق</li>
                    </ul>
                </div>
            </div>
            
            <div class="job-section">
                <h3 class="job-section-title">المهارات المطلوبة</h3>
                <div class="job-skills">
                    <span class="skill-tag">React Native</span>
                    <span class="skill-tag">JavaScript</span>
                    <span class="skill-tag">Redux</span>
                    <span class="skill-tag">RESTful APIs</span>
                    <span class="skill-tag">Firebase</span>
                    <span class="skill-tag">Git</span>
                    <span class="skill-tag">UI/UX Design</span>
                </div>
            </div>
            
            <div class="job-section">
                <h3 class="job-section-title">معلومات إضافية</h3>
                <div class="job-section-content">
                    <p><strong>الجنسيات المسموحة:</strong> جميع الجنسيات</p>
                    <p><strong>الدولة المطلوبة للإقامة:</strong> السعودية</p>
                    <p><strong>نوع العمل:</strong> دوام كامل</p>
                    <p><strong>معلومات عن الشركة:</strong> شركة رائدة في مجال التقنية، تأسست عام 2010، وتضم أكثر من 200 موظف. نركز على تطوير حلول تقنية مبتكرة للقطاعات المختلفة.</p>
                </div>
            </div>
        </div>
        
        <div class="job-details-footer">
            <div class="social-share">
                <a href="#" onclick="shareJob(1, 'whatsapp')" class="share-btn whatsapp">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="#" onclick="shareJob(1, 'facebook')" class="share-btn facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" onclick="shareJob(1, 'twitter')" class="share-btn gmail">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
            <div style="display: flex; gap: 1rem;">
                <button onclick="toggleBookmark({{ $job->id }})" class="btn btn-outline" data-job-id="{{ $job->id }}">
                    <i class="fas fa-bookmark"></i> حفظ الوظيفة
                </button>
                <button onclick="showApplicationModal({{ $job->id }})" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i> تقديم للوظيفة
                </button>
            </div>
        </div>
    </div>
    
    <!-- Similar Jobs Section -->
    <div style="margin-top: 3rem;">
        <h3 class="section-title">وظائف مشابهة</h3>
        <div class="jobs-container">
            <!-- Similar Job 1 -->
            <div class="job-card">
                <div class="job-header">
                    <span class="job-field">تطوير تطبيقات الجوال</span>
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
                            <span>2+ سنوات خبرة</span>
                        </div>
                        <div class="job-detail">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>الرياض، السعودية</span>
                        </div>
                    </div>
                    
                    <div class="job-skills">
                        <span class="skill-tag">Flutter</span>
                        <span class="skill-tag">Dart</span>
                        <span class="skill-tag">Firebase</span>
                    </div>
                </div>
                <div class="job-footer">
                    <div class="job-time-left">
                        <i class="fas fa-clock"></i>
                        متبقي 5 أيام
                    </div>
                    <a href="{{ route('jobs.show', 2) }}" class="btn btn-primary">عرض التفاصيل</a>
                </div>
            </div>
            
            <!-- Similar Job 2 -->
            <div class="job-card">
                <div class="job-header">
                    <span class="job-field">تطوير الويب</span>
                    <h3 class="job-company">مجموعة الحلول الرقمية</h3>
                    <div class="job-salary">
                        <i class="fas fa-money-bill-wave"></i>
                        7,000 - 11,000 ر.س
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
                            <span>جدة، السعودية</span>
                        </div>
                    </div>
                    
                    <div class="job-skills">
                        <span class="skill-tag">React</span>
                        <span class="skill-tag">Node.js</span>
                        <span class="skill-tag">MongoDB</span>
                    </div>
                </div>
                <div class="job-footer">
                    <div class="job-time-left">
                        <i class="fas fa-clock"></i>
                        متبقي 7 أيام
                    </div>
                    <a href="{{ route('jobs.show', 3) }}" class="btn btn-primary">عرض التفاصيل</a>
                </div>
            </div>
            
            <!-- Similar Job 3 -->
            <div class="job-card">
                <div class="job-header">
                    <span class="job-field">تطوير تطبيقات الجوال</span>
                    <h3 class="job-company">شركة الابتكار التقني</h3>
                    <div class="job-salary">
                        <i class="fas fa-money-bill-wave"></i>
                        10,000 - 15,000 ر.س
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
                        <span class="skill-tag">iOS</span>
                        <span class="skill-tag">Swift</span>
                        <span class="skill-tag">Xcode</span>
                    </div>
                </div>
                <div class="job-footer">
                    <div class="job-time-left">
                        <i class="fas fa-clock"></i>
                        متبقي 10 أيام
                    </div>
                    <a href="{{ route('jobs.show', 4) }}" class="btn btn-primary">عرض التفاصيل</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Application Modal -->
<div id="applicationModal" class="modal" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <h3>تقديم للوظيفة</h3>
            <span class="close" onclick="closeApplicationModal()">&times;</span>
        </div>
        <div class="modal-body">
            <form id="applicationForm" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="video">فيديو التقديم *</label>
                    <input type="file" id="video" name="video" accept="video/*" required>
                    <small class="form-text">يجب رفع فيديو (MP4, AVI, MOV) - الحد الأقصى 10 ميجابايت</small>
                </div>
                
                <div class="form-group">
                    <label for="cover_letter">رسالة تغطية (اختياري)</label>
                    <textarea id="cover_letter" name="cover_letter" rows="4" placeholder="اكتب رسالة تغطية مختصرة..."></textarea>
                </div>
                
                <div class="form-actions">
                    <button type="button" onclick="closeApplicationModal()" class="btn btn-outline">إلغاء</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> تقديم الطلب
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
/* Modal Styles */
.modal {
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(5px);
}

.modal-content {
    background-color: white;
    margin: 5% auto;
    padding: 0;
    border-radius: 12px;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    animation: modalSlideIn 0.3s ease;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.modal-header {
    padding: 1.5rem;
    border-bottom: 1px solid #e2e8f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 12px 12px 0 0;
}

.modal-header h3 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
}

.close {
    color: white;
    font-size: 2rem;
    font-weight: bold;
    cursor: pointer;
    line-height: 1;
    transition: opacity 0.3s ease;
}

.close:hover {
    opacity: 0.7;
}

.modal-body {
    padding: 2rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #374151;
}

.form-group input[type="file"],
.form-group textarea {
    width: 100%;
    padding: 0.75rem;
    border: 2px solid #e2e8f0;
    border-radius: 8px;
    font-family: 'Cairo', sans-serif;
    transition: border-color 0.3s ease;
}

.form-group input[type="file"]:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.form-group textarea {
    resize: vertical;
    min-height: 100px;
}

.form-text {
    display: block;
    margin-top: 0.5rem;
    font-size: 0.875rem;
    color: #6b7280;
}

.form-actions {
    display: flex;
    gap: 1rem;
    justify-content: flex-end;
    margin-top: 2rem;
}

.form-actions .btn {
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
}

/* Upload Progress */
.upload-progress {
    margin-top: 1rem;
    display: none;
}

.progress-bar {
    width: 100%;
    height: 8px;
    background-color: #e2e8f0;
    border-radius: 4px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #667eea, #764ba2);
    width: 0%;
    transition: width 0.3s ease;
}

.progress-text {
    text-align: center;
    margin-top: 0.5rem;
    font-size: 0.875rem;
    color: #6b7280;
}
</style>
@endpush

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
            // تغيير لون الأيقونة ونص الزر فوراً
            if (data.isBookmarked) {
                // محفوظ - زر مملوء أصفر
                icon.style.color = '#f59e0b';
                icon.classList.remove('far');
                icon.classList.add('fas');
                button.innerHTML = '<i class="fas fa-bookmark" style="color: #f59e0b;"></i> إزالة من المحفوظات';
                button.title = 'إزالة من المحفوظات';
            } else {
                // غير محفوظ - زر فارغ رمادي
                icon.style.color = '#6c757d';
                icon.classList.remove('fas');
                icon.classList.add('far');
                button.innerHTML = '<i class="far fa-bookmark" style="color: #6c757d;"></i> حفظ الوظيفة';
                button.title = 'حفظ الوظيفة';
            }
            
            // إظهار رسالة نجاح
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

// وظائف Modal
function showApplicationModal(jobId) {
    // التحقق من تسجيل الدخول
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        showToast('يجب تسجيل الدخول أولاً', 'error');
        setTimeout(() => {
            window.location.href = '/login';
        }, 2000);
        return;
    }
    
    // إظهار Modal
    const modal = document.getElementById('applicationModal');
    modal.style.display = 'block';
    
    // إعداد Form للوظيفة المحددة
    const form = document.getElementById('applicationForm');
    form.setAttribute('data-job-id', jobId);
}

function closeApplicationModal() {
    const modal = document.getElementById('applicationModal');
    modal.style.display = 'none';
    
    // إعادة تعيين Form
    const form = document.getElementById('applicationForm');
    form.reset();
    
    // إخفاء progress bar
    const progressDiv = document.querySelector('.upload-progress');
    if (progressDiv) {
        progressDiv.style.display = 'none';
    }
}

// إغلاق Modal عند النقر خارجه
window.onclick = function(event) {
    const modal = document.getElementById('applicationModal');
    if (event.target === modal) {
        closeApplicationModal();
    }
}

// معالج إرسال Form
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('applicationForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const jobId = form.getAttribute('data-job-id');
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnContent = submitBtn.innerHTML;
            
            // التحقق من وجود فيديو
            const videoFile = document.getElementById('video').files[0];
            if (!videoFile) {
                showToast('يجب اختيار فيديو للتقديم', 'error');
                return;
            }
            
            // التحقق من حجم الملف (10MB)
            if (videoFile.size > 10 * 1024 * 1024) {
                showToast('حجم الفيديو يجب أن يكون أقل من 10 ميجابايت', 'error');
                return;
            }
            
            // تعطيل الزر وإظهار حالة التحميل
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري الرفع...';
            
            // إنشاء XMLHttpRequest للتحكم في progress
            const xhr = new XMLHttpRequest();
            
            // إعداد progress bar
            let progressDiv = document.querySelector('.upload-progress');
            if (!progressDiv) {
                progressDiv = document.createElement('div');
                progressDiv.className = 'upload-progress';
                progressDiv.innerHTML = `
                    <div class="progress-bar">
                        <div class="progress-fill"></div>
                    </div>
                    <div class="progress-text">0%</div>
                `;
                form.appendChild(progressDiv);
            }
            progressDiv.style.display = 'block';
            
            const progressFill = progressDiv.querySelector('.progress-fill');
            const progressText = progressDiv.querySelector('.progress-text');
            
            // تتبع تقدم الرفع
            xhr.upload.addEventListener('progress', function(e) {
                if (e.lengthComputable) {
                    const percentComplete = (e.loaded / e.total) * 100;
                    progressFill.style.width = percentComplete + '%';
                    progressText.textContent = Math.round(percentComplete) + '%';
                }
            });
            
            // معالج الاستجابة
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        try {
                            const data = JSON.parse(xhr.responseText);
                            if (data.success) {
                                showToast(data.message || 'تم التقديم للوظيفة بنجاح!', 'success');
                                closeApplicationModal();
                                
                                // تحديث زر التقديم في الصفحة
                                const applyBtn = document.querySelector(`button[onclick*="showApplicationModal(${jobId})"]`);
                                if (applyBtn) {
                                    applyBtn.innerHTML = '<i class="fas fa-check"></i> تم التقديم';
                                    applyBtn.classList.remove('btn-primary');
                                    applyBtn.classList.add('btn-success');
                                    applyBtn.style.background = '#10b981';
                                    applyBtn.disabled = true;
                                }
                            } else {
                                showToast(data.message || 'حدث خطأ أثناء التقديم', 'error');
                            }
                        } catch (error) {
                            showToast('حدث خطأ في معالجة الاستجابة', 'error');
                        }
                    } else {
                        showToast('حدث خطأ أثناء التقديم للوظيفة', 'error');
                    }
                    
                    // إعادة تفعيل الزر
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnContent;
                    progressDiv.style.display = 'none';
                }
            };
            
            // إرسال الطلب
            xhr.open('POST', `/jobs/${jobId}/apply`);
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            xhr.send(formData);
        });
    }
});

// وظيفة مشاركة الوظيفة
function shareJob(jobId, platform) {
    const jobTitle = document.querySelector('.job-title').textContent;
    const jobUrl = window.location.href;
    
    let shareUrl = '';
    let shareText = `تحقق من هذه الوظيفة: ${jobTitle} - ${jobUrl}`;
    
    switch(platform) {
        case 'whatsapp':
            shareUrl = `https://wa.me/?text=${encodeURIComponent(shareText)}`;
            break;
        case 'twitter':
            shareUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(shareText)}`;
            break;
        case 'facebook':
            shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(jobUrl)}`;
            break;
        case 'linkedin':
            shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(jobUrl)}`;
            break;
    }
    
    if (shareUrl) {
        window.open(shareUrl, '_blank', 'width=600,height=400');
    }
}
</script>
@endpush