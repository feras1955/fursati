<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'فرصتي - منصة الوظائف العربية')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <a href="{{ route('home') }}" class="logo">
                <i class="fas fa-briefcase"></i>
                فرصتي
            </a>
            
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="fas fa-home"></i> الرئيسية
                    </a></li>
                    <li><a href="{{ route('jobs.index') }}" class="{{ request()->routeIs('jobs.*') ? 'active' : '' }}">
                        <i class="fas fa-search"></i> وظائف
                    </a></li>
                    <li><a href="{{ route('bookmarks.index') }}" class="{{ request()->routeIs('bookmarks.*') ? 'active' : '' }}">
                        <i class="fas fa-bookmark"></i> المحفوظات
                    </a></li>
                    <li><a href="{{ route('profile.index') }}" class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">
                        <i class="fas fa-user"></i> الملف الشخصي
                    </a></li>
                    <li><a href="{{ route('settings.index') }}" class="{{ request()->routeIs('settings.*') ? 'active' : '' }}">
                        <i class="fas fa-cog"></i> الإعدادات
                    </a></li>
                </ul>
            </nav>
            
            <div class="user-actions">
                <button class="btn btn-outline"><i class="fas fa-bell"></i></button>
                <button class="btn btn-outline" onclick="window.location.href='{{ route('profile.index') }}'">
                    <i class="fas fa-user"></i>
                </button>
                @auth
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-outline">
                            <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
                        </button>
                    </form>
                @else
                    <button class="btn btn-primary" onclick="window.location.href='{{ route('login') }}'">
                        <i class="fas fa-sign-in-alt"></i> تسجيل الدخول
                    </button>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-container">
                <div class="footer-col">
                    <h3>عن فرصتي</h3>
                    <p>منصة عربية رائدة للوظائف تهدف إلى ربط الباحثين عن عمل بأفضل الفرص الوظيفية في مختلف المجالات.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <div class="footer-col">
                    <h3>روابط سريعة</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> الرئيسية</a></li>
                        <li><a href="{{ route('jobs.index') }}"><i class="fas fa-search"></i> البحث عن وظائف</a></li>
                        <li><a href="{{ route('profile.index') }}"><i class="fas fa-user"></i> الملف الشخصي</a></li>
                        <li><a href="{{ route('bookmarks.index') }}"><i class="fas fa-bookmark"></i> الوظائف المحفوظة</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h3>الدعم</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('faq.index') }}"><i class="fas fa-question-circle"></i> الأسئلة الشائعة</a></li>
                        <li><a href="{{ route('help.index') }}"><i class="fas fa-headset"></i> المساعدة والدعم</a></li>
                        <li><a href="http://127.0.0.1:8000/privacy">الخصوصية</a></li>
                        <li><a href="{{ route('policy') }}">سياسات الاستخدام</a></li>
                        <li><a href="#"><i class="fas fa-file-alt"></i> الشروط والأحكام</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h3>اتصل بنا</h3>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt"></i> الرياض، السعودية</li>
                        <li><i class="fas fa-phone"></i> +966 11 123 4567</li>
                        <li><i class="fas fa-envelope"></i> info@fursati.com</li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p>جميع الحقوق محفوظة © {{ date('Y') }} منصة فرصتي</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
    
    <script>
    // جعل روابط التذييل تعمل مع الشريط الجانبي في صفحة الإعدادات
    document.addEventListener('DOMContentLoaded', function() {
        // التحقق من وجود hash في الرابط عند تحميل الصفحة
        if (window.location.hash && window.location.pathname.includes('/settings')) {
            const sectionId = window.location.hash.substring(1).replace('-section', '');
            if (typeof showSection === 'function') {
                setTimeout(() => {
                    showSection(sectionId);
                }, 100);
            }
        }
        
        // معالجة النقر على روابط التذييل التي تحتوي على hash
        const footerLinks = document.querySelectorAll('a[href*="#"]');
        footerLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href.includes('/settings#')) {
                    const sectionId = href.split('#')[1].replace('-section', '');
                    
                    // إذا كنا في صفحة الإعدادات، نعرض القسم مباشرة
                    if (window.location.pathname.includes('/settings')) {
                        e.preventDefault();
                        if (typeof showSection === 'function') {
                            showSection(sectionId);
                        }
                        // تحديث الرابط في شريط العناوين
                        window.history.pushState({}, '', href);
                    }
                    // إذا لم نكن في صفحة الإعدادات، سيتم التوجه إلى الصفحة عادياً
                }
            });
        });
    });
    </script>
</body>
</html> 