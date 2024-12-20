<?php

namespace Tests\Feature;

use App\Models\TaskStatus;
use Tests\TestCase;

class TaskStatusTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('task_statuses.create'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $user = \App\Models\User::factory()->create();
        $taskStatus = TaskStatus::factory()->create();
        $response = $this->actingAs($user)->get(route('task_statuses.edit', $taskStatus));
        $response->assertOk();
    }

    public function testStore()
    {
        $user = \App\Models\User::factory()->create();
        $data = TaskStatus::factory()->make()->only('name');
        $response = $this->actingAs($user)->post(route('task_statuses.store'), $data);
        $response->assertRedirect(route('task_statuses.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testUpdate()
    {
        $user = \App\Models\User::factory()->create();
        $taskStatus = TaskStatus::factory()->create();
        $data = TaskStatus::factory()->make()->only('name');
        $response = $this->actingAs($user)->patch(route('task_statuses.update', $taskStatus), $data);
        $response->assertRedirect(route('task_statuses.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testDestroy()
    {
        $user = \App\Models\User::factory()->create();
        $status = TaskStatus::factory()->create();
        $response = $this->actingAs($user)->delete(route('task_statuses.destroy', [$status]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('task_statuses.index'));

        $this->assertDatabaseMissing('task_statuses', $status->only('id'));
    }
}
