<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = ['year', 'make', 'model', 'vin', 'usage', 'primary_use', 'annual_mileage', 'ownership', 'policy_id'];

    public function policy()
    {
        return $this->belongsTo(Policy::class);
    }

    public function garagingAddress()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function coverages()
    {
        return $this->hasMany(Coverage::class);
    }
}
