@extends('layouts.app')

@section('title', 'سياسات الاستخدام - فرصتي')

@section('content')
<!-- Usage Policy Container -->
<div class="faq-container">
    <div class="container">
        <div class="page-header">
            <h2 class="page-title">سياسات الاستخدام</h2>
            <p class="page-subtitle">تعرف على سياسات وضوابط استخدام منصة فرصتي</p>
        </div>

        <div class="faq-content">
            <div class="faq-list">
                <!-- Policy Example -->
                <div class="faq-item" data-category="policy">
                    <div class="faq-question">
                        <h3>شروط التسجيل واستخدام الحساب</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <ul>
                            <li>يجب تقديم معلومات صحيحة وحديثة عند إنشاء الحساب.</li>
                            <li>أنت مسؤول عن سرية بيانات الدخول وعدم مشاركتها مع الغير.</li>
                            <li>يحق للإدارة إيقاف أو حذف أي حساب يخالف السياسات.</li>
                        </ul>
                    </div>
                </div>

                <div class="faq-item" data-category="policy">
                    <div class="faq-question">
                        <h3>الاستخدام المقبول للموقع</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <ul>
                            <li>يمنع استخدام المنصة لأي أغراض غير قانونية أو مخالفة للأخلاق.</li>
                            <li>يمنع نشر أو مشاركة محتوى مسيء أو مضلل أو ينتهك حقوق الآخرين.</li>
                        </ul>
                    </div>
                </div>

                <div class="faq-item" data-category="policy">
                    <div class="faq-question">
                        <h3>حقوق الملكية الفكرية</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <ul>
                            <li>جميع الحقوق محفوظة لمنصة "فرصتي".</li>
                            <li>لا يجوز نسخ أو إعادة نشر أي جزء من الموقع بدون إذن رسمي.</li>
                        </ul>
                    </div>
                </div>

                <div class="faq-item" data-category="policy">
                    <div class="faq-question">
                        <h3>تعديلات السياسات</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <ul>
                            <li>يحق لإدارة المنصة تعديل السياسات في أي وقت.</li>
                            <li>سيتم إشعار المستخدمين بالتغييرات الجوهرية عبر البريد الإلكتروني أو الموقع.</li>
                        </ul>
                    </div>
                </div>

                <div class="faq-item" data-category="policy">
                    <div class="faq-question">
                        <h3>التواصل والاستفسارات</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>للاستفسارات أو الشكاوى، يرجى التواصل عبر صفحة <a href="{{ url('/contact') }}" style="color: var(--primary);">اتصل بنا</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
