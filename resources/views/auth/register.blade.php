@extends('layouts.app')

@section('title', 'إنشاء حساب جديد - فرصتي')

@section('content')
<!-- Register Container -->
<div class="auth-container">
    <div class="container">
        <div class="auth-content">
            <div class="auth-form">
                <div class="auth-header">
                    <h2>إنشاء حساب جديد</h2>
                    <p>انضم إلى منصة فرصتي وابدأ رحلتك المهنية</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="register-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="first_name">الاسم الأول</label>
                            <div class="input-group">
                                <i class="fas fa-user"></i>
                                <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last_name">اسم العائلة</label>
                            <div class="input-group">
                                <i class="fas fa-user"></i>
                                <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <div class="input-group">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">رقم الهاتف</label>
                        <div class="input-group">
                            <i class="fas fa-phone"></i>
                            <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="+966 50 123 4567">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="city">المدينة</label>
                        <div class="input-group">
                            <i class="fas fa-map-marker-alt"></i>
                            <select id="city" name="city" class="form-control" required>
                                <option value="">اختر المدينة</option>
                                <option value="riyadh" {{ old('city') == 'riyadh' ? 'selected' : '' }}>الرياض</option>
                                <option value="jeddah" {{ old('city') == 'jeddah' ? 'selected' : '' }}>جدة</option>
                                <option value="dammam" {{ old('city') == 'dammam' ? 'selected' : '' }}>الدمام</option>
                                <option value="makkah" {{ old('city') == 'makkah' ? 'selected' : '' }}>مكة المكرمة</option>
                                <option value="madinah" {{ old('city') == 'madinah' ? 'selected' : '' }}>المدينة المنورة</option>
                                <option value="taif" {{ old('city') == 'taif' ? 'selected' : '' }}>الطائف</option>
                                <option value="abha" {{ old('city') == 'abha' ? 'selected' : '' }}>أبها</option>
                                <option value="tabuk" {{ old('city') == 'tabuk' ? 'selected' : '' }}>تبوك</option>
                                <option value="hail" {{ old('city') == 'hail' ? 'selected' : '' }}>حائل</option>
                                <option value="other" {{ old('city') == 'other' ? 'selected' : '' }}>أخرى</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="profession">المجال المهني</label>
                        <div class="input-group">
                            <i class="fas fa-briefcase"></i>
                            <input type="text" id="profession" name="profession" class="form-control" value="{{ old('profession') }}" placeholder="مثال: مطور ويب، مدير تسويق" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="experience">سنوات الخبرة</label>
                        <div class="input-group">
                            <i class="fas fa-clock"></i>
                            <select id="experience" name="experience" class="form-control" required>
                                <option value="">اختر سنوات الخبرة</option>
                                <option value="0" {{ old('experience') == '0' ? 'selected' : '' }}>خريج جديد</option>
                                <option value="1" {{ old('experience') == '1' ? 'selected' : '' }}>أقل من سنة</option>
                                <option value="2" {{ old('experience') == '2' ? 'selected' : '' }}>1-2 سنة</option>
                                <option value="3" {{ old('experience') == '3' ? 'selected' : '' }}>2-5 سنوات</option>
                                <option value="4" {{ old('experience') == '4' ? 'selected' : '' }}>5-10 سنوات</option>
                                <option value="5" {{ old('experience') == '5' ? 'selected' : '' }}>أكثر من 10 سنوات</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">كلمة المرور</label>
                        <div class="input-group">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" class="form-control" required>
                            <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="password-strength">
                            <div class="strength-bar">
                                <div class="strength-fill" id="strengthFill"></div>
                            </div>
                            <span class="strength-text" id="strengthText">ضعيفة</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">تأكيد كلمة المرور</label>
                        <div class="input-group">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                            <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-options">
                        <label class="checkbox-label">
                            <input type="checkbox" name="terms" required>
                            <span class="checkmark"></span>
                            أوافق على <a href="{{ route('terms') }}" target="_blank">الشروط والأحكام</a>
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="privacy" required>
                            <span class="checkmark"></span>
                            أوافق على <a href="{{ route('privacy') }}" target="_blank">سياسة الخصوصية</a>
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="newsletter" {{ old('newsletter') ? 'checked' : '' }}>
                            <span class="checkmark"></span>
                            أريد استلام النشرة الإخبارية والوظائف الجديدة
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-user-plus"></i> إنشاء الحساب
                    </button>
                </form>

                <div class="social-login">
                    <p>أو سجل باستخدام</p>
                    <div class="social-buttons">
                        <button class="btn btn-social btn-google" onclick="socialLogin('google')">
                            <i class="fab fa-google"></i> Google
                        </button>
                        <button class="btn btn-social btn-facebook" onclick="socialLogin('facebook')">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </button>
                        <button class="btn btn-social btn-linkedin" onclick="socialLogin('linkedin')">
                            <i class="fab fa-linkedin-in"></i> LinkedIn
                        </button>
                    </div>
                </div>

                <div class="auth-footer">
                    <p>لديك حساب بالفعل؟ <a href="{{ route('login') }}">تسجيل الدخول</a></p>
                </div>
            </div>

            <div class="auth-info">
                <div class="info-content">
                    <h3>ابدأ رحلتك المهنية معنا</h3>
                    <p>انضم إلى مجتمع من المحترفين واكتشف الفرص المثالية لحياتك المهنية</p>
                    
                    <div class="features-list">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <div class="feature-text">
                                <h4>انضم بسرعة</h4>
                                <p>أنشئ حسابك في دقائق وابدأ البحث عن الوظائف فوراً</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-target"></i>
                            </div>
                            <div class="feature-text">
                                <h4>وظائف مخصصة</h4>
                                <p>احصل على توصيات وظائف مخصصة بناءً على مهاراتك وخبراتك</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="feature-text">
                                <h4>تتبع تقدمك</h4>
                                <p>راقب طلبات التقديم وحالة طلباتك بسهولة</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="feature-text">
                                <h4>شبكة مهنية</h4>
                                <p>تواصل مع محترفين آخرين وابني شبكة علاقاتك المهنية</p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonials">
                        <h4>ماذا يقول المستخدمون</h4>
                        <div class="testimonial">
                            <p>"وجدت وظيفة أحلامي خلال أسبوعين من التسجيل!"</p>
                            <span class="testimonial-author">- أحمد محمد، مطور ويب</span>
                        </div>
                        <div class="testimonial">
                            <p>"المنصة سهلة الاستخدام والوظائف متنوعة ومميزة"</p>
                            <span class="testimonial-author">- سارة أحمد، مديرة تسويق</span>
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
function togglePassword(fieldId) {
    const passwordInput = document.getElementById(fieldId);
    const toggleBtn = passwordInput.parentElement.querySelector('.password-toggle i');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleBtn.classList.remove('fa-eye');
        toggleBtn.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleBtn.classList.remove('fa-eye-slash');
        toggleBtn.classList.add('fa-eye');
    }
}

