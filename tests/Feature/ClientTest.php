<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        $this->client = Client::factory()->create();
        $this->attr = ['name' => 'test'];
    }

    /** @test */
    public function clients_can_be_created() {
        $this->postJson(route('clients.store'), $this->attr);
        $this->assertDatabaseHas('clients', $this->attr);
    }

    /** @test */
    public function clients_need_a_name() {
        $this->postJson(route('clients.store'))
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    /** @test */
    public function clients_can_be_updated() {
        $this->patchJson(route('clients.update', $this->client->id), $this->attr);
        $this->assertDatabaseHas('clients', $this->attr);
    }

    /** @test */
    public function clients_can_be_deleted() {
        $this->deleteJson(route('clients.destroy', $this->client->id));
        $this->assertDatabaseEmpty('clients');
    }
}
