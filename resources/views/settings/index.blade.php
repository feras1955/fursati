@extends('layouts.app')

@section('title', 'الإعدادات - فرصتي')

@section('content')
<!-- Settings Page (مطابق للكود الأصلي) -->
<section id="settings" class="page-container active" style="padding:0;">
    <div class="container">
        <div class="page-header">
            <h2 class="page-title">الإعدادات</h2>
        </div>
        <div class="settings-container">
            <div class="settings-sidebar">
                <ul class="settings-menu">
                    <li><a href="#" class="active"><i class="fas fa-sliders-h"></i> تفضيلات الوظائف</a></li>
                    <li><a href="#"><i class="fas fa-bell"></i> إعدادات الإشعارات</a></li>
                    <li><a href="#" onclick="showPage('language')"><i class="fas fa-globe"></i> إعدادات اللغة</a></li>
                    <li><a href="#" onclick="showPage('faq')"><i class="fas fa-question-circle"></i> الأسئلة الشائعة</a></li>
                    <li><a href="#" onclick="showPage('help')"><i class="fas fa-headset"></i> المساعدة والدعم</a></li>
                    <li><a href="#"><i class="fas fa-shield-alt"></i> الخصوصية والأمان</a></li>
                </ul>
            </div>
            <div class="settings-content">
                <h3 class="section-title">تفضيلات الوظائف</h3>
                <form class="preferences-form">
                    <div class="form-group">
                        <label>المجال المهني</label>
                        <select class="form-control">
                            <option>تكنولوجيا المعلومات</option>
                            <option>التسويق والمبيعات</option>
                            <option>المحاسبة والمالية</option>
                            <option>الموارد البشرية</option>
                            <option>الهندسة</option>
                            <option>التعليم</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>المستوى الوظيفي</label>
                        <select class="form-control">
                            <option>مبتدئ (0-2 سنوات)</option>
                            <option>متوسط (2-5 سنوات)</option>
                            <option>متقدم (5+ سنوات)</option>
                            <option>إداري</option>
                            <option>تنفيذي</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>نوع العمل</label>
                        <div>
                            <div class="checkbox-group">
                                <input type="checkbox" id="full-time" checked>
                                <label for="full-time">دوام كامل</label>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" id="part-time">
                                <label for="part-time">دوام جزئي</label>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" id="remote">
                                <label for="remote">عمل عن بعد</label>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" id="contract">
                                <label for="contract">عقود</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>المكان</label>
                        <select class="form-control">
                            <option>الرياض</option>
                            <option>جدة</option>
                            <option>الدمام</option>
                            <option>مكة المكرمة</option>
                            <option>المدينة المنورة</option>
                            <option>أي مكان</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>نطاق الراتب (ر.س)</label>
                        <select class="form-control">
                            <option>أي راتب</option>
                            <option>3,000 - 5,000</option>
                            <option>5,000 - 8,000</option>
                            <option>8,000 - 12,000</option>
                            <option>12,000 - 18,000</option>
                            <option>18,000+</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>الكلمات المفتاحية</label>
                        <input type="text" class="form-control" placeholder="مثل: تطوير، تسويق، تصميم">
                    </div>
                    <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center" style="width: 100%; text-align: center;">حفظ التغييرات</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
function showPage(pageId) {
    // Hide all sections
    document.querySelectorAll('.page-container').forEach(section => {
        section.classList.remove('active');
    });
    
    // Show selected section
    document.getElementById(pageId).classList.add('active');
    
    // Update navigation active state
    document.querySelectorAll('.settings-menu li').forEach(li => {
        li.classList.remove('active');
    });
    
    // Add active class to clicked nav item
    event.target.closest('li').classList.add('active');
}

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