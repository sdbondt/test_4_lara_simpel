<?php

namespace App\Models;

use App\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    use ModelTrait;
    
    protected $fillable = ['name'];

    public function addDelivery($vehicle) {
        $this->deliveries()->create([
            'vehicle_id' => $vehicle->id,
            'company_id' => $vehicle->company->id
        ]);
    }
}
