# منصة فرصتي - منصة الوظائف العربية

## نظرة عامة

منصة فرصتي هي منصة عربية رائدة للوظائف تهدف إلى ربط الباحثين عن عمل بأفضل الفرص الوظيفية في مختلف المجالات. تم تطوير المنصة باستخدام Laravel وتم تصميمها لتكون سهلة الاستخدام ومتجاوبة مع جميع الأجهزة.

## المميزات الرئيسية

### للمستخدمين
- **البحث المتقدم**: البحث عن الوظائف باستخدام فلاتر متقدمة
- **الملف الشخصي**: إنشاء وتحديث الملف الشخصي والسيرة الذاتية
- **المحفوظات**: حفظ الوظائف المفضلة للرجوع إليها لاحقاً
- **الإشعارات**: استقبال إشعارات فورية بالوظائف الجديدة
- **التقديم السريع**: التقديم على الوظائف بسهولة
- **تتبع الطلبات**: متابعة حالة طلبات التقديم

### للشركات
- **نشر الوظائف**: نشر الوظائف بسهولة
- **إدارة الطلبات**: مراجعة وإدارة طلبات التقديم
- **إحصائيات متقدمة**: تحليلات وإحصائيات مفصلة
- **إدارة الحساب**: إدارة معلومات الشركة والإعدادات

## التقنيات المستخدمة

### Backend
- **Laravel 10**: إطار العمل الرئيسي
- **PHP 8.1+**: لغة البرمجة
- **MySQL**: قاعدة البيانات
- **Redis**: التخزين المؤقت
- **Queue**: معالجة المهام في الخلفية

### Frontend
- **Blade Templates**: قوالب Laravel
- **CSS3**: التصميم والتنسيق
- **JavaScript (ES6+)**: التفاعل والوظائف
- **Font Awesome**: الأيقونات
- **Google Fonts**: الخطوط العربية

### الأمان
- **Laravel Sanctum**: مصادقة API
- **CSRF Protection**: حماية من هجمات CSRF
- **Input Validation**: التحقق من المدخلات
- **SQL Injection Protection**: حماية من حقن SQL

## هيكل المشروع

```
fursati/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── BookmarkController.php
│   │   │   ├── FAQController.php
│   │   │   ├── HelpController.php
│   │   │   ├── HomeController.php
│   │   │   ├── JobController.php
│   │   │   ├── ProfileController.php
│   │   │   └── SettingsController.php
│   │   └── Middleware/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Job.php
│   │   ├── Company.php
│   │   ├── Application.php
│   │   └── Bookmark.php
│   └── Services/
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── app.blade.php
│   │   ├── auth/
│   │   │   ├── login.blade.php
│   │   │   └── register.blade.php
│   │   ├── jobs/
│   │   │   ├── index.blade.php
│   │   │   └── show.blade.php
│   │   ├── profile/
│   │   │   └── index.blade.php
│   │   ├── settings/
│   │   │   └── index.blade.php
│   │   ├── bookmarks/
│   │   │   └── index.blade.php
│   │   ├── faq/
│   │   │   └── index.blade.php
│   │   ├── help/
│   │   │   └── index.blade.php
│   │   └── home.blade.php
│   ├── css/
│   │   └── app.css
│   └── js/
│       └── app.js
├── routes/
│   └── web.php
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
│   ├── images/
│   └── files/
└── README.md
```

## الصفحات المتاحة

### الصفحات العامة
1. **الصفحة الرئيسية** (`/`) - عرض الوظائف المميزة والإحصائيات
2. **صفحة الوظائف** (`/jobs`) - البحث والتصفية في الوظائف
3. **تفاصيل الوظيفة** (`/jobs/{id}`) - عرض تفاصيل وظيفة محددة
4. **الأسئلة الشائعة** (`/faq`) - الأسئلة الشائعة والإجابات
5. **مركز المساعدة** (`/help`) - الدعم الفني وطرق التواصل

