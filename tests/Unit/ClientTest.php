<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Models\Vehicle;
use Tests\TestCase;

class ClientTest extends TestCase
{
    public function setUp(): void {
        parent::setUp();
        $this->client = Client::factory()->create();
        $this->vehicle = Vehicle::factory()->create();
    }

    /** @test */
    public function client_can_create_deliveries() {
        $this->client->addDelivery($this->vehicle);
        $this->assertDatabaseHas('deliveries', ['client_id' => $this->client->id]);
    }

    /** @test */
    public function client_can_have_deliveries() {
        $this->client->addDelivery($this->vehicle);
        $this->assertCount(1, $this->client->deliveries);
    }
}
