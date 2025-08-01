# توثيق API - منصة فُرصتي

## نظرة عامة

هذا التوثيق يغطي جميع نقاط النهاية (endpoints) المتاحة في API منصة فُرصتي.

## Base URL
```
http://localhost:8000/ar/api
```

## التوثيق (Authentication)

### تسجيل الدخول
```http
POST /auth/login
```

**Body:**
```json
{
    "email": "user@example.com",
    "password": "password123"
}
```

**Response:**
```json
{
    "success": true,
    "message": "تم تسجيل الدخول بنجاح",
    "data": {
        "user": {
            "id": 1,
            "name": "أحمد محمد",
            "email": "user@example.com",
            "role": "job_seeker"
        },
        "token": "1|abc123..."
    }
}
```

### تسجيل مستخدم جديد
```http
POST /auth/register
```

**Body:**
```json
{
    "name": "أحمد محمد",
    "email": "user@example.com",
    "password": "password123",
    "password_confirmation": "password123",
    "role": "job_seeker",
    "country_id": 1,
    "education_level_id": 3,
    "work_experience": 2,
    "phone": "+966501234567",
    "bio": "مطور ويب ذو خبرة 5 سنوات"
}
```

### تسجيل الخروج
```http
POST /auth/logout
```
**Headers:** `Authorization: Bearer {token}`

### معلومات المستخدم
```http
GET /auth/user
```
**Headers:** `Authorization: Bearer {token}`

## الوظائف (Jobs)

### عرض جميع الوظائف
```http
GET /job-seeker/all-jobs
```
**Headers:** `Authorization: Bearer {token}`

**Query Parameters:**
- `title` - عنوان الوظيفة
- `work_place` - مكان العمل
- `work_field_id` - مجال العمل
- `country_of_graduation` - دولة التخرج
- `country_of_residence` - دولة الإقامة
- `education_level_id` - مستوى التعليم
- `gender_preference` - تفضيل الجنس (male, female, all)
- `work_experience` - سنوات الخبرة
- `business_man_id` - معرف صاحب العمل
- `from_date` - تاريخ البداية (YYYY-MM-DD)
- `to_date` - تاريخ النهاية (YYYY-MM-DD)

### تفاصيل وظيفة محددة
```http
GET /job-seeker/job-details/{id}
```
**Headers:** `Authorization: Bearer {token}`

### إضافة/إزالة من المفضلة
```http
POST /job-seeker/jobs/{id}/mark-favorite
```
**Headers:** `Authorization: Bearer {token}`

### عرض الوظائف المفضلة
```http
GET /job-seeker/favorite-jobs
```
**Headers:** `Authorization: Bearer {token}`

### التقدم لوظيفة
```http
POST /job-seeker/jobs/applied/{id}
```
**Headers:** `Authorization: Bearer {token}`

**Body (multipart/form-data):**
- `video` - ملف الفيديو (mp4, avi, mov)
- `cover_letter` - خطاب التقديم (اختياري)

## الشركات (Companies)

### عرض جميع الشركات
```http
GET /all-companies
```

## الأسئلة الشائعة (FAQs)

### عرض جميع الأسئلة الشائعة
```http
GET /faqs
```

## الشروط والسياسات (Policies)

### عرض جميع الشروط والسياسات
```http
GET /policies
```

### عرض سياسة محددة
```http
GET /policies/{type}
```
حيث `{type}` يمكن أن يكون: `terms`, `privacy`, `conditions`

## أمثلة الاستخدام

### مثال: تسجيل دخول
```bash
curl -X POST http://localhost:8000/ar/api/auth/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "user@example.com",
    "password": "password123"
  }'
```

### مثال: جلب الوظائف
```bash
curl -X GET "http://localhost:8000/ar/api/job-seeker/all-jobs?title=مطور&work_field_id=1" \
  -H "Authorization: Bearer YOUR_TOKEN_HERE"
```

### مثال: التقدم لوظيفة
```bash
curl -X POST http://localhost:8000/ar/api/job-seeker/jobs/applied/1 \
  -H "Authorization: Bearer YOUR_TOKEN_HERE" \
  -F "video=@/path/to/video.mp4" \
  -F "cover_letter=أنا مهتم بهذه الوظيفة"
```

## رموز الحالة (Status Codes)

- `200` - نجح الطلب
- `201` - تم إنشاء المورد بنجاح
- `400` - طلب غير صحيح
- `401` - غير مصرح (يحتاج توثيق)
- `404` - المورد غير موجود
- `422` - بيانات غير صحيحة
- `500` - خطأ في الخادم

## ملاحظات مهمة

1. **التوثيق**: معظم endpoints تتطلب Bearer Token في header
2. **الفلترة**: يمكن استخدام query parameters للفلترة
3. **الملفات**: يتم رفع الفيديوهات كـ multipart/form-data
4. **الترقيم**: يتم ترقيم النتائج تلقائياً
5. **التحقق**: يتم التحقق من صحة البيانات قبل المعالجة

## تشغيل المشروع

```bash
# تشغيل الهجرات
php artisan migrate

# إضافة البيانات التجريبية
php artisan db:seed

# تشغيل الخادم
php artisan serve
``` 