<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Company;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'client_id' => Client::factory()->create(),
            'company_id' => Company::factory()->create(),
            'vehicle_id' => Vehicle::factory()->create()
        ];
    }
}
