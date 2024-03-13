<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'date_of_birth' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'marital_status' => $this->faker->randomElement(['single', 'married']),
            'license_number' => $this->faker->randomNumber(9),
            'license_state' => $this->faker->stateAbbr,
            'license_status' => $this->faker->randomElement(['valid', 'expired', 'suspended', 'revoked']),
            'license_effective_date' => $this->faker->date(),
            'license_expiration_date' => $this->faker->date(),
            'license_class' => $this->faker->randomLetter(),
        ];
    }
}
