<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function store(Company $company) {
        $attr = request()->validate([
            'plate' => ['required']
        ]);
        $company->addVehicle($attr['plate']);
    }

    public function update(Vehicle $vehicle) {
        $attr = request()->validate([
            'plate' => ['required']
        ]);
        $vehicle->update($attr);
        return $vehicle;
    }

    public function destroy(Vehicle $vehicle) {
        $vehicle->delete();
    }

    public function index(Company $company) {
        return $company->vehicles;
    }
}
