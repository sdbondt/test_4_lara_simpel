<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function store(Client $client, Vehicle $vehicle) {
        $client->addDelivery($vehicle);
    }
}
