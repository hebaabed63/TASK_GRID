<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'title' => 'توزيع طرود غذائية',
                'description' => 'توزيع الطرود على العائلات المحتاجة في المنطقة الشمالية',
                'place_id' => 5,
                'category' => 'توزيع',
                'date' => '2025-06-21',
                'status' => 'pending',
            ],
            [
                'title' => 'إدارة المتطوعين',
                'description' => 'تنظيم فرق المتطوعين في مركز الشفاء',
                'place_id' => 4,
                'category' => 'إدارة',
                'date' => '2025-06-22',
                'status' => 'done',
            ],
            [
                'title' => 'تقديم الإسعافات الأولية',
                'description' => 'فريق الطوارئ يقدم خدمات إسعافية عاجلة',
                'place_id' => 8,
                'category' => 'إسعاف',
                'date' => '2025-06-20',
                'status' => 'pending'
            ],
            [
                'title' => 'مراقبة توزيع المياه',
                'description' => 'متابعة سير توزيع المياه على الأحياء',
                'place_id' => 7,
                'category' => 'مراقبة',
                'date' => '2025-06-23',
                'status' => 'assigned',
            ],
            [
                'title' => 'توزيع مساعدات طبية',
                'description' => 'تسليم أدوية للمراكز الصحية في الجنوب',
                'place_id' => 6,
                'category' => 'توزيع',
                'date' => '2025-06-24',
                 'status' => 'pending',
            ],
            [
                'title' => 'تنظيف وتعقيم المركز',
                'description' => 'تنفيذ حملة تنظيف وتعقيم شاملة داخل مركز الشفاء للوقاية من الأمراض.',
                'place_id' => 4,
                'category' => 'إدارة',
                'date' => '2025-06-25',
                'status' => 'pending',
            ],

        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }

}
