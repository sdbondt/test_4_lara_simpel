<?php

namespace App\Models;

use App\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    use ModelTrait;

    protected $fillable = ['client_id', 'vehicle_id', 'company_id'];
}
