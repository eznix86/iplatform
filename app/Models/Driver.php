<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'gender', 'marital_status', 'license_number', 'license_state', 'license_status', 'license_effective_date', 'license_expiration_date', 'license_class', 'policy_id'];

    public function policy()
    {
        return $this->belongsTo(Policy::class);
    }
}
