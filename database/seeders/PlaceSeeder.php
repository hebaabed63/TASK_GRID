<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places = [
            [
                'name' => 'مركز الشفاء',
                'type' => 'مركز صحي',
                'location' => 'غزة - تل الهوا',
                'description' => 'يقدم خدمات طبية وإسعافية على مدار الساعة.',
            ],
            [
                'name' => 'مركز التوزيع الشمالي',
                'type' => 'مركز توزيع',
                'location' => 'جباليا - شمال غزة',
                'description' => 'يعمل على توزيع المواد الغذائية للعائلات المحتاجة.',
            ],
            [
                'name' => 'مركز المساعدات الطارئة',
                'type' => 'مساعدات',
                'location' => 'دير البلح - المنطقة الوسطى',
                'description' => 'يقدم مساعدات طبية وإنسانية في أوقات الطوارئ.',
            ],
            [
                'name' => 'مركز المتابعة الإدارية',
                'type' => 'إدارة',
                'location' => 'خان يونس - البلد',
                'description' => 'يتابع سير العمل والتنسيق بين الفرق الميدانية.',
            ],
            [
                'name' => 'مركز الإسعاف الأولي',
                'type' => 'إسعاف',
                'location' => 'رفح - حي الجنينة',
                'description' => 'يتعامل مع الحالات الحرجة ويوفر استجابة سريعة.',
            ],
        ];

        foreach ($places as $place) {
            Place::create($place);
        }
    }

}
