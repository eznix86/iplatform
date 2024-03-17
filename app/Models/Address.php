<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['street', 'city', 'state', 'zip', 'addressable_id', 'addressable_type'];

    public function getFullAddressAttribute()
    {
        return "{$this->street}, {$this->city}, {$this->state}, {$this->zip}";
    }

    public function addressable()
    {
        return $this->morphTo();
    }
}
