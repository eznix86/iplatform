<?php

namespace App\Models;

use App\Models\Scopes\ViewedByCustomerOnlyScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

#[ScopedBy(ViewedByCustomerOnlyScope::class)]
class Policy extends Model
{
    use HasFactory;
    use Searchable;

    public $with = ['policyHolder', 'drivers', 'vehicles', 'policyHolder.address', 'vehicles.coverages'];

    public static function makeAllSearchableUsing(Builder $query): Builder
    {
        return $query->withoutGlobalScopes();
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'policy_no' => $this->policy_no,
            'policy_status' => $this->policy_status,
            'policy_type' => $this->policy_type,
            'policy_effective_date' => $this->policy_effective_date->format('Y M d'),
            'policy_expiration_date' => $this->policy_expiration_date->format('Y M d'),
            'policy_holder' => $this->policyHolder->full_name ?? '',
        ];
    }

    protected $fillable = ['policy_no', 'policy_status', 'policy_type', 'policy_effective_date', 'policy_expiration_date'];

    protected $casts = [
        'policy_effective_date' => 'datetime',
        'policy_expiration_date' => 'datetime',
    ];

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
