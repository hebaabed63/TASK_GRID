<?php

namespace Database\Seeders;

use App\Models\Volunteer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VolunteerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $volunteers = [
            [
                'name' => 'محمد سالم',
                'email' => 'm.salem@example.com',
                'phone' => '0591234567',
                'skils' => 'إسعاف أولي، تنظيم فرق',
            ],
            [
                'name' => 'هبة يوسف',
                'email' => 'heba.yousef@example.com',
                'phone' => '0569876543',
                'skils' => 'إدارة، كتابة تقارير، تنسيق',
            ],
            [
                'name' => 'أحمد عابد',
                'email' => 'ahmad.abed@example.com',
                'phone' => '0594567890',
                'skils' => 'توزيع مساعدات، قيادة فرق',
            ],
            [
                'name' => 'ليلى عمر',
                'email' => 'layla.omar@example.com',
                'phone' => '0561122334',
                'skils' => 'متابعة ميدانية، تسجيل بيانات',
            ],
            [
                'name' => 'سامي ناصر',
                'email' => 'sami.nasser@example.com',
                'phone' => '0593344556',
                'skils' => 'مراقبة، توثيق، إدارة وقت',
            ],
        ];

        foreach ($volunteers as $volunteer) {
            Volunteer::create($volunteer);
        }
    }

}
