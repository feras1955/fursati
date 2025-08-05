@extends('layouts.app')

@section('title', 'الإعدادات - فرصتي')

@section('content')
<section id="settings" class="page-container active" style="padding:0;">
    <div class="container">
        <div class="page-header">
            <h2 class="page-title">الإعدادات</h2>
        </div>
        <div class="settings-container">
            <div class="settings-sidebar">
                <ul class="settings-menu">
                    <li><a href="#" class="menu-link active" data-section="profile-section"><i class="fas fa-user"></i> الملف الشخصي</a></li>
                    <li><a href="#" class="menu-link" data-section="notifications-section"><i class="fas fa-bell"></i> إعدادات الإشعارات</a></li>
                    <li><a href="#" class="menu-link" data-section="language-section"><i class="fas fa-globe"></i> إعدادات اللغة</a></li>
                    <li><a href="#" class="menu-link" data-section="faq-section"><i class="fas fa-question-circle"></i> الأسئلة الشائعة</a></li>
                    <li><a href="#" class="menu-link" data-section="help-section"><i class="fas fa-headset"></i> المساعدة والدعم</a></li>
                    <li><a href="#" class="menu-link" data-section="privacy-section"><i class="fas fa-shield-alt"></i> الخصوصية والأمان</a></li>
                </ul>
            </div>
            <div class="settings-content">
                <!-- قسم الملف الشخصي -->
                <div id="profile-section" class="settings-section active" style="display: block;">
                    <div class="profile-header">
                        <div class="profile-avatar">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <div class="profile-info">
                            <h3 class="section-title">الملف الشخصي</h3>
                            <p class="profile-subtitle">قم بتحديث معلوماتك الشخصية</p>
                        </div>
                    </div>
                    
                    <form id="profile-form" class="settings-form profile-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label><i class="fas fa-user"></i> الاسم الكامل</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name ?? '' }}" required placeholder="أدخل اسمك الكامل">
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-envelope"></i> البريد الإلكتروني</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email ?? '' }}" required placeholder="example@email.com">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label><i class="fas fa-phone"></i> رقم الهاتف</label>
                                <input type="tel" name="phone" class="form-control" value="{{ $user->phone ?? '' }}" placeholder="+966 50 123 4567">
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-map-marker-alt"></i> الموقع</label>
                                <input type="text" name="location" class="form-control" value="{{ $user->location ?? '' }}" placeholder="الرياض، السعودية">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label><i class="fas fa-edit"></i> نبذة شخصية</label>
                            <textarea name="bio" class="form-control" rows="4" placeholder="اكتب نبذة مختصرة عن خبراتك ومهاراتك...">{{ $user->bio ?? '' }}</textarea>
                            <small class="form-text">هذه النبذة ستظهر لأصحاب العمل عند تقديمك للوظائف</small>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn btn-primary btn-save" onclick="updateProfileSettings()">
                                <i class="fas fa-save"></i> حفظ التغييرات
                            </button>
                            <button type="button" class="btn btn-secondary" onclick="resetForm()">
                                <i class="fas fa-undo"></i> إعادة تعيين
                            </button>
                        </div>
                    </form>
                </div>

                <!-- قسم إعدادات الإشعارات -->
                <div id="notifications-section" class="settings-section">
                    <h3 class="section-title">إعدادات الإشعارات</h3>
                    <form id="notifications-form" class="settings-form">
                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="email_jobs" {{ (json_decode($user->notification_settings ?? '{}')->email_jobs ?? true) ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                                إشعارات الوظائف الجديدة عبر البريد الإلكتروني
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="email_applications" {{ (json_decode($user->notification_settings ?? '{}')->email_applications ?? true) ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                                إشعارات حالة التطبيقات عبر البريد الإلكتروني
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="sms_jobs" {{ (json_decode($user->notification_settings ?? '{}')->sms_jobs ?? false) ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                                إشعارات SMS للوظائف المهمة
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="push_notifications" {{ (json_decode($user->notification_settings ?? '{}')->push_notifications ?? true) ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                                الإشعارات المنبثقة في المتصفح
                            </label>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="updateNotificationSettings()">
                            <i class="fas fa-save"></i> حفظ الإعدادات
                        </button>
                    </form>
                </div>

                <!-- قسم إعدادات اللغة -->
                <div id="language-section" class="settings-section">
                    <h3 class="section-title">إعدادات اللغة</h3>
                    <form id="language-form" class="settings-form">
                        <div class="form-group">
                            <label>اللغة المفضلة</label>
                            <select name="language" class="form-control">
                                <option value="ar" {{ ($user->preferred_language ?? 'ar') == 'ar' ? 'selected' : '' }}>العربية</option>
                                <option value="en" {{ ($user->preferred_language ?? 'ar') == 'en' ? 'selected' : '' }}>English</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>اتجاه النص</label>
                            <select class="form-control">
                                <option value="rtl">من اليمين إلى اليسار (العربية)</option>
                                <option value="ltr">من اليسار إلى اليمين (الإنجليزية)</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="updateLanguageSettings()">
                            <i class="fas fa-save"></i> حفظ إعدادات اللغة
                        </button>
                    </form>
                </div>

                <!-- قسم الأسئلة الشائعة -->
                <div id="faq-section" class="settings-section">
                    <h3 class="section-title">الأسئلة الشائعة</h3>
                    <div class="faq-container">
                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFAQ(this)">
                                <h4>كيف يمكنني البحث عن وظيفة؟</h4>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>يمكنك البحث عن الوظائف من خلال الصفحة الرئيسية باستخدام الكلمات المفتاحية، أو تصفح الوظائف حسب المجال والموقع.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFAQ(this)">
                                <h4>كيف أحفظ الوظائف المفضلة؟</h4>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>اضغط على أيقونة الحفظ (🔖) بجانب أي وظيفة لإضافتها إلى قائمة الوظائف المحفوظة.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFAQ(this)">
                                <h4>كيف أتقدم لوظيفة؟</h4>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>اضغط على "تقديم الآن" في صفحة الوظيفة، ثم املأ النموذج وارفق سيرتك الذاتية.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFAQ(this)">
                                <h4>كيف أغير كلمة المرور؟</h4>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>اذهب إلى قسم "الخصوصية والأمان" في الإعدادات وستجد خيار تغيير كلمة المرور.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- قسم المساعدة والدعم -->
                <div id="help-section" class="settings-section">
                    <h3 class="section-title">المساعدة والدعم</h3>
                    <div class="help-container">
                        <div class="help-card">
                            <i class="fas fa-envelope"></i>
                            <h4>تواصل معنا</h4>
                            <p>support@fursati.com</p>
                            <a href="mailto:support@fursati.com" class="btn btn-outline-primary">إرسال رسالة</a>
                        </div>
                        <div class="help-card">
                            <i class="fas fa-phone"></i>
                            <h4>الدعم الهاتفي</h4>
                            <p>+966 11 123 4567</p>
                            <p class="text-muted">الأحد - الخميس: 9 صباحاً - 6 مساءً</p>
                        </div>
                        <div class="help-card">
                            <i class="fas fa-comments"></i>
                            <h4>الدردشة المباشرة</h4>
                            <p>متاح 24/7</p>
                            <button class="btn btn-primary" onclick="openLiveChat()">بدء الدردشة</button>
                        </div>
                        <div class="help-card">
                            <i class="fas fa-book"></i>
                            <h4>دليل المستخدم</h4>
                            <p>تعلم كيفية استخدام الموقع</p>
                            <a href="#" class="btn btn-outline-primary">تحميل الدليل</a>
                        </div>
                    </div>
                </div>

                <!-- قسم الخصوصية والأمان -->
                <div id="privacy-section" class="settings-section">
                    <h3 class="section-title">الخصوصية والأمان</h3>
                    
                    <!-- إعدادات الخصوصية -->
                    <div class="privacy-subsection">
                        <h4>إعدادات الخصوصية</h4>
                        <form id="privacy-form" class="settings-form">
                            <div class="form-group">
                                <label>رؤية الملف الشخصي</label>
                                <select name="profile_visibility" class="form-control">
                                    <option value="public" {{ (json_decode($user->privacy_settings ?? '{}')->profile_visibility ?? 'public') == 'public' ? 'selected' : '' }}>عام - يمكن لأي شخص رؤيته</option>
                                    <option value="private" {{ (json_decode($user->privacy_settings ?? '{}')->profile_visibility ?? 'public') == 'private' ? 'selected' : '' }}>خاص - أصحاب العمل المسجلين فقط</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="show_email" {{ (json_decode($user->privacy_settings ?? '{}')->show_email ?? false) ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                    إظهار البريد الإلكتروني في الملف الشخصي
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="show_phone" {{ (json_decode($user->privacy_settings ?? '{}')->show_phone ?? false) ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                    إظهار رقم الهاتف في الملف الشخصي
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="allow_messages" {{ (json_decode($user->privacy_settings ?? '{}')->allow_messages ?? true) ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                    السماح بالرسائل من أصحاب العمل
                                </label>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="updatePrivacySettings()">
                                <i class="fas fa-save"></i> حفظ إعدادات الخصوصية
                            </button>
                        </form>
                    </div>

                    <!-- تغيير كلمة المرور -->
                    <div class="privacy-subsection">
                        <h4>تغيير كلمة المرور</h4>
                        <form id="security-form" class="settings-form">
                            <div class="form-group">
                                <label>كلمة المرور الحالية</label>
                                <input type="password" name="current_password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>كلمة المرور الجديدة</label>
                                <input type="password" name="new_password" class="form-control" required minlength="8">
                            </div>
                            <div class="form-group">
                                <label>تأكيد كلمة المرور الجديدة</label>
                                <input type="password" name="new_password_confirmation" class="form-control" required>
                            </div>
                            <button type="button" class="btn btn-primary btn-change-password" onclick="updateSecuritySettings()">
                                <i class="fas fa-key"></i> تغيير كلمة المرور
                            </button>
                        </form>
                    </div>

                    <!-- إجراءات الحساب -->
                    <div class="privacy-subsection">
                        <h4>إجراءات الحساب</h4>
                        <div class="account-actions">
                            <div class="action-card">
                                <div class="action-icon">
                                    <i class="fas fa-download"></i>
                                </div>
                                <div class="action-content">
                                    <h5>تصدير بياناتي</h5>
                                    <p>احصل على نسخة من جميع بياناتك</p>
                                </div>
                                <button class="btn btn-outline-info" onclick="exportData()">
                                    <i class="fas fa-download"></i> تصدير
                                </button>
                            </div>
                            
                            <div class="action-card">
                                <div class="action-icon">
                                    <i class="fas fa-sign-out-alt"></i>
                                </div>
                                <div class="action-content">
                                    <h5>تسجيل الخروج من جميع الأجهزة</h5>
                                    <p>إنهاء جميع جلسات تسجيل الدخول النشطة</p>
                                </div>
                                <button class="btn btn-outline-warning" onclick="logoutAllDevices()">
                                    <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
                                </button>
                            </div>
                            
                            <div class="action-card danger">
                                <div class="action-icon">
                                    <i class="fas fa-trash-alt"></i>
                                </div>
                                <div class="action-content">
                                    <h5>حذف الحساب نهائياً</h5>
                                    <p>حذف حسابك وجميع بياناتك نهائياً</p>
                                </div>
                                <button class="btn btn-outline-danger" onclick="deleteAccount()">
                                    <i class="fas fa-trash-alt"></i> حذف الحساب
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- قسم إعدادات اللغة -->
                <div id="language-section" class="settings-section">
                    <h3 class="section-title">إعدادات اللغة</h3>
                    <form id="language-form" class="settings-form">
                        <div class="form-group">
                            <label><i class="fas fa-globe"></i> اللغة الافتراضية</label>
                            <select name="language" class="form-control">
                                <option value="ar" selected>العربية</option>
                                <option value="en">English</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label><i class="fas fa-map-marker-alt"></i> المنطقة الزمنية</label>
                            <select name="timezone" class="form-control">
                                <option value="Asia/Riyadh" selected>توقيت الرياض (GMT+3)</option>
                                <option value="Asia/Dubai">توقيت دبي (GMT+4)</option>
                                <option value="Asia/Kuwait">توقيت الكويت (GMT+3)</option>
                                <option value="Africa/Cairo">توقيت القاهرة (GMT+2)</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label><i class="fas fa-calendar"></i> تنسيق التاريخ</label>
                            <select name="date_format" class="form-control">
                                <option value="d/m/Y" selected>يوم/شهر/سنة</option>
                                <option value="m/d/Y">شهر/يوم/سنة</option>
                                <option value="Y-m-d">سنة-شهر-يوم</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label><i class="fas fa-money-bill"></i> العملة</label>
                            <select name="currency" class="form-control">
                                <option value="SAR" selected>ريال سعودي (ر.س)</option>
                                <option value="AED">درهم إماراتي (د.إ)</option>
                                <option value="KWD">دينار كويتي (د.ك)</option>
                                <option value="USD">دولار أمريكي ($)</option>
                            </select>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary btn-save">
                                <i class="fas fa-save"></i> حفظ التغييرات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// كود محسن للقائمة الجانبية والنماذج في صفحة الإعدادات
document.addEventListener('DOMContentLoaded', function() {
    // تحديد العناصر المهمة
    const menuLinks = document.querySelectorAll('.settings-menu .menu-link');
    const settingsSections = document.querySelectorAll('.settings-section');
    
    // وظيفة لإظهار قسم معين وإخفاء الآخرين
    function showSection(sectionId) {
        // إخفاء جميع الأقسام أولاً
        settingsSections.forEach(section => {
            section.style.display = 'none';
            section.classList.remove('active');
        });
        
        // إظهار القسم المطلوب
        const targetSection = document.getElementById(sectionId);
        if (targetSection) {
            targetSection.style.display = 'block';
            targetSection.classList.add('active');
        }
        
        // تحديث حالة الروابط النشطة
        menuLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('data-section') === sectionId) {
                link.classList.add('active');
            }
        });
    }
    
    // إضافة مستمعات الأحداث للروابط
    menuLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const sectionId = this.getAttribute('data-section');
            if (sectionId) {
                showSection(sectionId);
            }
        });
    });
    
    // عرض القسم الأول افتراضياً
    showSection('profile-section');
});

// دالة عرض الإشعارات
function showNotification(message, type = 'success') {
    // إزالة أي إشعارات سابقة
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notif => notif.remove());
    
    // إنشاء عنصر الإشعار
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle'}"></i>
            <span>${message}</span>
        </div>
        <button class="notification-close" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    document.body.appendChild(notification);
    
    // إزالة الإشعار تلقائياً بعد 5 ثواني
    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 5000);
}

// دالة إعادة تعيين النموذج
function resetForm() {
    const form = document.getElementById('profile-form');
    if (form) {
        form.reset();
        showNotification('تم إعادة تعيين النموذج', 'info');
    }
}

// تحديث إعدادات الملف الشخصي
function updateProfileSettings() {
    const form = document.getElementById('profile-form');
    const formData = new FormData(form);
    const submitBtn = form.querySelector('.btn-save');

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري الحفظ...';

    fetch('{{ route("settings.profile.update") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-save"></i> حفظ التغييرات';
        
        if (data.success) {
            showNotification('تم تحديث الملف الشخصي بنجاح', 'success');
        } else {
            showNotification(data.message || 'حدث خطأ أثناء الحفظ', 'error');
        }
    })
    .catch(error => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-save"></i> حفظ التغييرات';
        showNotification('حدث خطأ في الاتصال بالخادم', 'error');
        console.error('Error:', error);
    });
}

// تحديث إعدادات الإشعارات
function updateNotificationSettings() {
    const form = document.getElementById('notifications-form');
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="button"]');

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري الحفظ...';

    fetch('{{ route("settings.notifications.update") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-save"></i> حفظ الإعدادات';
        
        if (data.success) {
            showNotification('تم تحديث إعدادات الإشعارات بنجاح', 'success');
        } else {
            showNotification(data.message || 'حدث خطأ أثناء الحفظ', 'error');
        }
    })
    .catch(error => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-save"></i> حفظ الإعدادات';
        showNotification('حدث خطأ في الاتصال بالخادم', 'error');
        console.error('Error:', error);
    });
}

