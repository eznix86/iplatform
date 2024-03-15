<?php

namespace App\Policies;

use App\Enums\Roles;
use App\Models\Policy;
use App\Models\User;

class PolicyPolicy
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
    public function view(User $user, Policy $policy): bool
    {
        return true;
        // return $user->hasRole(Roles::POLICY_MAKER->value) || $policy->users->contains($user);
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
    public function update(User $user, Policy $policy): bool
    {
        return $user->hasRole(Roles::POLICY_MAKER->value);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Policy $policy): bool
    {
        return $user->hasRole(Roles::POLICY_MAKER->value);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Policy $policy): bool
    {
        return $user->hasRole(Roles::POLICY_MAKER->value);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Policy $policy): bool
    {
        return $user->hasRole(Roles::POLICY_MAKER->value);
    }
}
