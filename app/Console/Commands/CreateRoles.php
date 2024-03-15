<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Enums\Roles;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role as PermissionRole;

class CreateRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roles:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create base roles for Fournisseur Asticieux';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach (Roles::cases() as $role) {
            if (! PermissionRole::where('name', $role->value)->exists()) {
                PermissionRole::create(['name' => $role->value]);
            }
        }
    }
}
