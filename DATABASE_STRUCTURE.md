# بنية قاعدة البيانات - فُرصتي

## الجداول الرئيسية

### 1. جدول المستخدمين (users)
- `id` - المعرف الفريد
- `name` - اسم المستخدم
- `email` - البريد الإلكتروني (فريد)
- `password` - كلمة المرور
- `role` - نوع المستخدم (job_seeker أو business_man)
- `country_id` - معرف الدولة (مرتبط بجدول countries)
- `education_level_id` - مستوى التعليم (مرتبط بجدول education_levels)
- `work_experience` - سنوات الخبرة
- `phone` - رقم الهاتف
- `bio` - نبذة شخصية
- `profile_image` - صورة الملف الشخصي
- `email_verified_at` - تاريخ التحقق من البريد
- `remember_token` - رمز التذكر
- `created_at`, `updated_at` - تواريخ الإنشاء والتحديث

### 2. جدول الدول (countries)
- `id` - المعرف الفريد
- `name` - اسم الدولة
- `code` - رمز الدولة (3 أحرف)
- `created_at`, `updated_at` - تواريخ الإنشاء والتحديث

### 3. جدول مستويات التعليم (education_levels)
- `id` - المعرف الفريد
- `name` - اسم مستوى التعليم
- `created_at`, `updated_at` - تواريخ الإنشاء والتحديث

### 4. جدول مجالات العمل (work_fields)
- `id` - المعرف الفريد
- `name` - اسم مجال العمل
- `created_at`, `updated_at` - تواريخ الإنشاء والتحديث

### 5. جدول الشركات (companies)
- `id` - المعرف الفريد
- `name` - اسم الشركة
- `description` - وصف الشركة
- `logo` - شعار الشركة
- `website` - موقع الشركة
- `email` - البريد الإلكتروني
- `phone` - رقم الهاتف
- `address` - العنوان
- `created_at`, `updated_at` - تواريخ الإنشاء والتحديث

### 6. جدول الوظائف (jobs)
- `id` - المعرف الفريد
- `title` - عنوان الوظيفة
- `work_place` - مكان العمل
- `gender_preference` - تفضيل الجنس (male, female, all)
- `education_level_id` - مستوى التعليم المطلوب
- `work_experience` - سنوات الخبرة المطلوبة
- `work_field_id` - مجال العمل
- `country_of_graduation` - دولة التخرج
- `country_of_residence` - دولة الإقامة
- `business_man_id` - معرف صاحب العمل
- `description` - وصف الوظيفة
- `salary_min` - الحد الأدنى للراتب
- `salary_max` - الحد الأقصى للراتب
- `status` - حالة الوظيفة (active, inactive, closed)
- `created_at`, `updated_at` - تواريخ الإنشاء والتحديث

### 7. جدول طلبات التوظيف (job_applications)
- `id` - المعرف الفريد
- `job_id` - معرف الوظيفة
- `user_id` - معرف المتقدم
- `video` - مسار الفيديو المُرسل
- `cover_letter` - خطاب التقديم
- `status` - حالة الطلب (pending, reviewed, accepted, rejected)
- `notes` - ملاحظات من صاحب العمل
- `created_at`, `updated_at` - تواريخ الإنشاء والتحديث

### 8. جدول الوظائف المفضلة (favorite_jobs)
- `id` - المعرف الفريد
- `job_id` - معرف الوظيفة
- `user_id` - معرف المستخدم
- `created_at`, `updated_at` - تواريخ الإنشاء والتحديث

### 9. جدول الأسئلة الشائعة (faqs)
- `id` - المعرف الفريد
- `question` - السؤال
- `answer` - الإجابة
- `order` - ترتيب السؤال
- `is_active` - هل السؤال نشط
- `created_at`, `updated_at` - تواريخ الإنشاء والتحديث

### 10. جدول الشروط والسياسات (policies)
- `id` - المعرف الفريد
- `title` - العنوان
- `content` - المحتوى
- `type` - نوع السياسة (terms, privacy, conditions)
- `is_active` - هل السياسة نشطة
- `created_at`, `updated_at` - تواريخ الإنشاء والتحديث

## العلاقات بين الجداول

### علاقات جدول المستخدمين:
- `users` → `countries` (belongsTo)
- `users` → `education_levels` (belongsTo)
- `users` → `jobs` (hasMany - كصاحب عمل)
- `users` → `job_applications` (hasMany)
- `users` → `favorite_jobs` (hasMany)

### علاقات جدول الوظائف:
- `jobs` → `users` (belongsTo - صاحب العمل)
- `jobs` → `education_levels` (belongsTo)
- `jobs` → `work_fields` (belongsTo)
- `jobs` → `countries` (belongsTo - دولة التخرج)
- `jobs` → `countries` (belongsTo - دولة الإقامة)
- `jobs` → `job_applications` (hasMany)
- `jobs` → `favorite_jobs` (hasMany)

### علاقات الجداول الأخرى:
- `job_applications` → `jobs` (belongsTo)
- `job_applications` → `users` (belongsTo)
- `favorite_jobs` → `jobs` (belongsTo)
- `favorite_jobs` → `users` (belongsTo)

## القيود والضوابط

1. **منع التطبيق المتكرر**: لا يمكن للمستخدم التقدم لنفس الوظيفة مرتين
2. **منع الإضافة المتكررة للمفضلة**: لا يمكن إضافة نفس الوظيفة للمفضلة مرتين
3. **البريد الإلكتروني فريد**: لا يمكن تكرار البريد الإلكتروني للمستخدمين
4. **حذف متتابع**: عند حذف الوظيفة يتم حذف جميع الطلبات والمفضلة المرتبطة بها

## تشغيل قاعدة البيانات

```bash
# تشغيل الهجرات
php artisan migrate

# إضافة البيانات التجريبية
php artisan db:seed
```

## API Endpoints المتوقعة

بناءً على ملف Postman Collection، هذه هي النقاط النهائية المتوقعة:

1. `GET /ar/api/job-seeker/all-jobs` - عرض جميع الوظائف مع فلترة
2. `GET /ar/api/job-seeker/job-details/{id}` - تفاصيل وظيفة محددة
3. `POST /ar/api/job-seeker/jobs/{id}/mark-favorite` - إضافة وظيفة للمفضلة
4. `GET /ar/api/job-seeker/favorite-jobs` - عرض الوظائف المفضلة
5. `POST /ar/api/job-seeker/jobs/applied/{id}` - التقدم لوظيفة
6. `GET /ar/api/all-companies` - عرض جميع الشركات
7. `GET /ar/api/faqs` - عرض الأسئلة الشائعة
8. `GET /ar/api/policies` - عرض الشروط والسياسات 