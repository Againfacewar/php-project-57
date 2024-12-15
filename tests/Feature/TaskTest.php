<?php

namespace Tests\Feature;

use App\Models\Label;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testIndex()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('tasks.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('tasks.create'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $user = User::factory()->create();
        $status = TaskStatus::factory()->create();
        $task = Task::factory()->create([
            'created_by_id' => $user->id,
            'status_id' => $status->id,
        ]);

        $response = $this->actingAs($user)->get(route('tasks.edit', $task));
        $response->assertOk();
    }

    public function testStore()
    {
        $user = User::factory()->create();
        $status = TaskStatus::factory()->create();
        $label = Label::factory()->create()->id;
        $data = Task::factory()->make([
            'created_by_id' => $user->id,
            'status_id' => $status->id,
        ])->toArray();
        $data['labels'] = [$label];

        $response = $this->actingAs($user)->post(route('tasks.store'), $data);
        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('tasks', [
            'name' => $data['name'],
            'description' => $data['description'],
            'created_by_id' => $user->id,
            'status_id' => $status->id,
        ]);

        $this->assertDatabaseHas('label_task', [
            'label_id' => $label
        ]);
    }

    public function testUpdate()
    {
        $user = User::factory()->create();
        $status = TaskStatus::factory()->create();
        $label = Label::factory()->create()->id;
        $label2 = Label::factory()->create()->id;
        $labelForUpdate = Label::factory()->create()->id;
        $task = Task::factory()->create([
            'created_by_id' => $user->id,
            'status_id' => $status->id,
        ]);
        $task->labels()->sync([$label, $label2]);

        $newData = Task::factory()->make()->only('name', 'description');
        $newData['status_id'] = $status->id;
        $newData['labels'] = [$labelForUpdate];
        $response = $this->actingAs($user)->patch(route('tasks.update', $task), $newData);
        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHasNoErrors();
        unset($newData['labels']);
        $this->assertDatabaseHas('tasks', $newData);

        $this->assertDatabaseHas('label_task', [
            'label_id' => $labelForUpdate,
            'task_id' => $task->id
        ]);
    }

    public function testDestroy()
    {
        $user = User::factory()->create();
        $status = TaskStatus::factory()->create();
        $task = Task::factory()->create([
            'created_by_id' => $user->id,
            'status_id' => $status->id,
        ]);

        $response = $this->actingAs($user)->delete(route('tasks.destroy', $task));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('tasks.index'));

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    public function testDestroyIfUserNotTaskOwner()
    {
        $user = User::factory()->create();
        $secondUser = User::factory()->create();
        $status = TaskStatus::factory()->create();
        $task = Task::factory()->create([
            'created_by_id' => $user->id,
            'status_id' => $status->id,
        ]);
        $response = $this->actingAs($secondUser)->delete(route('tasks.destroy', $task));

        $response->assertStatus(403);
    }
}
