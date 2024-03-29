<?php

namespace Database\Factories;

use App\Enums\OwnershipType;
use App\Enums\UsageType;
use App\Models\Address;
use App\Models\Coverage;
use App\Models\Policy;
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
            'vin' => $this->faker->unique()->word,
            'usage' => $this->faker->randomElement(UsageType::cases()),
            'primary_use' => $this->faker->randomElement(UsageType::cases()),
            'annual_mileage' => $this->faker->randomNumber(),
            'ownership' => $this->faker->randomElement(OwnershipType::cases()),
        ];
    }

    public function withPolicy(): static
    {
        return $this->state(fn (array $attributes) => [
            'policy_id' => Policy::factory()->create()->id,
        ]);
    }

    public function withGarageAddress(): static
    {
        return $this->has(Address::factory(), 'garagingAddress');
    }

    public function withCoverages(): static
    {
        return $this->has(Coverage::factory()->count(3), 'coverages');
    }
}
