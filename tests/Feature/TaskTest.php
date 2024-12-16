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
        /** @var User $user */
        $user = User::factory()->create();
        /** @var TaskStatus $status */
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
        /** @var TaskStatus $status */
        $status = TaskStatus::factory()->create();
        /** @var Label $label */
        $label = Label::factory()->create();
        $data = Task::factory()->make([
            'created_by_id' => $user->id,
            'status_id' => $status->id,
        ])->toArray();
        $data['labels'] = [$label->id];

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
            'label_id' => $label->id
        ]);
    }

    public function testUpdate()
    {
        $user = User::factory()->create();
        /** @var TaskStatus $status */
        $status = TaskStatus::factory()->create();
        /** @var Label $label */
        $label = Label::factory()->create();
        $labelId = $label->id;
        /** @var Label $label2 */
        $label2 = Label::factory()->create();
        $label2Id = $label2->id;
        /** @var Label $labelForUpdate */
        $labelForUpdate = Label::factory()->create();
        $labelForUpdateId = $labelForUpdate->id;
        /** @var Task $task */
        $task = Task::factory()->create([
            'created_by_id' => $user->id,
            'status_id' => $status->id,
        ]);
        $task->labels()->sync([$labelId, $label2Id]);

        $newData = Task::factory()->make()->only('name', 'description');
        $newData['status_id'] = $status->id;
        $newData['labels'] = [$labelForUpdateId];
        $response = $this->actingAs($user)->patch(route('tasks.update', $task), $newData);
        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHasNoErrors();
        unset($newData['labels']);
        $this->assertDatabaseHas('tasks', $newData);

        $this->assertDatabaseHas('label_task', [
            'label_id' => $labelForUpdateId,
            'task_id' => $task->id
        ]);
    }

    public function testDestroy()
    {
        /** @var User $user */
        $user = User::factory()->create();
        /** @var TaskStatus $status */
        $status = TaskStatus::factory()->create();
        /** @var Task $task */
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
        /** @var TaskStatus $status */
        $status = TaskStatus::factory()->create();
        $task = Task::factory()->create([
            'created_by_id' => $user->id,
            'status_id' => $status->id,
        ]);
        $response = $this->actingAs($secondUser)->delete(route('tasks.destroy', $task));

        $response->assertStatus(403);
    }
}
