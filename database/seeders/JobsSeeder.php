<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JobsSeeder extends Seeder
{
    public function run()
    {
        $jobs = [
            [
                'title' => 'مطور تطبيقات الجوال - Flutter',
                'work_place' => 'الرياض، السعودية',
                'gender_preference' => 'all',
                'education_level_id' => 1, // بكالوريوس
                'work_experience' => 3,
                'work_field_id' => 1, // تقنية المعلومات
                'country_of_graduation' => 1, // السعودية
                'country_of_residence' => 1, // السعودية
                'business_man_id' => 1,
                'description' => 'نبحث عن مطور تطبيقات جوال محترف باستخدام Flutter لتطوير تطبيقات عالية الجودة. المطلوب خبرة في Dart، REST APIs، وإدارة الحالة.',
                'salary_min' => 8000,
                'salary_max' => 12000,
                'job_type' => 'دوام كامل',
                'skills' => 'Flutter, Dart, Firebase, REST APIs, Git',
                'requirements' => 'خبرة 3 سنوات في Flutter، معرفة بـ Firebase، إجادة اللغة الإنجليزية',
                'status' => 'active'
            ],
            [
                'title' => 'مصمم جرافيك إبداعي',
                'work_place' => 'جدة، السعودية',
                'gender_preference' => 'all',
                'education_level_id' => 2, // دبلوم
                'work_experience' => 2,
                'work_field_id' => 2, // التصميم والفنون
                'country_of_graduation' => 1,
                'country_of_residence' => 1,
                'business_man_id' => 1,
                'description' => 'مطلوب مصمم جرافيك مبدع للعمل على مشاريع متنوعة تشمل الهوية البصرية، التصميم الرقمي، والمطبوعات. بيئة عمل إبداعية ومحفزة.',
                'salary_min' => 5000,
                'salary_max' => 8000,
                'job_type' => 'دوام كامل',
                'skills' => 'Photoshop, Illustrator, InDesign, After Effects, Figma',
                'requirements' => 'خبرة في برامج Adobe، حس فني عالي، القدرة على العمل تحت الضغط',
                'status' => 'active'
            ],
            [
                'title' => 'محاسب مالي - CPA',
                'work_place' => 'الدمام، السعودية',
                'gender_preference' => 'all',
                'education_level_id' => 1, // بكالوريوس
                'work_experience' => 5,
                'work_field_id' => 3, // المحاسبة والمالية
                'country_of_graduation' => 1,
                'country_of_residence' => 1,
                'business_man_id' => 1,
                'description' => 'نبحث عن محاسب مالي معتمد للانضمام لفريق المحاسبة. المطلوب خبرة في إعداد التقارير المالية، التدقيق، والامتثال للمعايير المحاسبية.',
                'salary_min' => 7000,
                'salary_max' => 10000,
                'job_type' => 'دوام كامل',
                'skills' => 'Excel المتقدم, SAP, QuickBooks, التقارير المالية, التدقيق',
                'requirements' => 'شهادة CPA أو ما يعادلها، خبرة 5 سنوات، إتقان برامج المحاسبة',
                'status' => 'active'
            ],
            [
                'title' => 'مهندس شبكات - Cisco',
                'work_place' => 'عن بُعد',
                'gender_preference' => 'all',
                'education_level_id' => 1, // بكالوريوس
                'work_experience' => 4,
                'work_field_id' => 1, // تقنية المعلومات
                'country_of_graduation' => 1,
                'country_of_residence' => 1,
                'business_man_id' => 1,
                'description' => 'مطلوب مهندس شبكات للعمل عن بُعد. المسؤوليات تشمل تصميم وإدارة الشبكات، استكشاف الأخطاء، وضمان الأمان السيبراني.',
                'salary_min' => 9000,
                'salary_max' => 13000,
                'job_type' => 'عن بُعد',
                'skills' => 'Cisco, CCNA, CCNP, Network Security, VPN, Firewall',
                'requirements' => 'شهادة CCNA كحد أدنى، خبرة في Cisco، معرفة بأمان الشبكات',
                'status' => 'active'
            ],
            [
                'title' => 'مدير تسويق رقمي',
                'work_place' => 'الرياض، السعودية',
                'gender_preference' => 'all',
                'education_level_id' => 1, // بكالوريوس
                'work_experience' => 6,
                'work_field_id' => 4, // التسويق والمبيعات
                'country_of_graduation' => 1,
                'country_of_residence' => 1,
                'business_man_id' => 1,
                'description' => 'نبحث عن مدير تسويق رقمي لقيادة استراتيجيات التسويق الإلكتروني. المطلوب خبرة في إدارة الحملات الإعلانية وتحليل البيانات.',
                'salary_min' => 10000,
                'salary_max' => 15000,
                'job_type' => 'دوام كامل',
                'skills' => 'Google Ads, Facebook Ads, SEO, Analytics, Social Media',
                'requirements' => 'خبرة 6 سنوات في التسويق الرقمي، معرفة بأدوات التحليل، إبداع في الحملات',
                'status' => 'active'
            ],
            [
                'title' => 'مطور واجهات أمامية - React',
                'work_place' => 'جدة، السعودية',
                'gender_preference' => 'all',
                'education_level_id' => 1, // بكالوريوس
                'work_experience' => 3,
                'work_field_id' => 1, // تقنية المعلومات
                'country_of_graduation' => 1,
                'country_of_residence' => 1,
                'business_man_id' => 1,
                'description' => 'مطلوب مطور واجهات أمامية متخصص في React لتطوير تطبيقات ويب تفاعلية وسريعة الاستجابة. بيئة عمل تقنية متطورة.',
                'salary_min' => 7000,
                'salary_max' => 11000,
                'job_type' => 'دوام كامل',
                'skills' => 'React, JavaScript, TypeScript, CSS3, HTML5, Redux',
                'requirements' => 'خبرة 3 سنوات في React، معرفة بـ TypeScript، فهم لـ UX/UI',
                'status' => 'active'
            ],
            [
                'title' => 'مدرس لغة إنجليزية - أونلاين',
                'work_place' => 'عن بُعد',
                'gender_preference' => 'female',
                'education_level_id' => 1, // بكالوريوس
                'work_experience' => 2,
                'work_field_id' => 5, // التعليم والتدريب
                'country_of_graduation' => 1,
                'country_of_residence' => 1,
                'business_man_id' => 1,
                'description' => 'مطلوبة مدرسة لغة إنجليزية للتدريس أونلاين. العمل مرن ومناسب للأمهات. المطلوب خبرة في التدريس وإجادة تامة للإنجليزية.',
                'salary_min' => 3000,
                'salary_max' => 6000,
                'job_type' => 'دوام جزئي',
                'skills' => 'English Teaching, Online Education, IELTS, TOEFL',
                'requirements' => 'إجادة تامة للإنجليزية، خبرة في التدريس، شهادة تدريس معتمدة مفضلة',
                'status' => 'active'
            ],
            [
                'title' => 'فني صيانة أجهزة طبية',
                'work_place' => 'الرياض، السعودية',
                'gender_preference' => 'male',
                'education_level_id' => 2, // دبلوم
                'work_experience' => 4,
                'work_field_id' => 6, // الصحة والطب
                'country_of_graduation' => 1,
                'country_of_residence' => 1,
                'business_man_id' => 1,
                'description' => 'مطلوب فني صيانة أجهزة طبية للعمل في المستشفيات والمراكز الطبية. المطلوب خبرة في صيانة الأجهزة الطبية المتقدمة.',
                'salary_min' => 6000,
                'salary_max' => 9000,
                'job_type' => 'دوام كامل',
                'skills' => 'صيانة الأجهزة الطبية, إلكترونيات, تشخيص الأعطال',
                'requirements' => 'دبلوم في الهندسة الطبية أو الإلكترونيات، خبرة 4 سنوات، شهادات معتمدة',
                'status' => 'active'
            ],
            [
                'title' => 'مستشار قانوني - قانون تجاري',
                'work_place' => 'الدمام، السعودية',
                'gender_preference' => 'all',
                'education_level_id' => 3, // ماجستير
                'work_experience' => 7,
                'work_field_id' => 7, // القانون والاستشارات
                'country_of_graduation' => 1,
                'country_of_residence' => 1,
                'business_man_id' => 1,
                'description' => 'نبحث عن مستشار قانوني متخصص في القانون التجاري للانضمام لمكتبنا. المطلوب خبرة واسعة في العقود والنزاعات التجارية.',
                'salary_min' => 12000,
                'salary_max' => 18000,
                'job_type' => 'دوام كامل',
                'skills' => 'القانون التجاري, صياغة العقود, التقاضي, الاستشارات القانونية',
                'requirements' => 'ماجستير في القانون، ترخيص مزاولة المهنة، خبرة 7 سنوات في القانون التجاري',
                'status' => 'active'
            ],
            [
                'title' => 'طاهي متخصص - مأكولات عربية',
                'work_place' => 'جدة، السعودية',
                'gender_preference' => 'male',
                'education_level_id' => 4, // ثانوية عامة
                'work_experience' => 8,
                'work_field_id' => 8, // الضيافة والسياحة
                'country_of_graduation' => 1,
                'country_of_residence' => 1,
                'business_man_id' => 1,
                'description' => 'مطلوب طاهي محترف متخصص في المأكولات العربية للعمل في مطعم راقي. المطلوب خبرة واسعة وإبداع في تحضير الأطباق.',
                'salary_min' => 4000,
                'salary_max' => 7000,
                'job_type' => 'دوام كامل',
                'skills' => 'الطبخ العربي, إدارة المطبخ, تحضير الحلويات, النظافة والسلامة',
                'requirements' => 'خبرة 8 سنوات في الطبخ، معرفة بالمأكولات العربية، شهادة سلامة غذائية',
                'status' => 'active'
            ]
        ];

        foreach ($jobs as $job) {
            DB::table('jobs')->insert(array_merge($job, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]));
        }

        echo "تم إضافة " . count($jobs) . " وظيفة جديدة بنجاح!\n";
    }
}
