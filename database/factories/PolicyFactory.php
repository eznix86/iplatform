<?php

namespace Database\Factories;

use App\Actions\Policy\PolicyNumberGenerator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Policy>
 */
class PolicyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'policy_no' => (new PolicyNumberGenerator)->handle(),
            'policy_status' => fake()->randomElement(['active', 'inactive']),
            'policy_type' => fake()->randomElement(['auto', 'home', 'renters']),
            'policy_effective_date' => fake()->date(),
            'policy_expiration_date' => fake()->date(),
        ];
    }
}