// تحديث إعدادات اللغة
function updateLanguageSettings() {
    const form = document.getElementById('language-form');
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="button"]');

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري الحفظ...';

    fetch('{{ route("settings.language.update") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-save"></i> حفظ الإعدادات';
        
        if (data.success) {
            showNotification('تم تحديث إعدادات اللغة بنجاح', 'success');
            setTimeout(() => location.reload(), 1000);
        } else {
            showNotification(data.message || 'حدث خطأ أثناء الحفظ', 'error');
        }
    })
    .catch(error => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-save"></i> حفظ الإعدادات';
        showNotification('حدث خطأ في الاتصال بالخادم', 'error');
        console.error('Error:', error);
    });
}

// تحديث إعدادات الأمان (تغيير كلمة المرور)
function updateSecuritySettings() {
    const form = document.getElementById('security-form');
    const formData = new FormData(form);
    const submitBtn = form.querySelector('.btn-change-password');

    // التحقق من كلمة المرور
    const newPassword = form.querySelector('input[name="new_password"]').value;
    const confirmPassword = form.querySelector('input[name="new_password_confirmation"]').value;

    if (newPassword !== confirmPassword) {
        showNotification('كلمة المرور الجديدة وتأكيدها غير متطابقين', 'error');
        return;
    }

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري التغيير...';

    fetch('{{ route("settings.security.update") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-key"></i> تغيير كلمة المرور';
        
        if (data.success) {
            showNotification('تم تغيير كلمة المرور بنجاح', 'success');
            form.reset();
        } else {
            showNotification(data.message || 'حدث خطأ أثناء تغيير كلمة المرور', 'error');
        }
    })
    .catch(error => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-key"></i> تغيير كلمة المرور';
        showNotification('حدث خطأ في الاتصال بالخادم', 'error');
        console.error('Error:', error);
    });
}

