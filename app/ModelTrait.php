<?php

namespace App;

use App\Models\Client;
use App\Models\Company;
use App\Models\Delivery;
use App\Models\Vehicle;

trait ModelTrait {
    public function deliveries() {
        if(in_array(class_basename($this), ['Client', 'Company'])) {
            return $this->hasMany(Delivery::class);
        }
    }

    public function company() {
        if(in_array(class_basename($this), ['Vehicle', 'Delivery'])) {
            return $this->belongsTo(Company::class);
        }
    }

    public function vehicles() {
        if(class_basename($this) == 'Company') {
            return $this->hasMany(Vehicle::class);
        }
    }

    public function vehicle() {
        if(class_basename($this) == 'Delivery') {
            return $this->belongsTo(Vehicle::class);
        }
    }

    public function client() {
        if(class_basename($this) == 'Delivery') {
            return $this->belongsTo(Client::class);
        }
    }
    
}