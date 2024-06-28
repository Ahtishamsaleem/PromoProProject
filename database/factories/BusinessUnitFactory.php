<?php

namespace Database\Factories;

use App\Models\BusinessUnit;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BusinessUnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = BusinessUnit::class;
    public function definition(): array
    {
        return [
            'manufacturer_id' => Manufacturer::factory(),
            'business_unit_name' => $this->faker->company,
            'business_unit_company_code' => $this->faker->unique()->numerify('BUC###'),
            'status' => 'Active'
        ];
    }
}
