<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'make' => $this->faker->word,
            'model' => $this->faker->word,
            'year' => $this->faker->year,
            'vin' => $this->faker->word,
            'usage' => $this->faker->word,
            'primary_use' => $this->faker->word,
            'annual_mileage' => $this->faker->randomNumber(),
            'ownership' => $this->faker->word,
            'policy_id' => \App\Models\Policy::factory(),
        ];
    }
}