// إعداد وتفعيل النماذج
function setupFormHandlers() {
    console.log('🔧 جاري إعداد معالجات النماذج...');
    
    // نموذج الملف الشخصي
    const profileForm = document.getElementById('profile-form');
    console.log('📄 نموذج الملف الشخصي:', profileForm);
    if (profileForm) {
        profileForm.addEventListener('submit', function(e) {
            console.log('✅ تم الضغط على حفظ الملف الشخصي');
            e.preventDefault();
            updateProfileSettings();
        });
        console.log('✅ تم ربط نموذج الملف الشخصي');
    } else {
        console.log('❌ لم يتم العثور على نموذج الملف الشخصي');
    }
    
    // نموذج إعدادات الإشعارات
    const notificationsForm = document.getElementById('notifications-form');
    console.log('🔔 نموذج الإشعارات:', notificationsForm);
    if (notificationsForm) {
        notificationsForm.addEventListener('submit', function(e) {
            console.log('✅ تم الضغط على حفظ الإشعارات');
            e.preventDefault();
            updateNotificationSettings();
        });
        console.log('✅ تم ربط نموذج الإشعارات');
    } else {
        console.log('❌ لم يتم العثور على نموذج الإشعارات');
    }
    
    // نموذج الخصوصية
    const privacyForm = document.getElementById('privacy-form');
    console.log('🔒 نموذج الخصوصية:', privacyForm);
    if (privacyForm) {
        privacyForm.addEventListener('submit', function(e) {
            console.log('✅ تم الضغط على حفظ الخصوصية');
            e.preventDefault();
            updatePrivacySettings();
        });
        console.log('✅ تم ربط نموذج الخصوصية');
    } else {
        console.log('❌ لم يتم العثور على نموذج الخصوصية');
    }
    
    // نموذج الأمان (تغيير كلمة المرور)
    const securityForm = document.getElementById('security-form');
    console.log('🔑 نموذج الأمان:', securityForm);
    if (securityForm) {
        securityForm.addEventListener('submit', function(e) {
            console.log('✅ تم الضغط على تغيير كلمة المرور');
            e.preventDefault();
            updateSecuritySettings();
        });
        console.log('✅ تم ربط نموذج الأمان');
    } else {
        console.log('❌ لم يتم العثور على نموذج الأمان');
    }
    
    // نموذج اللغة
    const languageForm = document.getElementById('language-form');
    console.log('🌍 نموذج اللغة:', languageForm);
    if (languageForm) {
        languageForm.addEventListener('submit', function(e) {
            console.log('✅ تم الضغط على حفظ اللغة');
            e.preventDefault();
            updateLanguageSettings();
        });
        console.log('✅ تم ربط نموذج اللغة');
    } else {
        console.log('❌ لم يتم العثور على نموذج اللغة');
    }
    
    console.log('✅ تم انتهاء إعداد معالجات النماذج');
}

