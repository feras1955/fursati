@extends('layouts.app')

@section('title', 'الملف الشخصي - فرصتي')

@section('content')
<!-- Profile Container -->
<div class="profile-container">
    <div class="container">
        <div class="profile-header">
            <div class="profile-avatar">
                <img src="{{ asset('images/avatar.jpg') }}" alt="الصورة الشخصية" id="profileImage">
                <div class="avatar-upload">
                    <label for="avatarInput" class="upload-btn">
                        <i class="fas fa-camera"></i>
                    </label>
                    <input type="file" id="avatarInput" accept="image/*" style="display: none;">
                </div>
            </div>
            <div class="profile-info">
                <h1>أحمد محمد علي</h1>
                <p class="job-title">مطور ويب متقدم</p>
                <p class="location"><i class="fas fa-map-marker-alt"></i> الرياض، السعودية</p>
                <div class="profile-stats">
                    <div class="stat">
                        <span class="number">15</span>
                        <span class="label">وظيفة متقدم لها</span>
                    </div>
                    <div class="stat">
                        <span class="number">8</span>
                        <span class="label">وظيفة محفوظة</span>
                    </div>
                    <div class="stat">
                        <span class="number">3</span>
                        <span class="label">مقابلات</span>
                    </div>
                </div>
            </div>
            <div class="profile-actions">
                <button class="btn btn-primary" onclick="editProfile()">
                    <i class="fas fa-edit"></i> تعديل الملف الشخصي
                </button>
                <button class="btn btn-outline" onclick="downloadCV()">
                    <i class="fas fa-download"></i> تحميل السيرة الذاتية
                </button>
            </div>
        </div>

        <div class="profile-content">
            <div class="profile-section">
                <h2><i class="fas fa-user"></i> المعلومات الشخصية</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <label>الاسم الكامل:</label>
                        <span>أحمد محمد علي</span>
                    </div>
                    <div class="info-item">
                        <label>البريد الإلكتروني:</label>
                        <span>ahmed@example.com</span>
                    </div>
                    <div class="info-item">
                        <label>رقم الهاتف:</label>
                        <span>+966 50 123 4567</span>
                    </div>
                    <div class="info-item">
                        <label>تاريخ الميلاد:</label>
                        <span>15 مارس 1990</span>
                    </div>
                    <div class="info-item">
                        <label>الجنسية:</label>
                        <span>سعودي</span>
                    </div>
                    <div class="info-item">
                        <label>الحالة الاجتماعية:</label>
                        <span>متزوج</span>
                    </div>
                </div>
            </div>

            <div class="profile-section">
                <h2><i class="fas fa-graduation-cap"></i> المؤهلات العلمية</h2>
                <div class="education-item">
                    <div class="education-header">
                        <h3>بكالوريوس علوم الحاسب الآلي</h3>
                        <span class="year">2010 - 2014</span>
                    </div>
                    <p class="institution">جامعة الملك سعود</p>
                    <p class="gpa">المعدل التراكمي: 3.8/4.0</p>
                </div>
                <div class="education-item">
                    <div class="education-header">
                        <h3>ماجستير في تقنية المعلومات</h3>
                        <span class="year">2014 - 2016</span>
                    </div>
                    <p class="institution">جامعة الملك فهد للبترول والمعادن</p>
                    <p class="gpa">المعدل التراكمي: 3.9/4.0</p>
                </div>
            </div>

            <div class="profile-section">
                <h2><i class="fas fa-briefcase"></i> الخبرات العملية</h2>
                <div class="experience-item">
                    <div class="experience-header">
                        <h3>مطور ويب متقدم</h3>
                        <span class="period">2020 - الحالي</span>
                    </div>
                    <p class="company">شركة التقنية المتقدمة</p>
                    <ul class="responsibilities">
                        <li>تطوير تطبيقات الويب باستخدام Laravel و Vue.js</li>
                        <li>إدارة فريق من 5 مطورين</li>
                        <li>تحسين أداء التطبيقات وضمان الأمان</li>
                    </ul>
                </div>
                <div class="experience-item">
                    <div class="experience-header">
                        <h3>مطور ويب</h3>
                        <span class="period">2016 - 2020</span>
                    </div>
                    <p class="company">شركة الحلول الرقمية</p>
                    <ul class="responsibilities">
                        <li>تطوير مواقع الويب التفاعلية</li>
                        <li>العمل مع PHP و MySQL</li>
                        <li>التعاون مع فريق التصميم</li>
                    </ul>
                </div>
            </div>

            <div class="profile-section">
                <h2><i class="fas fa-code"></i> المهارات التقنية</h2>
                <div class="skills-grid">
                    <div class="skill-category">
                        <h3>لغات البرمجة</h3>
                        <div class="skill-tags">
                            <span class="skill-tag">PHP</span>
                            <span class="skill-tag">JavaScript</span>
                            <span class="skill-tag">Python</span>
                            <span class="skill-tag">Java</span>
                        </div>
                    </div>
                    <div class="skill-category">
                        <h3>أطر العمل</h3>
                        <div class="skill-tags">
                            <span class="skill-tag">Laravel</span>
                            <span class="skill-tag">Vue.js</span>
                            <span class="skill-tag">React</span>
                            <span class="skill-tag">Django</span>
                        </div>
                    </div>
                    <div class="skill-category">
                        <h3>قواعد البيانات</h3>
                        <div class="skill-tags">
                            <span class="skill-tag">MySQL</span>
                            <span class="skill-tag">PostgreSQL</span>
                            <span class="skill-tag">MongoDB</span>
                        </div>
                    </div>
                    <div class="skill-category">
                        <h3>أدوات أخرى</h3>
                        <div class="skill-tags">
                            <span class="skill-tag">Git</span>
                            <span class="skill-tag">Docker</span>
                            <span class="skill-tag">AWS</span>
                            <span class="skill-tag">Linux</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="profile-section">
                <h2><i class="fas fa-certificate"></i> الشهادات</h2>
                <div class="certificates-grid">
                    <div class="certificate-item">
                        <div class="certificate-icon">
                            <i class="fab fa-aws"></i>
                        </div>
                        <div class="certificate-info">
                            <h3>AWS Certified Solutions Architect</h3>
                            <p>Amazon Web Services</p>
                            <span class="cert-date">2023</span>
                        </div>
                    </div>
                    <div class="certificate-item">
                        <div class="certificate-icon">
                            <i class="fab fa-google"></i>
                        </div>
                        <div class="certificate-info">
                            <h3>Google Cloud Professional</h3>
                            <p>Google Cloud Platform</p>
                            <span class="cert-date">2022</span>
                        </div>
                    </div>
                    <div class="certificate-item">
                        <div class="certificate-icon">
                            <i class="fab fa-microsoft"></i>
                        </div>
                        <div class="certificate-info">
                            <h3>Microsoft Azure Developer</h3>
                            <p>Microsoft</p>
                            <span class="cert-date">2021</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="profile-section">
                <h2><i class="fas fa-language"></i> اللغات</h2>
                <div class="languages-grid">
                    <div class="language-item">
                        <span class="language-name">العربية</span>
                        <div class="language-level">
                            <span class="level">اللغة الأم</span>
                        </div>
                    </div>
                    <div class="language-item">
                        <span class="language-name">الإنجليزية</span>
                        <div class="language-level">
                            <span class="level">متقدم</span>
                        </div>
                    </div>
                    <div class="language-item">
                        <span class="language-name">الفرنسية</span>
                        <div class="language-level">
                            <span class="level">متوسط</span>
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
function editProfile() {
    // Redirect to profile edit page
    window.location.href = '{{ route("profile.edit") }}';
}

function downloadCV() {
    // Trigger CV download
    const link = document.createElement('a');
    link.href = '{{ asset("files/cv.pdf") }}';
    link.download = 'ahmed_mohammed_cv.pdf';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Handle avatar upload
document.addEventListener('DOMContentLoaded', function() {
    const avatarInput = document.getElementById('avatarInput');
    const profileImage = document.getElementById('profileImage');
    
    avatarInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profileImage.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endpush 