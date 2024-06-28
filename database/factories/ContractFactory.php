<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_name' => $this->faker->company,
            'contract_name' => $this->faker->catchPhrase,
            'uploaded_on' => $this->faker->dateTimeThisYear,
            'uploaded_by' => 'Admin'
        ];
    }
}
