<?php

namespace App\Models;

use App\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    use  ModelTrait;

    protected $fillable = ['name'];


    public function addVehicle($plate) {
        $this->vehicles()->create([
            'plate' => $plate
        ]);
    }
}
