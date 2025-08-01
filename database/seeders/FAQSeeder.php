<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'كيف يمكنني التسجيل في الموقع؟',
                'answer' => 'يمكنك التسجيل من خلال الضغط على زر "إنشاء حساب" وملء البيانات المطلوبة.',
                'order' => 1,
            ],
            [
                'question' => 'كيف يمكنني التقدم لوظيفة؟',
                'answer' => 'بعد العثور على الوظيفة المناسبة، اضغط على "تقدم للوظيفة" وقم برفع الفيديو المطلوب.',
                'order' => 2,
            ],
            [
                'question' => 'ما هي متطلبات الفيديو؟',
                'answer' => 'يجب أن يكون الفيديو قصيراً ومختصراً يوضح خبراتك ومؤهلاتك للوظيفة.',
                'order' => 3,
            ],
            [
                'question' => 'كيف يمكنني إضافة وظيفة؟',
                'answer' => 'يجب أن تكون مسجل كصاحب عمل، ثم يمكنك إضافة الوظائف من لوحة التحكم.',
                'order' => 4,
            ],
            [
                'question' => 'هل الخدمة مجانية؟',
                'answer' => 'نعم، الخدمة مجانية لجميع المستخدمين.',
                'order' => 5,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
} 