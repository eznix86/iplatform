<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'gender', 'marital_status', 'license_number', 'license_state', 'license_status', 'license_effective_date', 'license_expiration_date', 'license_class', 'policy_id'];

    protected $casts = [
        'date_of_birth' => 'datetime',
        'license_effective_date' => 'datetime',
        'license_expiration_date' => 'datetime',
    ];

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
}
