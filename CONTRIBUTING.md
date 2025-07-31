# دليل المساهمة في منصة فرصتي

شكراً لك على اهتمامك بالمساهمة في منصة فرصتي! هذا الدليل سيساعدك على فهم كيفية المساهمة في المشروع.

## كيفية المساهمة

### 1. إعداد البيئة المحلية

```bash
# استنساخ المشروع
git clone https://github.com/your-username/fursati.git
cd fursati

# تثبيت التبعيات
composer install
npm install

# إعداد البيئة
cp env.example .env
php artisan key:generate

# إعداد قاعدة البيانات
php artisan migrate
php artisan db:seed

# بناء الأصول
npm run build
```

### 2. إنشاء فرع جديد

```bash
# التأكد من تحديث الفرع الرئيسي
git checkout main
git pull origin main

# إنشاء فرع جديد للميزة
git checkout -b feature/your-feature-name
```

### 3. تطوير الميزة

- اتبع معايير الترميز المذكورة أدناه
- اكتب اختبارات للميزات الجديدة
- تأكد من أن جميع الاختبارات تمر
- اكتب وثائق للميزات الجديدة

### 4. إرسال Pull Request

```bash
# إضافة التغييرات
git add .

# عمل commit
git commit -m "feat: add new feature description"

# رفع الفرع
git push origin feature/your-feature-name
```

## معايير الترميز

### PHP/Laravel

- استخدم PSR-12 معايير الترميز
- استخدم أسماء واضحة للمتغيرات والدوال
- اكتب تعليقات باللغة العربية
- استخدم type hints و return types

```php
/**
 * إنشاء وظيفة جديدة
 *
 * @param array $data
 * @return Job
 */
public function createJob(array $data): Job
{
    // التحقق من صحة البيانات
    $validatedData = $this->validateJobData($data);
    
    // إنشاء الوظيفة
    $job = Job::create($validatedData);
    
    // إرسال إشعارات
    $this->notifyJobCreated($job);
    
    return $job;
}
```

### JavaScript

- استخدم ES6+ syntax
- استخدم camelCase للأسماء
- اكتب تعليقات باللغة العربية

```javascript
/**
 * تحديث حالة الوظيفة
 * @param {number} jobId - معرف الوظيفة
 * @param {string} status - الحالة الجديدة
 */
const updateJobStatus = async (jobId, status) => {
    try {
        const response = await fetch(`/jobs/${jobId}/status`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': getCsrfToken()
            },
            body: JSON.stringify({ status })
        });
        
        if (response.ok) {
            showNotification('تم تحديث الحالة بنجاح', 'success');
        }
    } catch (error) {
        console.error('خطأ في تحديث الحالة:', error);
        showNotification('حدث خطأ أثناء التحديث', 'error');
    }
};
```

### CSS

- استخدم BEM methodology
- استخدم متغيرات CSS للألوان والقياسات
- اكتب تعليقات باللغة العربية

```css
/* متغيرات الألوان */
:root {
    --primary-color: #0ea5e9;
    --secondary-color: #64748b;
    --success-color: #10b981;
    --danger-color: #ef4444;
    --warning-color: #f59e0b;
}

/* بطاقة الوظيفة */
.job-card {
    background: var(--white);
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 1.5rem;
    transition: all 0.3s ease;
}

.job-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.job-card__header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.job-card__title {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--primary-color);
}
```

## كتابة الاختبارات

### PHP Tests

```php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Job;
use App\Models\User;

class JobTest extends TestCase
{
    public function test_user_can_view_jobs()
    {
        // إنشاء مستخدم
        $user = User::factory()->create();
        
        // إنشاء وظائف
        Job::factory()->count(5)->create();
        
        // زيارة صفحة الوظائف
        $response = $this->actingAs($user)
            ->get('/jobs');
        
        // التحقق من الاستجابة
        $response->assertStatus(200);
        $response->assertSee('الوظائف المتاحة');
    }
    
    public function test_user_can_apply_for_job()
    {
        // إنشاء مستخدم ووظيفة
        $user = User::factory()->create();
        $job = Job::factory()->create();
        
        // التقديم على الوظيفة
        $response = $this->actingAs($user)
            ->post("/jobs/{$job->id}/apply");
        
        // التحقق من النجاح
        $response->assertStatus(200);
        $this->assertDatabaseHas('applications', [
            'user_id' => $user->id,
            'job_id' => $job->id
        ]);
    }
}
```

### JavaScript Tests

