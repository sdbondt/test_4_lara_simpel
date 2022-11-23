<?php

namespace Tests\Unit;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class companytest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        $this->company = Company::factory()->create();
    }

    /** @test */
    public function companies_can_add_vehicles() {
        $this->company->addVehicle('test');
        $this->assertDatabaseHas('vehicles', ['plate' => 'test']);
    }

    /** @test */
    public function companies_can_have_vehicles() {
        $this->company->addVehicle('test');
        $this->assertCount(1, $this->company->vehicles);
    }
}
