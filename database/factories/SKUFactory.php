<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\BusinessUnit;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\MasterSKU;
use App\Models\SKU;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SKUFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = SKU::class;

    public function definition(): array
    {
        return [
            'manufacturer_id' => Manufacturer::factory(),
            'business_unit_id' => BusinessUnit::factory(),
            'category_id' => Category::factory(),
            'brand_id' => Brand::factory(),
            'master_sku_id' => MasterSKU::factory(),
            'sku_name' => $this->faker->word,
            'sku_company_code' => $this->faker->unique()->numerify('SC###'),
            'pack_type' => $this->faker->word,
            'variant' => $this->faker->word,
            'pack_size' => $this->faker->word,
            'attribute' => $this->faker->word,
            'sub_attribute' => $this->faker->word,
            'status' => 'Active'
        ];
    }
}
