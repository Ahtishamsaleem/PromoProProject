<?php

namespace Database\Factories;

use App\Models\BusinessUnit;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'business_unit_id' => BusinessUnit::factory(),
            'category_name' => $this->faker->word,
            'category_company_code' => $this->faker->unique()->numerify('CC###'),
            'status' => 'Active'
        ];
    }
}
