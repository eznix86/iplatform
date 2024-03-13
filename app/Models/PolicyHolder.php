<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyHolder extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'policy_id'];

    public function policy()
    {
        return $this->belongsTo(Policy::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
