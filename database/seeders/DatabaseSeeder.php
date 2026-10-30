<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $today = today();
        $tasks = [
            ['Review project requirements', 'completed', -1],
            ['Sketch the database schema', 'completed', -1],
            ['Prepare the Laravel workspace', 'completed', -1],
            ['Review Laravel routes', 'completed', 0],
            ['Complete the Blade views', 'in_progress', 0],
            ['Check the daily task filter', 'pending', 0],
            ['Capture the activity screenshots', 'pending', 1],
            ['Review the submission document', 'pending', 1],
        ];

        foreach ($tasks as [$title, $status, $offset]) {
            Task::updateOrCreate(['title' => $title], [
                'status' => $status,
                'task_date' => $today->copy()->addDays($offset)->toDateString(),
            ]);
        }

        User::updateOrCreate(['username' => 'angelo.pineda'], [
            'full_name' => 'Angelo Kacey N. Pineda',
            'email' => 'angelo.pineda@example.com',
        ]);
    }
}
