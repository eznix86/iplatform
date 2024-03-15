<?php

namespace Database\Factories;

use App\Enums\CoverageType;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coverage>
 */
class CoverageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(CoverageType::cases()),
            'limit' => $this->faker->randomNumber(5),
            'deductible' => $this->faker->randomNumber(5),
        ];
    }

    public function withVehicle(): static
    {
        return $this->state(fn (array $attributes) => [
            'vehicle_id' => Vehicle::factory()->withPolicy()->create()->id,
        ]);
    }
}
