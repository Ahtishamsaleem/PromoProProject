<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\BusinessUnit;
use App\Models\Category;
use App\Models\Contract;
use App\Models\Manufacturer;
use App\Models\MasterSKU;
use App\Models\SKU;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Contract::factory()->count(20)->create();
        Manufacturer::factory()->count(20)->create();
        BusinessUnit::factory()->count(20)->create();
        Category::factory()->count(20)->create();
        Brand::factory()->count(20)->create();
        MasterSKU::factory()->count(20)->create();
        SKU::factory()->count(20)->create();
    }
}
