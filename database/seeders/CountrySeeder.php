<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            ['name' => 'السعودية', 'code' => 'SAU'],
            ['name' => 'الإمارات العربية المتحدة', 'code' => 'UAE'],
            ['name' => 'مصر', 'code' => 'EGY'],
            ['name' => 'الأردن', 'code' => 'JOR'],
            ['name' => 'لبنان', 'code' => 'LBN'],
            ['name' => 'الكويت', 'code' => 'KWT'],
            ['name' => 'قطر', 'code' => 'QAT'],
            ['name' => 'البحرين', 'code' => 'BHR'],
            ['name' => 'عمان', 'code' => 'OMN'],
            ['name' => 'العراق', 'code' => 'IRQ'],
        ];

        foreach ($countries as $country) {
            Country::firstOrCreate(['name' => $country['name']], $country);
        }
    }
} 