<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generate a random element ('B', 'P', 'V') for the 'status' field
        $status = $this->faker->randomElement(['B', 'P', 'V']); // billed, paid, void

        // Return an array representing the default state of the Invoice model
        return [
            'customer_id' => Customer::factory(),  // Use the Customer factory to generate a random customer_id
            'amount' => $this->faker->numberBetween(100, 20000),  // Generate a random amount between 100 and 20000
            'status' => $status,  // Assign the generated 'status' value
            'billed_date' => $this->faker->dateTimeThisDecade(),  // Generate a random billed_date within the current decade
            'paid_date' => $status == 'P' ? $this->faker->dateTimeThisDecade() : null,  // Set paid_date if status is 'P', otherwise set to null
        ];
    }
}
