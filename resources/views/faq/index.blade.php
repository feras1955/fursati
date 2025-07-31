@extends('layouts.app')

@section('title', 'الأسئلة الشائعة - فرصتي')

@section('content')
<!-- FAQ Container -->
<div class="faq-container">
    <div class="container">
        <div class="page-header">
            <h2 class="page-title">الأسئلة الشائعة</h2>
            <p class="page-subtitle">إجابات على أكثر الأسئلة شيوعاً حول منصة فرصتي</p>
        </div>

        <div class="faq-content">
            <div class="faq-search">
                <div class="search-box">
                    <input type="text" id="faqSearch" placeholder="ابحث في الأسئلة الشائعة..." onkeyup="searchFAQ()">
                    <i class="fas fa-search"></i>
                </div>
            </div>

            <div class="faq-categories">
                <button class="category-btn active" onclick="filterFAQ('all')">جميع الأسئلة</button>
                <button class="category-btn" onclick="filterFAQ('account')">الحساب والتسجيل</button>
                <button class="category-btn" onclick="filterFAQ('jobs')">البحث والتقديم</button>
                <button class="category-btn" onclick="filterFAQ('profile')">الملف الشخصي</button>
                <button class="category-btn" onclick="filterFAQ('privacy')">الخصوصية والأمان</button>
                <button class="category-btn" onclick="filterFAQ('technical')">المشاكل التقنية</button>
            </div>

            <div class="faq-list">
                <!-- Account & Registration FAQ -->
                <div class="faq-item" data-category="account">
                    <div class="faq-question">
                        <h3>كيف يمكنني إنشاء حساب جديد في منصة فرصتي؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>يمكنك إنشاء حساب جديد باتباع الخطوات التالية:</p>
                        <ol>
                            <li>انقر على زر "تسجيل الدخول" في أعلى الصفحة</li>
                            <li>اختر "إنشاء حساب جديد"</li>
                            <li>أدخل بريدك الإلكتروني وكلمة المرور</li>
                            <li>أكمل معلوماتك الشخصية</li>
                            <li>اضغط على "إنشاء الحساب"</li>
                        </ol>
                        <p>سيتم إرسال رابط تأكيد إلى بريدك الإلكتروني لتفعيل الحساب.</p>
                    </div>
                </div>

                <div class="faq-item" data-category="account">
                    <div class="faq-question">
                        <h3>نسيت كلمة المرور، كيف يمكنني استعادتها؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>لإعادة تعيين كلمة المرور:</p>
                        <ol>
                            <li>انقر على "نسيت كلمة المرور" في صفحة تسجيل الدخول</li>
                            <li>أدخل بريدك الإلكتروني المسجل</li>
                            <li>ستصلك رسالة تحتوي على رابط إعادة تعيين كلمة المرور</li>
                            <li>انقر على الرابط وأدخل كلمة المرور الجديدة</li>
                        </ol>
                    </div>
                </div>

                <div class="faq-item" data-category="account">
                    <div class="faq-question">
                        <h3>هل يمكنني استخدام حساب واحد لعدة أشخاص؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>لا، لا يُسمح باستخدام حساب واحد لعدة أشخاص. كل حساب يجب أن يكون لشخص واحد فقط لضمان دقة المعلومات وحماية الخصوصية.</p>
                    </div>
                </div>

                <!-- Jobs & Applications FAQ -->
                <div class="faq-item" data-category="jobs">
                    <div class="faq-question">
                        <h3>كيف يمكنني البحث عن وظائف مناسبة؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>يمكنك البحث عن الوظائف بعدة طرق:</p>
                        <ul>
                            <li>استخدم شريط البحث في الصفحة الرئيسية</li>
                            <li>استخدم الفلاتر المتقدمة (المجال، الموقع، الراتب)</li>
                            <li>تصفح الوظائف حسب التصنيف</li>
                            <li>احفظ البحث لاستقبال إشعارات بالوظائف الجديدة</li>
                        </ul>
                    </div>
                </div>

                <div class="faq-item" data-category="jobs">
                    <div class="faq-question">
                        <h3>كيف يمكنني التقديم على وظيفة؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>للتقديم على وظيفة:</p>
                        <ol>
                            <li>ابحث عن الوظيفة المناسبة</li>
                            <li>انقر على "عرض التفاصيل"</li>
                            <li>اقرأ تفاصيل الوظيفة بعناية</li>
                            <li>انقر على "تقديم طلب"</li>
                            <li>أكمل النموذج وأرفق السيرة الذاتية</li>
                            <li>اضغط على "إرسال الطلب"</li>
                        </ol>
                    </div>
                </div>

                <div class="faq-item" data-category="jobs">
                    <div class="faq-question">
                        <h3>كم مرة يمكنني التقديم على نفس الوظيفة؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>يمكنك التقديم على نفس الوظيفة مرة واحدة فقط. إذا كنت ترغب في تحديث طلبك، يمكنك التواصل مع الشركة مباشرة أو إلغاء الطلب السابق والتقديم مرة أخرى.</p>
                    </div>
                </div>

                <div class="faq-item" data-category="jobs">
                    <div class="faq-question">
                        <h3>كيف أعرف حالة طلبي؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>يمكنك متابعة حالة طلبك من خلال:</p>
                        <ul>
                            <li>الذهاب إلى صفحة "الملف الشخصي"</li>
                            <li>اختيار "الوظائف المتقدم لها"</li>
                            <li>ستجد قائمة بجميع طلباتك وحالتها</li>
                            <li>ستصلك إشعارات عند تغيير حالة الطلب</li>
                        </ul>
                    </div>
                </div>

                <!-- Profile FAQ -->
                <div class="faq-item" data-category="profile">
                    <div class="faq-question">
                        <h3>كيف يمكنني تحديث ملفي الشخصي؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>لتحديث ملفك الشخصي:</p>
                        <ol>
                            <li>اذهب إلى "الملف الشخصي"</li>
                            <li>انقر على "تعديل الملف الشخصي"</li>
                            <li>حدّث المعلومات المطلوبة</li>
                            <li>احفظ التغييرات</li>
                        </ol>
                        <p>تحديث ملفك الشخصي بانتظام يزيد من فرصك في الحصول على الوظائف المناسبة.</p>
                    </div>
                </div>

                <div class="faq-item" data-category="profile">
                    <div class="faq-question">
                        <h3>ما هي الملفات المدعومة للسيرة الذاتية؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>الملفات المدعومة للسيرة الذاتية:</p>
                        <ul>
                            <li>PDF (الأفضل)</li>
                            <li>DOC</li>
                            <li>DOCX</li>
                        </ul>
                        <p>حجم الملف يجب أن لا يتجاوز 5 ميجابايت.</p>
                    </div>
                </div>

                <div class="faq-item" data-category="profile">
                    <div class="faq-question">
                        <h3>هل يمكنني إخفاء ملفي الشخصي عن الشركات؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>نعم، يمكنك التحكم في خصوصية ملفك الشخصي من خلال:</p>
                        <ul>
                            <li>الذهاب إلى "الإعدادات"</li>
                            <li>اختيار "إعدادات الخصوصية"</li>
                            <li>تحديد ما تريد إظهاره للشركات</li>
                        </ul>
                    </div>
                </div>

                <!-- Privacy & Security FAQ -->
                <div class="faq-item" data-category="privacy">
                    <div class="faq-question">
                        <h3>كيف تحمون معلوماتي الشخصية؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>نحن نحمي معلوماتك من خلال:</p>
                        <ul>
                            <li>تشفير جميع البيانات الحساسة</li>
                            <li>استخدام بروتوكولات أمان متقدمة</li>
                            <li>عدم مشاركة معلوماتك مع أطراف ثالثة دون موافقتك</li>
                            <li>تحديث أنظمة الأمان بانتظام</li>
                            <li>إجراء تدقيق أمني دوري</li>
                        </ul>
                    </div>
                </div>

                <div class="faq-item" data-category="privacy">
                    <div class="faq-question">
                        <h3>هل يمكنني حذف حسابي نهائياً؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>نعم، يمكنك حذف حسابك نهائياً من خلال:</p>
                        <ol>
                            <li>الذهاب إلى "الإعدادات"</li>
                            <li>اختيار "إعدادات الحساب"</li>
                            <li>انقر على "حذف الحساب"</li>
                            <li>أكد عملية الحذف</li>
                        </ol>
                        <p><strong>تحذير:</strong> حذف الحساب نهائي ولا يمكن التراجع عنه.</p>
                    </div>
                </div>

                <div class="faq-item" data-category="privacy">
                    <div class="faq-question">
                        <h3>كيف يمكنني التحكم في الإشعارات؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>يمكنك التحكم في الإشعارات من خلال:</p>
                        <ul>
                            <li>الذهاب إلى "الإعدادات"</li>
                            <li>اختيار "إعدادات الإشعارات"</li>
                            <li>تفعيل أو إلغاء أنواع الإشعارات المختلفة</li>
                            <li>تحديد توقيت الإشعارات</li>
                        </ul>
                    </div>
                </div>

                <!-- Technical Issues FAQ -->
                <div class="faq-item" data-category="technical">
                    <div class="faq-question">
                        <h3>الموقع لا يعمل بشكل صحيح، ماذا أفعل؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>إذا واجهت مشاكل تقنية:</p>
                        <ol>
                            <li>تأكد من تحديث متصفحك</li>
                            <li>امسح ذاكرة التخزين المؤقت</li>
                            <li>جرب متصفح آخر</li>
                            <li>تحقق من اتصال الإنترنت</li>
                            <li>تواصل مع الدعم الفني إذا استمرت المشكلة</li>
                        </ol>
                    </div>
                </div>

                <div class="faq-item" data-category="technical">
                    <div class="faq-question">
                        <h3>لا أستطيع رفع السيرة الذاتية، ما الحل؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>إذا واجهت مشكلة في رفع السيرة الذاتية:</p>
                        <ul>
                            <li>تأكد من أن الملف بصيغة مدعومة (PDF, DOC, DOCX)</li>
                            <li>تأكد من أن حجم الملف أقل من 5 ميجابايت</li>
                            <li>جرب رفع الملف من متصفح آخر</li>
                            <li>تحقق من اتصال الإنترنت</li>
                            <li>تواصل مع الدعم الفني إذا استمرت المشكلة</li>
                        </ul>
                    </div>
                </div>

                <div class="faq-item" data-category="technical">
                    <div class="faq-question">
                        <h3>كيف يمكنني تغيير لغة الموقع؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>لتغيير لغة الموقع:</p>
                        <ol>
                            <li>اذهب إلى "الإعدادات"</li>
                            <li>اختر "إعدادات اللغة"</li>
                            <li>اختر اللغة المطلوبة</li>
                            <li>احفظ الإعدادات</li>
                        </ol>
                        <p>اللغات المدعومة حالياً: العربية، الإنجليزية، الفرنسية</p>
                    </div>
                </div>

                <div class="faq-item" data-category="technical">
                    <div class="faq-question">
                        <h3>هل الموقع متوافق مع الأجهزة المحمولة؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>نعم، منصة فرصتي متوافقة تماماً مع جميع الأجهزة:</p>
                        <ul>
                            <li>الهواتف الذكية (Android و iOS)</li>
                            <li>الأجهزة اللوحية</li>
                            <li>أجهزة الكمبيوتر المحمولة</li>
                            <li>أجهزة الكمبيوتر المكتبية</li>
                        </ul>
                        <p>يمكنك استخدام جميع الميزات بسهولة من أي جهاز.</p>
                    </div>
                </div>
            </div>

            <div class="faq-contact">
                <h3>لم تجد إجابة لسؤالك؟</h3>
                <p>تواصل مع فريق الدعم الفني للحصول على المساعدة</p>
                <div class="contact-options">
                    <a href="{{ route('help.index') }}" class="btn btn-primary">
                        <i class="fas fa-headset"></i> مركز المساعدة
                    </a>
                    <a href="mailto:support@fursati.com" class="btn btn-outline">
                        <i class="fas fa-envelope"></i> إرسال بريد إلكتروني
                    </a>
                    <a href="tel:+966111234567" class="btn btn-outline">
                        <i class="fas fa-phone"></i> اتصل بنا
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function searchFAQ() {
    const searchTerm = document.getElementById('faqSearch').value.toLowerCase();
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question h3').textContent.toLowerCase();
        const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
        
        if (question.includes(searchTerm) || answer.includes(searchTerm)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

function filterFAQ(category) {
    const faqItems = document.querySelectorAll('.faq-item');
    const categoryBtns = document.querySelectorAll('.category-btn');
    
    // Update active button
    categoryBtns.forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    
    // Filter FAQ items
    faqItems.forEach(item => {
        if (category === 'all' || item.dataset.category === category) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

// Toggle FAQ answers
document.addEventListener('DOMContentLoaded', function() {
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            const faqItem = question.parentElement;
            const answer = faqItem.querySelector('.faq-answer');
            const icon = question.querySelector('i');
            
            // Toggle active class
            faqItem.classList.toggle('active');
            
            // Toggle answer visibility
            if (faqItem.classList.contains('active')) {
                answer.style.maxHeight = answer.scrollHeight + 'px';
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            } else {
                answer.style.maxHeight = '0';
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            }
        });
    });
});
</script>
@endpush 