// دالة بسيطة جداً لعرض الأقسام (للتوافق مع الكود القديم)
function showSettingsSection(sectionId, clickedElement) {
    // إخفاء جميع الأقسام
    var allSections = document.getElementsByClassName('settings-section');
    for (var i = 0; i < allSections.length; i++) {
        allSections[i].style.display = 'none';
    }
    
    // إزالة active من جميع الروابط
    var allLinks = document.getElementsByClassName('menu-link');
    for (var i = 0; i < allLinks.length; i++) {
        allLinks[i].classList.remove('active');
    }
    
    // عرض القسم المطلوب
    var targetSection = document.getElementById(sectionId + '-section');
    if (targetSection) {
        targetSection.style.display = 'block';
        clickedElement.classList.add('active');
        console.log('✅ تم عرض قسم: ' + sectionId);
    } else {
        console.log('❌ قسم غير موجود: ' + sectionId + '-section');
    }
}

// عرض القسم الأول عند تحميل الصفحة
window.addEventListener('load', function() {
    // إخفاء جميع الأقسام
    var allSections = document.getElementsByClassName('settings-section');
    for (var i = 0; i < allSections.length; i++) {
        allSections[i].style.display = 'none';
    }
    
    // عرض قسم الملف الشخصي
    var profileSection = document.getElementById('profile-section');
    if (profileSection) {
        profileSection.style.display = 'block';
        console.log('✅ تم عرض قسم الملف الشخصي');
    }
});
</script>

