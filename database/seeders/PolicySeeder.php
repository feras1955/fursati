<?php

namespace Database\Seeders;

use App\Models\Policy;
use Illuminate\Database\Seeder;

class PolicySeeder extends Seeder
{
    public function run(): void
    {
        $policies = [
            [
                'title' => 'شروط الاستخدام',
                'content' => 'هذه الشروط تحكم استخدامك لموقع فُرصتي. باستخدام الموقع، فإنك توافق على هذه الشروط.',
                'type' => 'terms',
            ],
            [
                'title' => 'سياسة الخصوصية',
                'content' => 'نحن نحترم خصوصيتك ونلتزم بحماية بياناتك الشخصية. هذه السياسة توضح كيفية جمع واستخدام معلوماتك.',
                'type' => 'privacy',
            ],
            [
                'title' => 'الشروط والأحكام',
                'content' => 'هذه الشروط والأحكام تحكم العلاقة بين المستخدمين وموقع فُرصتي.',
                'type' => 'conditions',
            ],
        ];

        foreach ($policies as $policy) {
            Policy::create($policy);
        }
    }
} 