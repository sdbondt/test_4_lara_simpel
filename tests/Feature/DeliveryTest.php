<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeliveryTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void {
        parent::setUp();
        $this->vehicle = Vehicle::factory()->create();
        $this->client = Client::factory()->create();
    }
    
    /** @test */
    public function deliveries_can_be_created() {
        $this->postJson(route('deliveries.store', [$this->client->id, $this->vehicle->id]));
        $this->assertDatabaseHas('deliveries', ['client_id' => $this->client->id]);
    }
}