@endsection

@push('styles')
<style>
.settings-container {
    display: flex;
    gap: 2rem;
    margin-top: 2rem;
}

.settings-sidebar {
    min-width: 250px;
    background: white;
    border-radius: 10px;
    padding: 1.5rem;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    height: fit-content;
}

.settings-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.settings-menu li {
    margin-bottom: 0.5rem;
}

.settings-menu a {
    display: flex;
    align-items: center;
    padding: 0.75rem 1rem;
    color: #666;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.settings-menu a:hover {
    background-color: #f8f9fa;
    color: #007bff;
}

.settings-menu a.active {
    background-color: #007bff;
    color: white;
}

.settings-menu i {
    margin-left: 0.5rem;
    width: 20px;
}

.settings-content {
    flex: 1;
    background: white;
    border-radius: 10px;
    padding: 2rem;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.settings-section {
    display: none;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
    animation: fadeIn 0.3s ease-in-out;
    padding: 2rem;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    margin-bottom: 2rem;
}

.settings-section.active {
    display: block !important;
    opacity: 1;
}

.section-title {
    color: #333;
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #007bff;
}

.settings-form .form-group {
    margin-bottom: 1.5rem;
}

.settings-form label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #333;
}

.settings-form .form-control {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.settings-form .form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    outline: none;
}

/* Profile Section Styles */
.profile-header {
    display: flex;
    align-items: center;
    margin-bottom: 2rem;
    padding: 1.5rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 12px;
    color: white;
}

.profile-avatar {
    margin-left: 1rem;
}

.profile-avatar i {
    font-size: 4rem;
    color: rgba(255, 255, 255, 0.9);
}

.profile-info h3 {
    margin: 0;
    color: white;
    border: none;
    padding: 0;
}

.profile-subtitle {
    margin: 0.5rem 0 0 0;
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.9rem;
}

.profile-form {
    background: #f8f9fa;
    padding: 2rem;
    border-radius: 12px;
    border: 1px solid #e9ecef;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

.profile-form .form-group {
    margin-bottom: 1.5rem;
}

.profile-form label {
    display: flex;
    align-items: center;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #495057;
}

.profile-form label i {
    margin-left: 0.5rem;
    color: #007bff;
    width: 16px;
}

.form-text {
    font-size: 0.875rem;
    color: #6c757d;
    margin-top: 0.25rem;
}

.form-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    align-items: center;
    margin-top: 2rem;
    padding-top: 1.5rem;
    border-top: 1px solid #dee2e6;
    text-align: center;
}

