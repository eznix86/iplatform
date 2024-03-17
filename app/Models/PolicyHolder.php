<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyHolder extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'policy_id'];

    /**
     * Get the user's full name.
     */
    public function getFullNameAttribute(): string
    {
        return ucwords("{$this->first_name} {$this->last_name}");
    }

    public function policy()
    {
        return $this->belongsTo(Policy::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
