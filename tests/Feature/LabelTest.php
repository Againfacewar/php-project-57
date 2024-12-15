<?php

namespace Tests\Feature;

use App\Models\Label;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LabelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    protected function setUp(): void
    {
        parent::setUp();
        Label::factory()->count(2)->make();
    }

    public function testIndex()
    {
        $response = $this->get(route('labels.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('labels.create'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $user = \App\Models\User::factory()->create();
        $label = Label::factory()->create();
        $response = $this->actingAs($user)->get(route('labels.edit', $label));
        $response->assertOk();
    }

    public function testStore()
    {
        $user = \App\Models\User::factory()->create();
        $data = Label::factory()->make()->only('name', 'description');
        $response = $this->actingAs($user)->post(route('labels.store'), $data);
        $response->assertRedirect(route('labels.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('labels', $data);
    }

    public function testUpdate()
    {
        $user = \App\Models\User::factory()->create();
        $label = Label::factory()->create();
        $data = Label::factory()->make()->only('name', 'description');
        $response = $this->actingAs($user)->patch(route('labels.update', $label), $data);
        $response->assertRedirect(route('labels.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('labels', $data);
    }

    public function testDestroy()
    {
        $user = \App\Models\User::factory()->create();
        $label = Label::factory()->create();
        $response = $this->actingAs($user)->delete(route('labels.destroy', $label));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('labels.index'));

        $this->assertDatabaseMissing('labels', $label->only('id'));
    }
}
