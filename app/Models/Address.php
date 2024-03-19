<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['street', 'city', 'state', 'zip', 'addressable_id', 'addressable_type'];

    public function getFullAddressAttribute()
    {
        $state = Str::upper($this->state);

        return "{$this->street}, {$this->city}, {$state}, {$this->zip}";
    }

    public function addressable()
    {
        return $this->morphTo();
    }
}
