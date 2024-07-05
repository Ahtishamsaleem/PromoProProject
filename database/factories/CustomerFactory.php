<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Customer::class;
    
    public function definition(): array
    {
        return [
            'customer_code' => $this->faker->unique()->text(10),
            'customer_name' => $this->faker->company,
            'customer_company_code' => $this->faker->text(10),
            'customer_status' => $this->faker->randomElement(['active', 'inactive']),
            'customer_channel' => $this->faker->randomElement(['Channel A', 'Channel B', 'Channel C']),
            'customer_sub_channel' => $this->faker->randomElement(['Sub Channel X', 'Sub Channel Y', 'Sub Channel Z']),
            'customer_address' => $this->faker->address,
            'contact_person' => $this->faker->name,
            'contact_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'cnic' => $this->faker->numerify('#########'),
            'cnic_expiry' => $this->faker->dateTimeBetween('+1 month', '+1 year')->format('Y-m-d'),
        ];
    }
}
