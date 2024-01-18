<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generate a random element ('I' or 'B') for the 'type' field
        $type = $this->faker->randomElement(['I', 'B']); 

        // Use a ternary operator to conditionally set the 'name' field based on 'type'
        $name = $type == 'I' ? $this->faker->name() : $this->faker->company();

        // Return an array representing the default state of the Customer model
        return [
            'name' => $name,  // Assign the generated 'name' value
            'type' => $type,  // Assign the generated 'type' value
            'email' => $this->faker->email(),  // Generate a random email
            'address' => $this->faker->streetAddress(),  // Generate a random street address
            'city' => $this->faker->city(),  // Generate a random city
            'state' => $this->faker->state(),  // Generate a random state
            'postal_code' => $this->faker->postCode(),  // Generate a random postal code
        ];
    }
}
