<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;

    protected $fillable = ['policy_no', 'policy_status', 'policy_type', 'policy_effective_date', 'policy_expiration_date'];

    public function policyHolder()
    {
        return $this->hasOne(PolicyHolder::class);
    }

    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'policy_user');
    }
}
