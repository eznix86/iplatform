<?php

namespace App\Providers;

use App\Enums\Permissions;
use App\Enums\Roles;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Passport::hashClientSecrets();
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
        Passport::enablePasswordGrant();

        Route::prefix('api/v1')
            ->middleware(['api', 'camel-case'])
            ->group(base_path('routes/api/v1.php'));

        Gate::before(function ($user, $ability) {
            return $user->hasRole(Roles::SUPER_ADMIN->value) ? true : null;
        });

        Gate::define(Permissions::CREATE_PASSWORD_GRANT_TOKEN->value, function ($user, $model) {
            return $user->hasRole(Roles::SUPER_ADMIN->value);
        });

        Gate::define(Permissions::CREATE_THIRD_PARTY_API_TOKEN->value, function ($user, $model) {
            return $user->hasRole(Roles::SUPER_ADMIN->value);
        });
    }
}