.btn-save {
    background: linear-gradient(135deg, #28a745, #20c997);
    border: none;
    padding: 1rem 2rem;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(40, 167, 69, 0.2);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    min-width: 160px;
    justify-content: center;
}

.btn-save:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(40, 167, 69, 0.4);
    background: linear-gradient(135deg, #218838, #1cc88a);
}

.btn-save:active {
    transform: translateY(-1px);
    box-shadow: 0 3px 10px rgba(40, 167, 69, 0.3);
}

.btn-secondary {
    background: linear-gradient(135deg, #6c757d, #5a6268);
    border: none;
    padding: 1rem 2rem;
    border-radius: 12px;
    color: white;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(108, 117, 125, 0.2);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    min-width: 160px;
    justify-content: center;
}

.btn-secondary:hover {
    background: linear-gradient(135deg, #5a6268, #495057);
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(108, 117, 125, 0.4);
}

.btn-secondary:active {
    transform: translateY(-1px);
    box-shadow: 0 3px 10px rgba(108, 117, 125, 0.3);
}

@media (max-width: 768px) {
    .form-row {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .profile-header {
        flex-direction: column;
        text-align: center;
    }
    
    .profile-avatar {
        margin-left: 0;
        margin-bottom: 1rem;
    }
    
    .form-actions {
        flex-direction: column;
    }
}

.checkbox-label {
    display: flex !important;
    align-items: center;
    cursor: pointer;
    font-weight: normal !important;
}

.checkbox-label input[type="checkbox"] {
    margin-left: 0.5rem;
    margin-bottom: 0;
}

.faq-container {
    max-width: 800px;
}

.faq-item {
    border: 1px solid #e9ecef;
    border-radius: 8px;
    margin-bottom: 1rem;
    overflow: hidden;
}

.faq-question {
    padding: 1rem;
    background-color: #f8f9fa;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: background-color 0.3s ease;
}

.faq-question:hover {
    background-color: #e9ecef;
}

.faq-question h4 {
    margin: 0;
    color: #333;
}

.faq-question i {
    transition: transform 0.3s ease;
}

.faq-answer {
    padding: 0 1rem;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease, padding 0.3s ease;
}

.faq-item.active .faq-answer {
    padding: 1rem;
}

.help-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-top: 1rem;
}

.help-card {
    text-align: center;
    padding: 2rem;
    border: 1px solid #e9ecef;
    border-radius: 10px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.help-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.help-card i {
    font-size: 2.5rem;
    color: #007bff;
    margin-bottom: 1rem;
}

.help-card h4 {
    color: #333;
    margin-bottom: 0.5rem;
}

.privacy-subsection {
    margin-bottom: 3rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid #e9ecef;
}

.privacy-subsection:last-child {
    border-bottom: none;
}

.privacy-subsection h4 {
    color: #333;
    margin-bottom: 1rem;
}

.account-actions {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    margin-top: 1.5rem;
}

.action-card {
    display: flex;
    align-items: center;
    padding: 1.5rem;
    background: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 12px;
    transition: all 0.3s ease;
    gap: 1rem;
}

.action-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.action-card.danger {
    background: #fff5f5;
    border-color: #fed7d7;
}

.action-card.danger:hover {
    background: #fed7d7;
}

.action-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: #e9ecef;
    color: #6c757d;
    font-size: 1.2rem;
    flex-shrink: 0;
}

.action-card .action-icon {
    background: #007bff;
    color: white;
}

.action-card:nth-child(2) .action-icon {
    background: #ffc107;
    color: white;
}

.action-card.danger .action-icon {
    background: #dc3545;
    color: white;
}

.action-content {
    flex: 1;
}

.action-content h5 {
    margin: 0 0 0.5rem 0;
    color: #333;
    font-size: 1.1rem;
    font-weight: 600;
}

.action-content p {
    margin: 0;
    color: #6c757d;
    font-size: 0.9rem;
    line-height: 1.4;
}

.action-card .btn {
    flex-shrink: 0;
    min-width: 120px;
    font-weight: 500;
    border-width: 2px;
    transition: all 0.3s ease;
}

.action-card .btn:hover {
    transform: scale(1.05);
}

/* تصميم خاص لزر تغيير كلمة المرور */
.btn-change-password {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    border: none;
    padding: 12px 24px;
    font-weight: 600;
    font-size: 1rem;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
    transition: all 0.3s ease;
}

.btn-change-password:hover {
    background: linear-gradient(135deg, #0056b3 0%, #004085 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 123, 255, 0.4);
}

.btn-change-password:active {
    transform: translateY(0);
    box-shadow: 0 2px 10px rgba(0, 123, 255, 0.3);
}

/* Notification Styles */
.notification {
    position: fixed;
    top: 20px;
    right: 20px;
    min-width: 300px;
    max-width: 500px;
    padding: 1rem 1.5rem;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    z-index: 1000;
    animation: slideInRight 0.3s ease-out;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-weight: 500;
}

.notification-success {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    border-left: 4px solid #1e7e34;
}

.notification-error {
    background: linear-gradient(135deg, #dc3545, #e74c3c);
    color: white;
    border-left: 4px solid #c82333;
}

.notification-info {
    background: linear-gradient(135deg, #17a2b8, #007bff);
    color: white;
    border-left: 4px solid #138496;
}

.notification-content {
    display: flex;
    align-items: center;
    flex: 1;
}

.notification-content i {
    margin-left: 0.75rem;
    font-size: 1.2rem;
}

.notification-close {
    background: none;
    border: none;
    color: rgba(255, 255, 255, 0.8);
    cursor: pointer;
    padding: 0.25rem;
    border-radius: 4px;
    transition: background-color 0.2s ease;
}

.notification-close:hover {
    background-color: rgba(255, 255, 255, 0.2);
    color: white;
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.notification {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 1rem 1.5rem;
    border-radius: 5px;
    color: white;
    font-weight: 600;
    z-index: 1000;
    animation: slideIn 0.3s ease;
}

.notification-success {
    background-color: #28a745;
}

.notification-error {
    background-color: #dc3545;
}

.notification-info {
    background-color: #17a2b8;
}

@keyframes slideIn {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@media (max-width: 768px) {
    .settings-container {
        flex-direction: column;
    }
    
    .settings-sidebar {
        min-width: unset;
    }
    
    .account-actions {
        flex-direction: column;
    }
    
    .account-actions button {
        min-width: unset;
    }
}
</style>
@endpush

@push('scripts')
<script>
// كود بسيط وفعال للشريط الجانبي
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 تحميل صفحة الإعدادات...');
    
    // إخفاء جميع الأقسام أولاً
    const allSections = document.querySelectorAll('.settings-section');
    allSections.forEach(section => {
        section.style.display = 'none';
        section.classList.remove('active');
    });
    
    // عرض القسم الأول (الملف الشخصي)
    const firstSection = document.getElementById('profile-section');
    if (firstSection) {
        firstSection.style.display = 'block';
        firstSection.classList.add('active');
    }
    
    // إضافة مستمعات الأحداث لروابط القائمة
    const menuLinks = document.querySelectorAll('.menu-link');
    console.log('📋 عدد الروابط الموجودة:', menuLinks.length);
    
    menuLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const sectionId = this.getAttribute('data-section');
            console.log('👆 تم النقر على:', sectionId);
            
            // إخفاء جميع الأقسام
            allSections.forEach(section => {
                section.style.display = 'none';
                section.classList.remove('active');
            });
            
            // إزالة الفئة النشطة من جميع الروابط
            menuLinks.forEach(menuLink => {
                menuLink.classList.remove('active');
            });
            
            // عرض القسم المطلوب
            const targetSection = document.getElementById(sectionId + '-section');
            if (targetSection) {
                targetSection.style.display = 'block';
                targetSection.classList.add('active');
                this.classList.add('active');
                console.log('✅ تم عرض القسم:', sectionId);
            } else {
                console.error('❌ لم يتم العثور على القسم:', sectionId + '-section');
            }
        });
    });
    
    console.log('✅ تم إعداد الشريط الجانبي بنجاح!');
});

// دالة مساعدة لعرض الأقسام (يمكن استخدامها من الخارج)
function showSection(sectionId) {
    const allSections = document.querySelectorAll('.settings-section');
    const allLinks = document.querySelectorAll('.menu-link');
    
    // إخفاء جميع الأقسام
    allSections.forEach(section => {
        section.style.display = 'none';
        section.classList.remove('active');
    });
    
    // إزالة الفئة النشطة من جميع الروابط
    allLinks.forEach(link => {
        link.classList.remove('active');
    });
    
    // عرض القسم المطلوب
    const targetSection = document.getElementById(sectionId + '-section');
    const targetLink = document.querySelector(`[data-section="${sectionId}"]`);
    
    if (targetSection) {
        targetSection.style.display = 'block';
        targetSection.classList.add('active');
    }
    
    if (targetLink) {
        targetLink.classList.add('active');
    }
}

// دوال مساعدة بسيطة
function resetForm() {
    const form = document.getElementById('profile-form');
    if (form) {
        form.reset();
        location.reload();
    }
}

// دالة عرض الإشعارات
function showNotification(message, type = 'success') {
    // إزالة الإشعارات السابقة
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notif => notif.remove());
    
    // إنشاء إشعار جديد
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
            <span>${message}</span>
        </div>
        <button class="notification-close" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    document.body.appendChild(notification);
    
    // إزالة الإشعار تلقائياً بعد 5 ثوان
    setTimeout(() => {
        if (notification.parentElement) {
            notification.remove();
        }
    }, 5000);
}

// تحديث إعدادات الملف الشخصي
function updateProfileSettings() {
    const form = document.getElementById('profile-form');
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="button"]');

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري الحفظ...';

    fetch('{{ route("settings.profile.update") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-save"></i> حفظ التغييرات';
        
        if (data.success) {
            showNotification('تم تحديث الملف الشخصي بنجاح', 'success');
        } else {
            showNotification(data.message || 'حدث خطأ أثناء الحفظ', 'error');
        }
    })
    .catch(error => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-save"></i> حفظ التغييرات';
        showNotification('حدث خطأ في الاتصال بالخادم', 'error');
        console.error('Error:', error);
    });
}

