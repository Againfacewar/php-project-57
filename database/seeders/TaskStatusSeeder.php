<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private array $statuses = [
        [
            'name' => 'новая'
        ],
        [
            'name' => 'завершена'
        ],
        [
            'name' => 'на тестировании'
        ],
        [
            'name' => 'в работе'
        ]
    ];
    public function run(): void
    {
        foreach ($this->statuses as $status) {
            TaskStatus::query()->create($status);
        }
    }
}
