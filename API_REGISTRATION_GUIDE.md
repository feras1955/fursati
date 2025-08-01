# دليل استخدام API التسجيل - منصة فُرصتي

## 1. تسجيل مستخدم جديد

### المسار
```
POST /ar/api/auth/register
```

### Headers المطلوبة
```
Content-Type: application/json
Accept: application/json
```

### البيانات المطلوبة (JSON)
```json
{
    "name": "أحمد محمد",
    "email": "ahmed@example.com",
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

### البيانات الاختيارية
- `education_level_id` - معرف مستوى التعليم
- `work_experience` - سنوات الخبرة (افتراضي: 0)
- `phone` - رقم الهاتف
- `bio` - نبذة شخصية

### قيم role المسموحة
- `job_seeker` - باحث عن عمل
- `business_man` - صاحب عمل

### الاستجابة الناجحة (201)
```json
{
    "success": true,
    "message": "تم التسجيل بنجاح",
    "data": {
        "user": {
            "id": 1,
            "name": "أحمد محمد",
            "email": "ahmed@example.com",
            "role": "job_seeker",
            "country_id": 1,
            "education_level_id": 3,
            "work_experience": 2,
            "phone": "+966501234567",
            "bio": "مطور ويب ذو خبرة 5 سنوات",
            "created_at": "2024-01-01T12:00:00.000000Z",
            "updated_at": "2024-01-01T12:00:00.000000Z"
        },
        "token": "1|abc123def456..."
    }
}
```

### الاستجابة في حالة الخطأ (422)
```json
{
    "success": false,
    "message": "بيانات غير صحيحة",
    "errors": {
        "email": ["البريد الإلكتروني مستخدم بالفعل"],
        "password": ["كلمة المرور يجب أن تكون 8 أحرف على الأقل"]
    }
}
```

## 2. تسجيل الدخول

### المسار
```
POST /ar/api/auth/login
```

### البيانات المطلوبة
```json
{
    "email": "ahmed@example.com",
    "password": "password123"
}
```

### الاستجابة الناجحة (200)
```json
{
    "success": true,
    "message": "تم تسجيل الدخول بنجاح",
    "data": {
        "user": {
            "id": 1,
            "name": "أحمد محمد",
            "email": "ahmed@example.com",
            "role": "job_seeker"
        },
        "token": "1|abc123def456..."
    }
}
```

## 3. استخدام التوكن

بعد الحصول على التوكن من التسجيل أو تسجيل الدخول، استخدمه في جميع الطلبات المحمية:

### Header المطلوب
```
Authorization: Bearer 1|abc123def456...
```

## 4. أمثلة باستخدام cURL

### تسجيل مستخدم جديد
```bash
curl -X POST http://localhost:8000/ar/api/auth/register \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "name": "أحمد محمد",
    "email": "ahmed@example.com",
    "password": "password123",
    "password_confirmation": "password123",
    "role": "job_seeker",
    "country_id": 1,
    "education_level_id": 3,
    "work_experience": 2,
    "phone": "+966501234567",
    "bio": "مطور ويب ذو خبرة 5 سنوات"
  }'
```

### تسجيل الدخول
```bash
curl -X POST http://localhost:8000/ar/api/auth/login \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "email": "ahmed@example.com",
    "password": "password123"
  }'
```

### استخدام التوكن (مثال: جلب الوظائف)
```bash
curl -X GET http://localhost:8000/ar/api/job-seeker/all-jobs \
  -H "Authorization: Bearer 1|abc123def456..." \
  -H "Accept: application/json"
```

## 5. أمثلة باستخدام JavaScript

### تسجيل مستخدم جديد
```javascript
const registerUser = async () => {
    try {
        const response = await fetch('http://localhost:8000/ar/api/auth/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                name: 'أحمد محمد',
                email: 'ahmed@example.com',
                password: 'password123',
                password_confirmation: 'password123',
                role: 'job_seeker',
                country_id: 1,
                education_level_id: 3,
                work_experience: 2,
                phone: '+966501234567',
                bio: 'مطور ويب ذو خبرة 5 سنوات'
            })
        });

        const data = await response.json();
        
        if (data.success) {
            console.log('تم التسجيل بنجاح:', data.data.user);
            console.log('التوكن:', data.data.token);
            // حفظ التوكن للاستخدام لاحقاً
            localStorage.setItem('token', data.data.token);
        } else {
            console.error('خطأ في التسجيل:', data.message);
        }
    } catch (error) {
        console.error('خطأ في الاتصال:', error);
    }
};
```

### تسجيل الدخول
```javascript
const loginUser = async () => {
    try {
        const response = await fetch('http://localhost:8000/ar/api/auth/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                email: 'ahmed@example.com',
                password: 'password123'
            })
        });

        const data = await response.json();
        
        if (data.success) {
            console.log('تم تسجيل الدخول بنجاح:', data.data.user);
            localStorage.setItem('token', data.data.token);
        } else {
            console.error('خطأ في تسجيل الدخول:', data.message);
        }
    } catch (error) {
        console.error('خطأ في الاتصال:', error);
    }
};
```

### استخدام التوكن
```javascript
const getJobs = async () => {
    const token = localStorage.getItem('token');
    
    try {
        const response = await fetch('http://localhost:8000/ar/api/job-seeker/all-jobs', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json'
            }
        });

        const data = await response.json();
        
        if (data.success) {
            console.log('الوظائف:', data.data);
        } else {
            console.error('خطأ في جلب الوظائف:', data.message);
        }
    } catch (error) {
        console.error('خطأ في الاتصال:', error);
    }
};
```

## 6. ملاحظات مهمة

1. **التوكن**: احفظ التوكن بشكل آمن واستخدمه في جميع الطلبات المحمية
2. **التحقق**: تأكد من صحة البيانات قبل الإرسال
3. **الأمان**: لا تشارك التوكن مع أي شخص
4. **التحديث**: يمكن تحديث بيانات المستخدم لاحقاً
5. **الحذف**: يمكن حذف الحساب عند الحاجة

## 7. رموز الحالة (Status Codes)

- `200` - نجح الطلب
- `201` - تم إنشاء المورد بنجاح (التسجيل)
- `400` - طلب غير صحيح
- `401` - غير مصرح (يحتاج توثيق)
- `422` - بيانات غير صحيحة
- `500` - خطأ في الخادم 