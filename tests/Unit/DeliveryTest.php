<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Models\Company;
use App\Models\Delivery;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeliveryTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void {
        parent::setUp();
        $this->delivery = Delivery::factory()->create();
    }

    /** @test */
    public function delivery_belongs_to_client() {
        $this->assertInstanceOf(Client::class, $this->delivery->client);
    }

    /** @test */
    public function delivery_belongs_to_vehicle() {
        $this->assertInstanceOf(Vehicle::class, $this->delivery->vehicle);
    }

    /** @test */
    public function delivery_belongs_to_company() {
        $this->assertInstanceOf(Company::class, $this->delivery->company);
    }
}
