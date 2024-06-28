<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manufacturer>
 */
class ManufacturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'manufacturer_name' => $this->faker->company,
            'company_address' => $this->faker->address,
            'contact_person' => $this->faker->name,
            'email_address' => $this->faker->unique()->safeEmail,
        ];
    }
}
