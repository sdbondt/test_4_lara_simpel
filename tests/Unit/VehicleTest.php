<?php

namespace Tests\Unit;

use App\Models\Company;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VehicleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        $this->vehicle = Vehicle::factory()->create();
    }

    /** @test */
    public function vehicles_belong_to_a_company() {
        $this->withoutExceptionHandling();
        $this->assertInstanceOf(Company::class, $this->vehicle->company);
    }

}
