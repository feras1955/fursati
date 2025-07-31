@extends('layouts.app')

@section('title', 'مركز المساعدة - فرصتي')

@section('content')
<!-- Help Container -->
<div class="help-container">
    <div class="container">
        <div class="page-header">
            <h2 class="page-title">مركز المساعدة</h2>
            <p class="page-subtitle">نحن هنا لمساعدتك في حل أي مشكلة تواجهها</p>
        </div>

        <div class="help-content">
            <div class="help-search">
                <div class="search-box">
                    <input type="text" id="helpSearch" placeholder="ابحث في مركز المساعدة..." onkeyup="searchHelp()">
                    <i class="fas fa-search"></i>
                </div>
            </div>

            <div class="help-sections">
                <!-- Quick Help Section -->
                <div class="help-section">
                    <h3><i class="fas fa-lightbulb"></i> مساعدة سريعة</h3>
                    <div class="quick-help-grid">
                        <div class="help-card">
                            <div class="help-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <h4>إنشاء حساب جديد</h4>
                            <p>تعلم كيفية إنشاء حساب في منصة فرصتي</p>
                            <a href="{{ route('faq.index') }}#account" class="btn btn-outline">تعلم المزيد</a>
                        </div>

                        <div class="help-card">
                            <div class="help-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <h4>البحث عن وظائف</h4>
                            <p>كيفية البحث والتقديم على الوظائف</p>
                            <a href="{{ route('faq.index') }}#jobs" class="btn btn-outline">تعلم المزيد</a>
                        </div>

                        <div class="help-card">
                            <div class="help-icon">
                                <i class="fas fa-user-edit"></i>
                            </div>
                            <h4>تحديث الملف الشخصي</h4>
                            <p>كيفية تحديث معلوماتك الشخصية</p>
                            <a href="{{ route('faq.index') }}#profile" class="btn btn-outline">تعلم المزيد</a>
                        </div>

                        <div class="help-card">
                            <div class="help-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h4>الأمان والخصوصية</h4>
                            <p>حماية معلوماتك الشخصية</p>
                            <a href="{{ route('faq.index') }}#privacy" class="btn btn-outline">تعلم المزيد</a>
                        </div>
                    </div>
                </div>

                <!-- Contact Methods Section -->
                <div class="help-section">
                    <h3><i class="fas fa-headset"></i> طرق التواصل</h3>
                    <div class="contact-methods">
                        <div class="contact-method">
                            <div class="method-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="method-info">
                                <h4>البريد الإلكتروني</h4>
                                <p>أرسل لنا بريد إلكتروني وسنرد عليك خلال 24 ساعة</p>
                                <a href="mailto:support@fursati.com" class="btn btn-primary">
                                    <i class="fas fa-envelope"></i> إرسال بريد إلكتروني
                                </a>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="method-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="method-info">
                                <h4>الهاتف</h4>
                                <p>اتصل بنا مباشرة من الأحد إلى الخميس (8 ص - 5 م)</p>
                                <a href="tel:+966111234567" class="btn btn-primary">
                                    <i class="fas fa-phone"></i> +966 11 123 4567
                                </a>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="method-icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            <div class="method-info">
                                <h4>الدردشة المباشرة</h4>
                                <p>تحدث مع فريق الدعم الفني مباشرة</p>
                                <button class="btn btn-primary" onclick="openLiveChat()">
                                    <i class="fas fa-comments"></i> بدء الدردشة
                                </button>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="method-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="method-info">
                                <h4>المكتب الرئيسي</h4>
                                <p>زيارة مكتبنا في الرياض</p>
                                <p class="address">الرياض، المملكة العربية السعودية<br>برج المملكة، الطابق 15</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Support Ticket Section -->
                <div class="help-section">
                    <h3><i class="fas fa-ticket-alt"></i> إنشاء تذكرة دعم</h3>
                    <div class="ticket-form">
                        <form id="supportTicketForm" onsubmit="submitTicket(); return false;">
                            @csrf
                            <div class="form-row">
                                <div class="form-group">
                                    <label>نوع المشكلة</label>
                                    <select name="issue_type" class="form-control" required>
                                        <option value="">اختر نوع المشكلة</option>
                                        <option value="technical">مشكلة تقنية</option>
                                        <option value="account">مشكلة في الحساب</option>
                                        <option value="application">مشكلة في التقديم</option>
                                        <option value="payment">مشكلة في الدفع</option>
                                        <option value="other">أخرى</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>الأولوية</label>
                                    <select name="priority" class="form-control" required>
                                        <option value="low">منخفضة</option>
                                        <option value="medium" selected>متوسطة</option>
                                        <option value="high">عالية</option>
                                        <option value="urgent">عاجلة</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>الموضوع</label>
                                <input type="text" name="subject" class="form-control" placeholder="اكتب عنوان مختصر للمشكلة" required>
                            </div>

                            <div class="form-group">
                                <label>الوصف التفصيلي</label>
                                <textarea name="description" class="form-control" rows="6" placeholder="اشرح مشكلتك بالتفصيل..." required></textarea>
                            </div>

                            <div class="form-group">
                                <label>معلومات إضافية</label>
                                <textarea name="additional_info" class="form-control" rows="3" placeholder="أي معلومات إضافية قد تساعد في حل المشكلة..."></textarea>
                            </div>

                            <div class="form-group">
                                <label>رفع ملف (اختياري)</label>
                                <input type="file" name="attachment" class="form-control" accept="image/*,.pdf,.doc,.docx">
                                <small>يمكنك رفع صورة أو ملف PDF أو Word (الحد الأقصى 5 ميجابايت)</small>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane"></i> إرسال التذكرة
                                </button>
                                <button type="reset" class="btn btn-outline">
                                    <i class="fas fa-undo"></i> إعادة تعيين
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- FAQ Section -->
                <div class="help-section">
                    <h3><i class="fas fa-question-circle"></i> الأسئلة الشائعة</h3>
                    <div class="faq-preview">
                        <div class="faq-item">
                            <h4>كيف يمكنني إنشاء حساب جديد؟</h4>
                            <p>انقر على "تسجيل الدخول" ثم "إنشاء حساب جديد" واتبع الخطوات...</p>
                            <a href="{{ route('faq.index') }}#account" class="read-more">اقرأ المزيد</a>
                        </div>

                        <div class="faq-item">
                            <h4>كيف يمكنني البحث عن وظائف؟</h4>
                            <p>استخدم شريط البحث في الصفحة الرئيسية أو استخدم الفلاتر المتقدمة...</p>
                            <a href="{{ route('faq.index') }}#jobs" class="read-more">اقرأ المزيد</a>
                        </div>

                        <div class="faq-item">
                            <h4>كيف يمكنني تحديث ملفي الشخصي؟</h4>
                            <p>اذهب إلى "الملف الشخصي" ثم "تعديل الملف الشخصي" وحدّث المعلومات...</p>
                            <a href="{{ route('faq.index') }}#profile" class="read-more">اقرأ المزيد</a>
                        </div>

                        <div class="faq-item">
                            <h4>كيف تحمون معلوماتي الشخصية؟</h4>
                            <p>نحن نستخدم تقنيات تشفير متقدمة ونتبع أفضل ممارسات الأمان...</p>
                            <a href="{{ route('faq.index') }}#privacy" class="read-more">اقرأ المزيد</a>
                        </div>
                    </div>
                    <div class="faq-more">
                        <a href="{{ route('faq.index') }}" class="btn btn-outline">
                            <i class="fas fa-list"></i> عرض جميع الأسئلة الشائعة
                        </a>
                    </div>
                </div>

                <!-- Video Tutorials Section -->
                <div class="help-section">
                    <h3><i class="fas fa-play-circle"></i> الفيديوهات التعليمية</h3>
                    <div class="video-tutorials">
                        <div class="video-item">
                            <div class="video-thumbnail">
                                <img src="{{ asset('images/tutorial1.jpg') }}" alt="إنشاء حساب جديد">
                                <div class="play-button">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="video-info">
                                <h4>إنشاء حساب جديد</h4>
                                <p>تعلم كيفية إنشاء حساب في منصة فرصتي خطوة بخطوة</p>
                                <span class="duration">3:45 دقيقة</span>
                            </div>
                        </div>

                        <div class="video-item">
                            <div class="video-thumbnail">
                                <img src="{{ asset('images/tutorial2.jpg') }}" alt="البحث عن وظائف">
                                <div class="play-button">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="video-info">
                                <h4>البحث عن وظائف</h4>
                                <p>كيفية البحث والتقديم على الوظائف بفعالية</p>
                                <span class="duration">5:20 دقيقة</span>
                            </div>
                        </div>

                        <div class="video-item">
                            <div class="video-thumbnail">
                                <img src="{{ asset('images/tutorial3.jpg') }}" alt="تحديث الملف الشخصي">
                                <div class="play-button">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="video-info">
                                <h4>تحديث الملف الشخصي</h4>
                                <p>كيفية تحديث معلوماتك الشخصية والسيرة الذاتية</p>
                                <span class="duration">4:15 دقيقة</span>
                            </div>
                        </div>

                        <div class="video-item">
                            <div class="video-thumbnail">
                                <img src="{{ asset('images/tutorial4.jpg') }}" alt="إعدادات الخصوصية">
                                <div class="play-button">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="video-info">
                                <h4>إعدادات الخصوصية</h4>
                                <p>كيفية التحكم في خصوصية ملفك الشخصي</p>
                                <span class="duration">2:30 دقيقة</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Status Section -->
                <div class="help-section">
                    <h3><i class="fas fa-server"></i> حالة النظام</h3>
                    <div class="system-status">
                        <div class="status-item">
                            <div class="status-indicator online"></div>
                            <div class="status-info">
                                <h4>الموقع الرئيسي</h4>
                                <p>يعمل بشكل طبيعي</p>
                            </div>
                        </div>

                        <div class="status-item">
                            <div class="status-indicator online"></div>
                            <div class="status-info">
                                <h4>نظام البحث</h4>
                                <p>يعمل بشكل طبيعي</p>
                            </div>
                        </div>

                        <div class="status-item">
                            <div class="status-indicator online"></div>
                            <div class="status-info">
                                <h4>نظام التقديم</h4>
                                <p>يعمل بشكل طبيعي</p>
                            </div>
                        </div>

                        <div class="status-item">
                            <div class="status-indicator online"></div>
                            <div class="status-info">
                                <h4>نظام الإشعارات</h4>
                                <p>يعمل بشكل طبيعي</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function searchHelp() {
    const searchTerm = document.getElementById('helpSearch').value.toLowerCase();
    const helpSections = document.querySelectorAll('.help-section');
    
    helpSections.forEach(section => {
        const content = section.textContent.toLowerCase();
        if (content.includes(searchTerm)) {
            section.style.display = 'block';
        } else {
            section.style.display = 'none';
        }
    });
}