### صفحات المستخدم (تتطلب تسجيل دخول)
6. **الملف الشخصي** (`/profile`) - عرض وتعديل المعلومات الشخصية
7. **الإعدادات** (`/settings`) - إعدادات الحساب والخصوصية
8. **المحفوظات** (`/bookmarks`) - الوظائف المحفوظة

### صفحات المصادقة
9. **تسجيل الدخول** (`/login`) - تسجيل الدخول للمستخدمين
10. **إنشاء حساب** (`/register`) - إنشاء حساب جديد

## التثبيت والإعداد

### المتطلبات الأساسية
- PHP 8.1 أو أحدث
- Composer
- MySQL 8.0 أو أحدث
- Node.js و NPM (للتطوير)

### خطوات التثبيت

1. **استنساخ المشروع**
```bash
git clone https://github.com/your-username/fursati.git
cd fursati
```

2. **تثبيت التبعيات**
```bash
composer install
npm install
```

3. **إعداد ملف البيئة**
```bash
cp .env.example .env
php artisan key:generate
```

4. **تكوين قاعدة البيانات**
```bash
# تعديل ملف .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fursati
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. **تشغيل الهجرات**
```bash
php artisan migrate
```

6. **ملء قاعدة البيانات بالبيانات التجريبية**
```bash
php artisan db:seed
```

7. **إنشاء رابط رمزي للملفات العامة**
```bash
php artisan storage:link
```

8. **تشغيل الخادم المحلي**
```bash
php artisan serve
```

### إعدادات إضافية

#### إعداد البريد الإلكتروني
```bash
# تعديل ملف .env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

#### إعداد التخزين المؤقت
```bash
# تعديل ملف .env
CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis
```

## الاستخدام

### للمطورين

#### تشغيل الاختبارات
```bash
php artisan test
```

#### تشغيل المهام في الخلفية
```bash
php artisan queue:work
```

#### مراقبة السجلات
```bash
tail -f storage/logs/laravel.log
```

### للمستخدمين النهائيين

1. **إنشاء حساب جديد**: انتقل إلى `/register` واملأ النموذج
2. **تسجيل الدخول**: انتقل إلى `/login` وأدخل بياناتك
3. **البحث عن وظائف**: استخدم صفحة الوظائف للبحث والتصفية
4. **التقديم على وظائف**: انقر على "تقديم طلب" في أي وظيفة
5. **إدارة الملف الشخصي**: انتقل إلى الملف الشخصي لتحديث معلوماتك

## المساهمة

نرحب بمساهماتكم! يرجى اتباع الخطوات التالية:

1. Fork المشروع
2. إنشاء فرع جديد للميزة (`git checkout -b feature/AmazingFeature`)
3. Commit التغييرات (`git commit -m 'Add some AmazingFeature'`)
4. Push إلى الفرع (`git push origin feature/AmazingFeature`)
5. فتح Pull Request

## الترخيص

هذا المشروع مرخص تحت رخصة MIT. راجع ملف `LICENSE` للتفاصيل.

## الدعم

إذا واجهت أي مشاكل أو لديك أسئلة:

- **البريد الإلكتروني**: support@fursati.com
- **الهاتف**: +966 11 123 4567
- **الموقع**: الرياض، المملكة العربية السعودية

## التحديثات القادمة

- [ ] تطبيق جوال (iOS و Android)
- [ ] نظام الدردشة المباشرة
- [ ] مؤتمرات الفيديو للمقابلات
- [ ] نظام التقييم والمراجعات
- [ ] دعم اللغات الإضافية
- [ ] نظام المدفوعات
- [ ] API للمطورين

## الإحصائيات

- **50,000+** وظيفة متاحة
- **10,000+** شركة شريكة
- **100,000+** مستخدم نشط
- **95%** معدل رضا المستخدمين

---

**منصة فرصتي** - ربط المواهب بالفرص المثالية