```javascript
// tests/job.test.js
import { render, screen, fireEvent } from '@testing-library/react';
import { JobCard } from '../components/JobCard';

describe('JobCard Component', () => {
    test('يعرض معلومات الوظيفة بشكل صحيح', () => {
        const job = {
            id: 1,
            title: 'مطور ويب',
            company: 'شركة التقنية',
            salary: '15,000 - 25,000 ريال'
        };
        
        render(<JobCard job={job} />);
        
        expect(screen.getByText('مطور ويب')).toBeInTheDocument();
        expect(screen.getByText('شركة التقنية')).toBeInTheDocument();
        expect(screen.getByText('15,000 - 25,000 ريال')).toBeInTheDocument();
    });
    
    test('يستجيب للنقر على زر التقديم', () => {
        const mockApply = jest.fn();
        const job = { id: 1, title: 'مطور ويب' };
        
        render(<JobCard job={job} onApply={mockApply} />);
        
        fireEvent.click(screen.getByText('تقديم طلب'));
        
        expect(mockApply).toHaveBeenCalledWith(1);
    });
});
```

## كتابة الوثائق

### API Documentation

```php
/**
 * @group Jobs
 * 
 * APIs for managing jobs
 */
class JobController extends Controller
{
    /**
     * عرض قائمة الوظائف
     * 
     * @urlParam page integer صفحة النتائج. Example: 1
     * @queryParam category string مجال الوظيفة. Example: technology
     * @queryParam location string موقع الوظيفة. Example: الرياض
     * 
     * @response 200 {
     *   "data": [
     *     {
     *       "id": 1,
     *       "title": "مطور ويب",
     *       "company": "شركة التقنية",
     *       "location": "الرياض",
     *       "salary": "15,000 - 25,000 ريال",
     *       "created_at": "2024-01-15T10:30:00Z"
     *     }
     *   ],
     *   "meta": {
     *     "current_page": 1,
     *     "total": 50,
     *     "per_page": 20
     *   }
     * }
     */
    public function index(Request $request)
    {
        // Implementation
    }
}
```

### Component Documentation

```javascript
/**
 * بطاقة عرض الوظيفة
 * 
 * @component JobCard
 * @description مكون لعرض معلومات الوظيفة في بطاقة منسقة
 * 
 * @param {Object} job - بيانات الوظيفة
 * @param {number} job.id - معرف الوظيفة
 * @param {string} job.title - عنوان الوظيفة
 * @param {string} job.company - اسم الشركة
 * @param {string} job.location - موقع الوظيفة
 * @param {string} job.salary - الراتب
 * @param {Function} onApply - دالة التقديم على الوظيفة
 * @param {Function} onBookmark - دالة حفظ الوظيفة
 * 
 * @example
 * <JobCard 
 *   job={jobData}
 *   onApply={(id) => handleApply(id)}
 *   onBookmark={(id) => handleBookmark(id)}
 * />
 */
export const JobCard = ({ job, onApply, onBookmark }) => {
    // Component implementation
};
```

## إرشادات عامة

### 1. رسائل Commit

استخدم نمط Conventional Commits:

```
feat: إضافة ميزة البحث المتقدم
fix: إصلاح مشكلة في تسجيل الدخول
docs: تحديث وثائق API
style: تحسين تنسيق الكود
refactor: إعادة هيكلة مكون الوظائف
test: إضافة اختبارات للملف الشخصي
chore: تحديث التبعيات
```

### 2. Pull Request Template

```markdown
## وصف التغييرات
وصف مختصر للتغييرات المضافة

## نوع التغيير
- [ ] إصلاح خطأ
- [ ] ميزة جديدة
- [ ] تحسين الأداء
- [ ] تحديث الوثائق
- [ ] تحسينات أخرى

## الاختبارات
- [ ] تم اختبار الكود محلياً
- [ ] تم إضافة اختبارات جديدة
- [ ] جميع الاختبارات تمر بنجاح

## لقطات الشاشة (إن وجدت)
أضف لقطات شاشة للتغييرات البصرية

## معلومات إضافية
أي معلومات إضافية مهمة
```

### 3. مراجعة الكود

- تأكد من أن الكود يتبع المعايير
- تحقق من الأمان
- تأكد من الأداء
- تحقق من التوافق مع المتصفحات

## الحصول على المساعدة

إذا كنت بحاجة إلى مساعدة:

- افتح issue جديد
- تواصل مع الفريق عبر البريد الإلكتروني
- انضم إلى قناة Slack الخاصة بالمشروع

## شكراً لك!

شكراً لك على مساهمتك في منصة فرصتي! مساهماتك تساعد في جعل المنصة أفضل للجميع. 