<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\BusinessUnit;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Brand::class;

    public function definition(): array
    {
        return [
            'business_unit_id' => BusinessUnit::factory(),
            'category_id' => Category::factory(),
            'brand_name' => $this->faker->word,
            'brand_company_code' => $this->faker->unique()->numerify('BC###'),
            'status' => 'Active'
        ];
    }
}
