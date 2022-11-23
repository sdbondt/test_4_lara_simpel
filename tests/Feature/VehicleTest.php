<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehicleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        $this->company = Company::factory()->create();
    }

    /** @test */
    public function vehicles_can_be_created() {
        $attr = ['plate' => 'test'];
        $this->postJson(route('vehicles.store', $this->company->id), $attr);
        $this->assertDatabaseHas('vehicles', $attr);
    }

    /** @test */
    public function vehicles_need_a_plate() {
        $this->postJson(route('vehicles.store', $this->company->id))
            ->assertUnprocessable()
            ->assertJsonValidationErrors('plate');
    }

    /** @test */
    public function vehicles_can_be_deleted() {
        $vehicle = Vehicle::factory()->create(['plate' => 'test']);
        $this->deleteJson(route('vehicles.destroy', $vehicle->id));
        $this->assertDatabaseMissing('vehicles', ['plate' => 'test']);
    }

    /** @test */
    public function vehicles_can_be_update() {
        $vehicle = Vehicle::factory()->create(['plate' => 'test']);
        $this->patchJson(route('vehicles.update', $vehicle->id), ['plate' => 'update']);
        $this->assertDatabaseHas('vehicles', ['plate' => 'update']);
    }

    /** @test */
    public function you_can_see_companies_vehicles() {
        $vehicle = Vehicle::factory()->create();
        $res = $this->getJson(route('vehicles.index', $vehicle->company->id))->json();
        $this->assertCount(1, $res);
    }
}