// تحديث إعدادات الإشعارات
function updateNotificationSettings() {
    const form = document.getElementById('notifications-form');
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="button"]');

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري الحفظ...';

    fetch('{{ route("settings.notifications.update") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-save"></i> حفظ الإعدادات';
        
        if (data.success) {
            showNotification('تم تحديث إعدادات الإشعارات بنجاح', 'success');
        } else {
            showNotification(data.message || 'حدث خطأ أثناء الحفظ', 'error');
        }
    })
    .catch(error => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-save"></i> حفظ الإعدادات';
        showNotification('حدث خطأ في الاتصال بالخادم', 'error');
        console.error('Error:', error);
    });
}

// تحديث إعدادات الخصوصية
function updatePrivacySettings() {
    const form = document.getElementById('privacy-form');
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="button"]');

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري الحفظ...';

    fetch('{{ route("settings.privacy.update") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-save"></i> حفظ إعدادات الخصوصية';
        
        if (data.success) {
            showNotification('تم تحديث إعدادات الخصوصية بنجاح', 'success');
        } else {
            showNotification(data.message || 'حدث خطأ أثناء الحفظ', 'error');
        }
    })
    .catch(error => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-save"></i> حفظ إعدادات الخصوصية';
        showNotification('حدث خطأ في الاتصال بالخادم', 'error');
        console.error('Error:', error);
    });
}

// تحديث إعدادات الأمان (تغيير كلمة المرور)
function updateSecuritySettings() {
    const form = document.getElementById('security-form');
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="button"]');

    // التحقق من كلمة المرور
    const newPassword = form.querySelector('input[name="new_password"]').value;
    const confirmPassword = form.querySelector('input[name="new_password_confirmation"]').value;

    if (newPassword !== confirmPassword) {
        showNotification('كلمة المرور الجديدة وتأكيدها غير متطابقين', 'error');
        return;
    }

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري التغيير...';

    fetch('{{ route("settings.security.update") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-key"></i> تغيير كلمة المرور';
        
        if (data.success) {
            showNotification('تم تغيير كلمة المرور بنجاح', 'success');
            form.reset();
        } else {
            showNotification(data.message || 'حدث خطأ أثناء تغيير كلمة المرور', 'error');
        }
    })
    .catch(error => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-key"></i> تغيير كلمة المرور';
        showNotification('حدث خطأ في الاتصال بالخادم', 'error');
        console.error('Error:', error);
    });
}

// تحديث إعدادات اللغة
function updateLanguageSettings() {
    const form = document.getElementById('language-form');
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="button"]');

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري الحفظ...';

    fetch('{{ route("settings.language.update") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-save"></i> حفظ إعدادات اللغة';
        
        if (data.success) {
            showNotification('تم تحديث إعدادات اللغة بنجاح', 'success');
            setTimeout(() => location.reload(), 1000); // إعادة تحميل الصفحة لتطبيق التغييرات
        } else {
            showNotification(data.message || 'حدث خطأ أثناء الحفظ', 'error');
        }
    })
    .catch(error => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-save"></i> حفظ إعدادات اللغة';
        showNotification('حدث خطأ في الاتصال بالخادم', 'error');
        console.error('Error:', error);
    });
}

