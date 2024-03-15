<?php

namespace Database\Factories;

use App\Enums\Gender;
use App\Enums\LicenseClass;
use App\Enums\LicenseState;
use App\Enums\LicenseStatus;
use App\Enums\MaritalStatus;
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
            'gender' => $this->faker->randomElement(Gender::cases()),
            'marital_status' => $this->faker->randomElement(MaritalStatus::cases()),
            'license_number' => $this->faker->randomNumber(9),
            'license_state' => $this->faker->randomElement(LicenseState::cases()),
            'license_status' => $this->faker->randomElement(LicenseStatus::cases()),
            'license_effective_date' => $this->faker->date(),
            'license_expiration_date' => $this->faker->date(),
            'license_class' => $this->faker->randomElement(LicenseClass::cases()),
        ];
    }
}
