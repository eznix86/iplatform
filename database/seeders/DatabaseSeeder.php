<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\Policy;
use App\Models\PolicyHolder;
use App\Models\User;
use App\Models\Vehicle;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Bruce Wayne',
            'email' => 'iamthenight@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'John Dough',
            'email' => 'ilovecakes@gmail.com',
            'password' => Hash::make('password'),
        ]);

        Policy::factory(10)->create();

        /** @var Collection<\App\Models\Policy> $policy */
        $policies = Policy::all();

        $policies->each(function (Policy $policy) {
            Vehicle::factory(random_int(1, 4))->withGarageAddress()->withCoverages()->create([
                'policy_id' => $policy->id,
            ]);
            PolicyHolder::factory()->withAddress()->create([
                'policy_id' => $policy->id,
            ]);
            $policy->drivers()->createMany(Driver::factory(random_int(1, 2))->make()->toArray());
        });

    }
}
