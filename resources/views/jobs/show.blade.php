@extends('layouts.app')

@section('title', 'تفاصيل الوظيفة - فرصتي')

@section('content')
<div class="container">
    <div class="page-header">
        <h2 class="page-title">تفاصيل الوظيفة</h2>
        <a href="{{ route('jobs.index') }}" class="btn btn-outline">
            <i class="fas fa-arrow-right"></i> العودة للوظائف
        </a>
    </div>
    
    <div class="job-details-container">
        <div class="job-details-header">
            <h2 class="job-title">مطور تطبيقات جوال (React Native)</h2>
            
            <div class="job-quick-info">
                <div class="job-info-item">
                    <i class="fas fa-money-bill-wave"></i>
                    <span>الراتب: 9,000 - 14,000 ر.س</span>
                </div>
                <div class="job-info-item">
                    <i class="fas fa-briefcase"></i>
                    <span>الخبرة: 3+ سنوات</span>
                </div>
                <div class="job-info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>المكان: الرياض، السعودية</span>
                </div>
                <div class="job-info-item">
                    <i class="fas fa-building"></i>
                    <span>نوع العمل: دوام كامل</span>
                </div>
            </div>
        </div>
        
        <div class="job-details-body">
            <div class="job-section">
                <h3 class="job-section-title">وصف الوظيفة</h3>
                <div class="job-section-content">
                    <p>نبحث عن مطور تطبيقات جوال متمرس في React Native للانضمام إلى فريقنا التقني في الرياض. ستكون مسؤولاً عن تصميم وتطوير تطبيقات جوال عالية الجودة لأنظمة iOS و Android.</p>
                    <p>المهام الرئيسية تشمل تطوير واجهات مستخدم تفاعلية، تنفيذ عمليات دمج مع واجهات برمجة التطبيقات، تحسين الأداء، وكتابة كود نظيف وقابل للصيانة.</p>
                </div>
            </div>
            
            <div class="job-section">
                <h3 class="job-section-title">متطلبات المرشح</h3>
                <div class="job-section-content">
                    <ul class="requirements-list">
                        <li>شهادة بكالوريوس في علوم الحاسوب أو مجال ذي صلة</li>
                        <li>3+ سنوات خبرة عملية في تطوير تطبيقات الجوال باستخدام React Native</li>
                        <li>خبرة قوية في JavaScript و React.js</li>
                        <li>فهم عميق لمبادئ تطوير تطبيقات الجوال (iOS و Android)</li>
                        <li>خبرة في التعامل مع واجهات برمجة التطبيقات RESTful</li>
                        <li>خبرة في أنظمة التحكم بالإصدار مثل Git</li>
                        <li>مهارات تواصل ممتازة وقدرة على العمل ضمن فريق</li>
                    </ul>
                </div>
            </div>
            
            <div class="job-section">
                <h3 class="job-section-title">المهارات المطلوبة</h3>
                <div class="job-skills">
                    <span class="skill-tag">React Native</span>
                    <span class="skill-tag">JavaScript</span>
                    <span class="skill-tag">Redux</span>
                    <span class="skill-tag">RESTful APIs</span>
                    <span class="skill-tag">Firebase</span>
                    <span class="skill-tag">Git</span>
                    <span class="skill-tag">UI/UX Design</span>
                </div>
            </div>
            
            <div class="job-section">
                <h3 class="job-section-title">معلومات إضافية</h3>
                <div class="job-section-content">
                    <p><strong>الجنسيات المسموحة:</strong> جميع الجنسيات</p>
                    <p><strong>الدولة المطلوبة للإقامة:</strong> السعودية</p>
                    <p><strong>نوع العمل:</strong> دوام كامل</p>
                    <p><strong>معلومات عن الشركة:</strong> شركة رائدة في مجال التقنية، تأسست عام 2010، وتضم أكثر من 200 موظف. نركز على تطوير حلول تقنية مبتكرة للقطاعات المختلفة.</p>
                </div>
            </div>
        </div>
        
        <div class="job-details-footer">
            <div class="social-share">
                <a href="#" onclick="shareJob(1, 'whatsapp')" class="share-btn whatsapp">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="#" onclick="shareJob(1, 'facebook')" class="share-btn facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" onclick="shareJob(1, 'twitter')" class="share-btn gmail">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
            <div style="display: flex; gap: 1rem;">
                <button onclick="toggleBookmark(1)" class="btn btn-outline" data-job-id="1">
                    <i class="fas fa-bookmark"></i> حفظ الوظيفة
                </button>
                <button onclick="applyForJob(1)" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i> تقديم للوظيفة
                </button>
            </div>
        </div>
    </div>
    
    <!-- Similar Jobs Section -->
    <div style="margin-top: 3rem;">
        <h3 class="section-title">وظائف مشابهة</h3>
        <div class="jobs-container">
            <!-- Similar Job 1 -->
            <div class="job-card">
                <div class="job-header">
                    <span class="job-field">تطوير تطبيقات الجوال</span>
                    <h3 class="job-company">شركة التقنية المتقدمة</h3>
                    <div class="job-salary">
                        <i class="fas fa-money-bill-wave"></i>
                        8,000 - 12,000 ر.س
                    </div>
                </div>
                <div class="job-body">
                    <div class="job-details">
                        <div class="job-detail">
                            <i class="fas fa-briefcase"></i>
                            <span>2+ سنوات خبرة</span>
                        </div>
                        <div class="job-detail">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>الرياض، السعودية</span>
                        </div>
                    </div>
                    
                    <div class="job-skills">
                        <span class="skill-tag">Flutter</span>
                        <span class="skill-tag">Dart</span>
                        <span class="skill-tag">Firebase</span>
                    </div>
                </div>
                <div class="job-footer">
                    <div class="job-time-left">
                        <i class="fas fa-clock"></i>
                        متبقي 5 أيام
                    </div>
                    <a href="{{ route('jobs.show', 2) }}" class="btn btn-primary">عرض التفاصيل</a>
                </div>
            </div>
            
            <!-- Similar Job 2 -->
            <div class="job-card">
                <div class="job-header">
                    <span class="job-field">تطوير الويب</span>
                    <h3 class="job-company">مجموعة الحلول الرقمية</h3>
                    <div class="job-salary">
                        <i class="fas fa-money-bill-wave"></i>
                        7,000 - 11,000 ر.س
                    </div>
                </div>
                <div class="job-body">
                    <div class="job-details">
                        <div class="job-detail">
                            <i class="fas fa-briefcase"></i>
                            <span>3+ سنوات خبرة</span>
                        </div>
                        <div class="job-detail">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>جدة، السعودية</span>
                        </div>
                    </div>
                    
                    <div class="job-skills">
                        <span class="skill-tag">React</span>
                        <span class="skill-tag">Node.js</span>
                        <span class="skill-tag">MongoDB</span>
                    </div>
                </div>
                <div class="job-footer">
                    <div class="job-time-left">
                        <i class="fas fa-clock"></i>
                        متبقي 7 أيام
                    </div>
                    <a href="{{ route('jobs.show', 3) }}" class="btn btn-primary">عرض التفاصيل</a>
                </div>
            </div>
            
            <!-- Similar Job 3 -->
            <div class="job-card">
                <div class="job-header">
                    <span class="job-field">تطوير تطبيقات الجوال</span>
                    <h3 class="job-company">شركة الابتكار التقني</h3>
                    <div class="job-salary">
                        <i class="fas fa-money-bill-wave"></i>
                        10,000 - 15,000 ر.س
                    </div>
                </div>
                <div class="job-body">
                    <div class="job-details">
                        <div class="job-detail">
                            <i class="fas fa-briefcase"></i>
                            <span>4+ سنوات خبرة</span>
                        </div>
                        <div class="job-detail">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>الدمام، السعودية</span>
                        </div>
                    </div>
                    
                    <div class="job-skills">
                        <span class="skill-tag">iOS</span>
                        <span class="skill-tag">Swift</span>
                        <span class="skill-tag">Xcode</span>
                    </div>
                </div>
                <div class="job-footer">
                    <div class="job-time-left">
                        <i class="fas fa-clock"></i>
                        متبقي 10 أيام
                    </div>
                    <a href="{{ route('jobs.show', 4) }}" class="btn btn-primary">عرض التفاصيل</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 