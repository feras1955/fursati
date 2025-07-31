@extends('layouts.app')

@section('title', 'تسجيل الدخول - فرصتي')

@section('content')
<!-- Login Container -->
<div class="auth-container">
    <div class="container">
        <div class="auth-content">
            <div class="auth-form">
                <div class="auth-header">
                    <h2>تسجيل الدخول</h2>
                    <p>مرحباً بك في منصة فرصتي</p>
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

                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf
                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <div class="input-group">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">كلمة المرور</label>
                        <div class="input-group">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" class="form-control" required>
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-options">
                        <label class="checkbox-label">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span class="checkmark"></span>
                            تذكرني
                        </label>
                        <a href="{{ route('password.request') }}" class="forgot-link">نسيت كلمة المرور؟</a>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-sign-in-alt"></i> تسجيل الدخول
                    </button>
                </form>

                <div class="social-login">
                    <p>أو سجل الدخول باستخدام</p>
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
                    <p>ليس لديك حساب؟ <a href="{{ route('register') }}">إنشاء حساب جديد</a></p>
                </div>
            </div>

            <div class="auth-info">
                <div class="info-content">
                    <h3>انضم إلى منصة فرصتي</h3>
                    <p>اكتشف آلاف الوظائف المميزة وابني مستقبلك المهني معنا</p>
                    
                    <div class="features-list">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <div class="feature-text">
                                <h4>البحث المتقدم</h4>
                                <p>ابحث عن الوظائف المناسبة باستخدام فلاتر متقدمة</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div class="feature-text">
                                <h4>إشعارات فورية</h4>
                                <p>احصل على إشعارات فورية بالوظائف الجديدة المناسبة لك</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="feature-text">
                                <h4>خصوصية كاملة</h4>
                                <p>معلوماتك محمية بأحدث تقنيات الأمان والتشفير</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="feature-text">
                                <h4>متوافق مع جميع الأجهزة</h4>
                                <p>استخدم المنصة من أي جهاز وفي أي وقت</p>
                            </div>
                        </div>
                    </div>

                    <div class="stats">
                        <div class="stat-item">
                            <span class="stat-number">50,000+</span>
                            <span class="stat-label">وظيفة متاحة</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">10,000+</span>
                            <span class="stat-label">شركة شريكة</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">100,000+</span>
                            <span class="stat-label">مستخدم نشط</span>
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
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleBtn = document.querySelector('.password-toggle i');
    
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

function socialLogin(provider) {
    // Redirect to social login
    window.location.href = `{{ route('login') }}/${provider}`;
}

// Form validation
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.querySelector('.login-form');
    
    loginForm.addEventListener('submit', function(e) {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        
        if (!email || !password) {
            e.preventDefault();
            showNotification('يرجى ملء جميع الحقول المطلوبة', 'error');
            return false;
        }
        
        // Show loading state
        const submitBtn = loginForm.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري تسجيل الدخول...';
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