function updateNotificationSettings() {
    // Send AJAX request to update notification settings
    const form = document.getElementById('notification-settings-form');
    const formData = new FormData(form);
    
    fetch('{{ route("settings.notifications.update") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('تم حفظ إعدادات الإشعارات بنجاح', 'success');
        } else {
            showNotification('حدث خطأ أثناء حفظ الإعدادات', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('حدث خطأ أثناء حفظ الإعدادات', 'error');
    });
}

function updatePrivacySettings() {
    // Send AJAX request to update privacy settings
    const form = document.getElementById('privacy-settings-form');
    const formData = new FormData(form);
    
    fetch('{{ route("settings.privacy.update") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('تم حفظ إعدادات الخصوصية بنجاح', 'success');
        } else {
            showNotification('حدث خطأ أثناء حفظ الإعدادات', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('حدث خطأ أثناء حفظ الإعدادات', 'error');
    });
}

function updateLanguageSettings() {
    // Send AJAX request to update language settings
    const form = document.getElementById('language-settings-form');
    const formData = new FormData(form);
    
    fetch('{{ route("settings.language.update") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('تم حفظ إعدادات اللغة بنجاح', 'success');
        } else {
            showNotification('حدث خطأ أثناء حفظ الإعدادات', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('حدث خطأ أثناء حفظ الإعدادات', 'error');
    });
}

function updateSecuritySettings() {
    // Send AJAX request to update security settings
    const form = document.getElementById('security-settings-form');
    const formData = new FormData(form);
    
    fetch('{{ route("settings.security.update") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('تم حفظ إعدادات الأمان بنجاح', 'success');
        } else {
            showNotification('حدث خطأ أثناء حفظ الإعدادات', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('حدث خطأ أثناء حفظ الإعدادات', 'error');
    });
}

function changeLanguage(language) {
    // Send AJAX request to change language
    fetch('{{ route("settings.change-language") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ language: language }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Reload page to apply language change
            window.location.reload();
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function exportData() {
    // Trigger data export
    fetch('{{ route("settings.export-data") }}', {
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
        a.download = 'my_data.json';
        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);
        showNotification('تم تصدير بياناتك بنجاح', 'success');
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('حدث خطأ أثناء تصدير البيانات', 'error');
    });
}

// عرض الإشعارات
function showNotification(message, type = 'info') {
    // إزالة الإشعارات السابقة
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notification => {
        notification.remove();
    });
    
    // إنشاء إشعار جديد
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle'}"></i>
            <span>${message}</span>
        </div>
        <button class="notification-close" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    // إضافة الإشعار إلى الصفحة
    document.body.appendChild(notification);
    
    // إزالة الإشعار تلقائياً بعد 5 ثوان
    setTimeout(() => {
        if (notification.parentElement) {
            notification.remove();
        }
    }, 5000);
}

// وظائف إضافية للأسئلة الشائعة
function toggleFAQ(element) {
    const answer = element.nextElementSibling;
    const icon = element.querySelector('.faq-icon');
    
    if (answer.style.display === 'block') {
        answer.style.display = 'none';
        icon.classList.remove('fa-minus');
        icon.classList.add('fa-plus');
    } else {
        answer.style.display = 'block';
        icon.classList.remove('fa-plus');
        icon.classList.add('fa-minus');
    }
}

// وظائف الحساب
function logoutAllDevices() {
    if (confirm('هل أنت متأكد من رغبتك في تسجيل الخروج من جميع الأجهزة؟')) {
        fetch('{{ route("settings.logout-all-devices") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('تم تسجيل الخروج من جميع الأجهزة', 'success');
                setTimeout(() => {
                    window.location.href = '/login';
                }, 2000);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('حدث خطأ أثناء تسجيل الخروج', 'error');
        });
    }
}

function deleteAccount() {
    const password = prompt('لحذف حسابك، يرجى إدخال كلمة المرور:');
    
    if (password && confirm('هل أنت متأكد من رغبتك في حذف حسابك نهائياً؟ هذه العملية لا يمكن التراجع عنها!')) {
        fetch('{{ route("settings.delete-account") }}', {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ password: password }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('تم حذف حسابك بنجاح', 'success');
                setTimeout(() => {
                    window.location.href = '/';
                }, 2000);
            } else {
                showNotification(data.message || 'حدث خطأ أثناء حذف الحساب', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('حدث خطأ أثناء حذف الحساب', 'error');
        });
    }
}

// وظائف إضافية للإعدادات
function updateLanguageSettings() {
    const form = document.getElementById('language-form');
    const formData = new FormData(form);
    
    fetch('{{ route("settings.language.update") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('تم حفظ إعدادات اللغة بنجاح', 'success');
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            showNotification('حدث خطأ أثناء حفظ الإعدادات', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('حدث خطأ أثناء حفظ الإعداتات', 'error');
    });
}
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('حدث خطأ أثناء تصدير البيانات', 'error');
    });
}

function deleteAccount() {
    if (confirm('هل أنت متأكد من حذف حسابك؟ هذا الإجراء لا يمكن التراجع عنه.')) {
        fetch('{{ route("settings.delete-account") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '{{ route("home") }}';
            } else {
                showNotification('حدث خطأ أثناء حذف الحساب', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('حدث خطأ أثناء حذف الحساب', 'error');
        });
    }
}

function logoutAllDevices() {
    if (confirm('هل تريد تسجيل الخروج من جميع الأجهزة؟')) {
        fetch('{{ route("settings.logout-all-devices") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('تم تسجيل الخروج من جميع الأجهزة بنجاح', 'success');
            } else {
                showNotification('حدث خطأ أثناء تسجيل الخروج', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('حدث خطأ أثناء تسجيل الخروج', 'error');
        });
    }
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
</script>
@endpush 