function checkPasswordStrength(password) {
    let strength = 0;
    const strengthFill = document.getElementById('strengthFill');
    const strengthText = document.getElementById('strengthText');
    
    // Check length
    if (password.length >= 8) strength += 1;
    if (password.length >= 12) strength += 1;
    
    // Check for numbers
    if (/\d/.test(password)) strength += 1;
    
    // Check for letters
    if (/[a-zA-Z]/.test(password)) strength += 1;
    
    // Check for special characters
    if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength += 1;
    
    // Update UI
    switch(strength) {
        case 0:
        case 1:
            strengthFill.style.width = '25%';
            strengthFill.style.backgroundColor = '#ff4444';
            strengthText.textContent = 'ضعيفة';
            break;
        case 2:
            strengthFill.style.width = '50%';
            strengthFill.style.backgroundColor = '#ff8800';
            strengthText.textContent = 'متوسطة';
            break;
        case 3:
            strengthFill.style.width = '75%';
            strengthFill.style.backgroundColor = '#ffaa00';
            strengthText.textContent = 'جيدة';
            break;
        case 4:
        case 5:
            strengthFill.style.width = '100%';
            strengthFill.style.backgroundColor = '#00aa00';
            strengthText.textContent = 'قوية';
            break;
    }
}

function socialLogin(provider) {
    // Redirect to social login
    window.location.href = `{{ route('register') }}/${provider}`;
}

// Form validation and password strength
document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    const registerForm = document.querySelector('.register-form');
    
    // Password strength checker
    passwordInput.addEventListener('input', function() {
        checkPasswordStrength(this.value);
    });
    
    // Password confirmation checker
    confirmPasswordInput.addEventListener('input', function() {
        const password = passwordInput.value;
        const confirmPassword = this.value;
        
        if (password !== confirmPassword) {
            this.setCustomValidity('كلمة المرور غير متطابقة');
        } else {
            this.setCustomValidity('');
        }
    });
    
    // Form submission
    registerForm.addEventListener('submit', function(e) {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        
        if (password !== confirmPassword) {
            e.preventDefault();
            showNotification('كلمة المرور غير متطابقة', 'error');
            return false;
        }
        
        if (password.length < 8) {
            e.preventDefault();
            showNotification('كلمة المرور يجب أن تكون 8 أحرف على الأقل', 'error');
            return false;
        }
        
        // Show loading state
        const submitBtn = registerForm.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري إنشاء الحساب...';
        submitBtn.disabled = true;
    });
});

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