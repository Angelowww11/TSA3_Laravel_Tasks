<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->travelTo(Carbon::create(2026, 10, 30, 12, 0, 0, 'Asia/Manila'));
        $this->seed();
    }

    public function test_today_excludes_yesterday_and_tomorrow(): void
    {
        $response = $this->get('/')->assertOk();
        $response->assertViewHas('tasks', function ($tasks) {
            return $tasks->count() === 3 && $tasks->every(fn ($task) => $task->task_date->toDateString() === '2026-10-30');
        });
        $response->assertSee('Check the daily task filter')->assertDontSee('Sketch the database schema')->assertDontSee('Review the submission document');
    }

    public function test_all_tasks_are_ordered_by_date_and_seed_is_repeatable(): void
    {
        $this->seed();
        $this->assertDatabaseCount('tasks', 8);
        $this->assertDatabaseCount('users', 1);
        $this->get('/tasks')->assertOk()->assertViewHas('tasks', function ($tasks) {
            $dates = $tasks->pluck('task_date')->map->toDateString()->all();
            $sorted = $dates;
            sort($sorted);
            return count($dates) === 8 && count(array_unique($dates)) === 3 && $dates === $sorted;
        });
    }

    public function test_profile_about_and_default_pending_status(): void
    {
        $this->get('/profile')->assertOk()->assertSee(User::sole()->full_name);
        $this->get('/about')->assertOk()->assertSee('Angelo Kacey N. Pineda');
        $task = Task::create(['title' => 'Default status check', 'task_date' => today()]);
        $this->assertSame('pending', $task->fresh()->status);
    }

    public function test_today_follows_philippine_midnight(): void
    {
        $this->travelTo(Carbon::create(2026, 10, 31, 0, 1, 0, 'Asia/Manila'));
        $this->get('/')->assertOk()->assertSee('Capture the activity screenshots')->assertDontSee('Check the daily task filter');
    }
}