function openLiveChat() {
    // Open live chat widget
    if (typeof LiveChatWidget !== 'undefined') {
        LiveChatWidget.open();
    } else {
        // Fallback to contact form
        document.getElementById('supportTicketForm').scrollIntoView({ behavior: 'smooth' });
        showNotification('سيتم فتح الدردشة المباشرة قريباً', 'info');
    }
}

function submitTicket() {
    const form = document.getElementById('supportTicketForm');
    const formData = new FormData(form);
    
    // Show loading state
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري الإرسال...';
    submitBtn.disabled = true;
    
    fetch('{{ route("help.submit-ticket") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('تم إرسال تذكرتك بنجاح. سنرد عليك قريباً.', 'success');
            form.reset();
        } else {
            showNotification('حدث خطأ أثناء إرسال التذكرة. حاول مرة أخرى.', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('حدث خطأ أثناء إرسال التذكرة. حاول مرة أخرى.', 'error');
    })
    .finally(() => {
        // Reset button state
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
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

// Video tutorial click handlers
document.addEventListener('DOMContentLoaded', function() {
    const videoItems = document.querySelectorAll('.video-item');
    
    videoItems.forEach(item => {
        item.addEventListener('click', () => {
            const videoTitle = item.querySelector('h4').textContent;
            showNotification(`سيتم تشغيل الفيديو: ${videoTitle}`, 'info');
            // Here you would typically open a video modal or redirect to video page
        });
    });
});
</script>
@endpush 