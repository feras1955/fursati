@extends('layouts.app')

@section('title', 'الإعدادات - فرصتي')

@section('content')
<!-- Settings Container -->
<div class="settings-container">
    <div class="container">
        <div class="page-header">
            <h2 class="page-title">الإعدادات</h2>
            <p class="page-subtitle">تخصيص إعدادات حسابك وتفضيلاتك</p>
        </div>

        <div class="settings-content">
            <div class="settings-sidebar">
                <nav class="settings-nav">
                    <ul>
                        <li class="active">
                            <a href="#profile-settings" onclick="showSettingsSection('profile-settings')">
                                <i class="fas fa-user"></i>
                                <span>إعدادات الملف الشخصي</span>
                            </a>
                        </li>
                        <li>
                            <a href="#notification-settings" onclick="showSettingsSection('notification-settings')">
                                <i class="fas fa-bell"></i>
                                <span>إعدادات الإشعارات</span>
                            </a>
                        </li>
                        <li>
                            <a href="#privacy-settings" onclick="showSettingsSection('privacy-settings')">
                                <i class="fas fa-shield-alt"></i>
                                <span>إعدادات الخصوصية</span>
                            </a>
                        </li>
                        <li>
                            <a href="#language-settings" onclick="showSettingsSection('language-settings')">
                                <i class="fas fa-language"></i>
                                <span>إعدادات اللغة</span>
                            </a>
                        </li>
                        <li>
                            <a href="#security-settings" onclick="showSettingsSection('security-settings')">
                                <i class="fas fa-lock"></i>
                                <span>إعدادات الأمان</span>
                            </a>
                        </li>
                        <li>
                            <a href="#account-settings" onclick="showSettingsSection('account-settings')">
                                <i class="fas fa-cog"></i>
                                <span>إعدادات الحساب</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="settings-main">
                <!-- Profile Settings Section -->
                <div id="profile-settings" class="settings-section active">
                    <h3>إعدادات الملف الشخصي</h3>
                    <form id="profile-settings-form" onsubmit="updateProfileSettings(); return false;">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label>الاسم الأول</label>
                                <input type="text" name="first_name" class="form-control" value="أحمد" required>
                            </div>
                            <div class="form-group">
                                <label>اسم العائلة</label>
                                <input type="text" name="last_name" class="form-control" value="محمد علي" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control" value="ahmed@example.com" required>
                        </div>

                        <div class="form-group">
                            <label>رقم الهاتف</label>
                            <input type="tel" name="phone" class="form-control" value="+966 50 123 4567">
                        </div>

                        <div class="form-group">
                            <label>المدينة</label>
                            <select name="city" class="form-control">
                                <option value="riyadh" selected>الرياض</option>
                                <option value="jeddah">جدة</option>
                                <option value="dammam">الدمام</option>
                                <option value="makkah">مكة المكرمة</option>
                                <option value="madinah">المدينة المنورة</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>المجال المهني</label>
                            <input type="text" name="profession" class="form-control" value="مطور ويب متقدم" required>
                        </div>

                        <div class="form-group">
                            <label>نبذة عني</label>
                            <textarea name="bio" class="form-control" rows="4" placeholder="اكتب نبذة مختصرة عنك وخبراتك">مطور ويب متقدم بخبرة 8 سنوات في تطوير التطبيقات والمواقع الإلكترونية. متخصص في Laravel و Vue.js مع خبرة في إدارة المشاريع التقنية.</textarea>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> حفظ التغييرات
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Notification Settings Section -->
                <div id="notification-settings" class="settings-section">
                    <h3>إعدادات الإشعارات</h3>
                    <form id="notification-settings-form" onsubmit="updateNotificationSettings(); return false;">
                        @csrf
                        <div class="notification-option">
                            <div class="option-info">
                                <h4>إشعارات الوظائف الجديدة</h4>
                                <p>استلام إشعارات عند نشر وظائف جديدة تناسب ملفك الشخصي</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" name="job_notifications" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="notification-option">
                            <div class="option-info">
                                <h4>إشعارات حالة التقديم</h4>
                                <p>استلام إشعارات عند تغيير حالة طلبات التقديم الخاصة بك</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" name="application_notifications" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="notification-option">
                            <div class="option-info">
                                <h4>إشعارات الرسائل</h4>
                                <p>استلام إشعارات عند وصول رسائل جديدة من الشركات</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" name="message_notifications" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="notification-option">
                            <div class="option-info">
                                <h4>إشعارات البريد الإلكتروني</h4>
                                <p>استلام إشعارات عبر البريد الإلكتروني</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" name="email_notifications">
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="notification-option">
                            <div class="option-info">
                                <h4>إشعارات SMS</h4>
                                <p>استلام إشعارات عبر الرسائل النصية</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" name="sms_notifications">
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> حفظ الإعدادات
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Privacy Settings Section -->
                <div id="privacy-settings" class="settings-section">
                    <h3>إعدادات الخصوصية</h3>
                    <form id="privacy-settings-form" onsubmit="updatePrivacySettings(); return false;">
                        @csrf
                        <div class="privacy-option">
                            <div class="option-info">
                                <h4>الملف الشخصي العام</h4>
                                <p>السماح للشركات بعرض ملفك الشخصي</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" name="public_profile" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="privacy-option">
                            <div class="option-info">
                                <h4>عرض معلومات الاتصال</h4>
                                <p>السماح للشركات برؤية معلومات الاتصال الخاصة بك</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" name="show_contact_info">
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="privacy-option">
                            <div class="option-info">
                                <h4>عرض السيرة الذاتية</h4>
                                <p>السماح للشركات بتحميل سيرتك الذاتية</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" name="show_cv" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="privacy-option">
                            <div class="option-info">
                                <h4>إحصائيات الملف الشخصي</h4>
                                <p>عرض إحصائيات ملفك الشخصي للشركات</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" name="show_profile_stats" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> حفظ الإعدادات
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Language Settings Section -->
                <div id="language-settings" class="settings-section">
                    <h3>إعدادات اللغة</h3>
                    <form id="language-settings-form" onsubmit="updateLanguageSettings(); return false;">
                        @csrf
                        <div class="form-group">
                            <label>لغة الواجهة</label>
                            <select name="interface_language" class="form-control" onchange="changeLanguage(this.value)">
                                <option value="ar" selected>العربية</option>
                                <option value="en">English</option>
                                <option value="fr">Français</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>اتجاه النص</label>
                            <select name="text_direction" class="form-control">
                                <option value="rtl" selected>من اليمين إلى اليسار (RTL)</option>
                                <option value="ltr">من اليسار إلى اليمين (LTR)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>التاريخ والوقت</label>
                            <select name="date_format" class="form-control">
                                <option value="dd/mm/yyyy" selected>يوم/شهر/سنة</option>
                                <option value="mm/dd/yyyy">شهر/يوم/سنة</option>
                                <option value="yyyy-mm-dd">سنة-شهر-يوم</option>
                            </select>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> حفظ الإعدادات
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Security Settings Section -->
                <div id="security-settings" class="settings-section">
                    <h3>إعدادات الأمان</h3>
                    <form id="security-settings-form" onsubmit="updateSecuritySettings(); return false;">
                        @csrf
                        <div class="form-group">
                            <label>كلمة المرور الحالية</label>
                            <input type="password" name="current_password" class="form-control" placeholder="أدخل كلمة المرور الحالية">
                        </div>

                        <div class="form-group">
                            <label>كلمة المرور الجديدة</label>
                            <input type="password" name="new_password" class="form-control" placeholder="أدخل كلمة المرور الجديدة">
                        </div>

                        <div class="form-group">
                            <label>تأكيد كلمة المرور الجديدة</label>
                            <input type="password" name="confirm_password" class="form-control" placeholder="أعد إدخال كلمة المرور الجديدة">
                        </div>

                        <div class="security-option">
                            <div class="option-info">
                                <h4>المصادقة الثنائية</h4>
                                <p>تفعيل المصادقة الثنائية لحماية إضافية لحسابك</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" name="two_factor_auth">
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="security-option">
                            <div class="option-info">
                                <h4>تسجيل الدخول من أجهزة جديدة</h4>
                                <p>طلب تأكيد عند تسجيل الدخول من جهاز جديد</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" name="login_notifications" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> حفظ الإعدادات
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Account Settings Section -->
                <div id="account-settings" class="settings-section">
                    <h3>إعدادات الحساب</h3>
                    <div class="account-actions">
                        <div class="action-item">
                            <div class="action-info">
                                <h4>تصدير البيانات</h4>
                                <p>تحميل جميع بياناتك الشخصية</p>
                            </div>
                            <button class="btn btn-outline" onclick="exportData()">
                                <i class="fas fa-download"></i> تصدير
                            </button>
                        </div>

                        <div class="action-item">
                            <div class="action-info">
                                <h4>حذف الحساب</h4>
                                <p>حذف حسابك نهائياً وجميع البيانات المرتبطة به</p>
                            </div>
                            <button class="btn btn-danger" onclick="deleteAccount()">
                                <i class="fas fa-trash"></i> حذف الحساب
                            </button>
                        </div>

                        <div class="action-item">
                            <div class="action-info">
                                <h4>تسجيل الخروج من جميع الأجهزة</h4>
                                <p>تسجيل الخروج من جميع الأجهزة المتصلة</p>
                            </div>
                            <button class="btn btn-outline" onclick="logoutAllDevices()">
                                <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
                            </button>
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
function showSettingsSection(sectionId) {
    // Hide all sections
    document.querySelectorAll('.settings-section').forEach(section => {
        section.classList.remove('active');
    });
    
    // Show selected section
    document.getElementById(sectionId).classList.add('active');
    
    // Update navigation active state
    document.querySelectorAll('.settings-nav li').forEach(li => {
        li.classList.remove('active');
    });
    
    // Add active class to clicked nav item
    event.target.closest('li').classList.add('active');
}

function updateProfileSettings() {
    // Send AJAX request to update profile settings
    const form = document.getElementById('profile-settings-form');
    const formData = new FormData(form);
    
    fetch('{{ route("settings.profile") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('تم حفظ إعدادات الملف الشخصي بنجاح', 'success');
        } else {
            showNotification('حدث خطأ أثناء حفظ الإعدادات', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('حدث خطأ أثناء حفظ الإعدادات', 'error');
    });
}

function updateNotificationSettings() {
    // Send AJAX request to update notification settings
    const form = document.getElementById('notification-settings-form');
    const formData = new FormData(form);
    
    fetch('{{ route("settings.notifications") }}', {
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
    
    fetch('{{ route("settings.privacy") }}', {
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
    
    fetch('{{ route("settings.language") }}', {
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
    
    fetch('{{ route("settings.security") }}', {
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
        a.download = 'my_data.zip';
        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);
        document.body.removeChild(a);
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
        fetch('{{ route("settings.logout-all") }}', {
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