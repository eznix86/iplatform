<?php

namespace App\Policies;

use App\Enums\Roles;
use App\Models\PolicyHolder;
use App\Models\User;

class PolicyHolderPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(Roles::POLICY_MAKER->value);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PolicyHolder $policyHolder): bool
    {
        return $user->hasRole(Roles::POLICY_MAKER->value);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(Roles::POLICY_MAKER->value);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PolicyHolder $policyHolder): bool
    {
        return $user->hasRole(Roles::POLICY_MAKER->value);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PolicyHolder $policyHolder): bool
    {
        return $user->hasRole(Roles::POLICY_MAKER->value);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PolicyHolder $policyHolder): bool
    {
        return $user->hasRole(Roles::POLICY_MAKER->value);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PolicyHolder $policyHolder): bool
    {
        return $user->hasRole(Roles::POLICY_MAKER->value);
    }
}
