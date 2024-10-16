<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_title' => fake()->sentence(3),
            'description' => fake()->sentence(5),
            'status' => fake()->randomElement(['successful', 'declined']),
            'total_amount' => fake()->numberBetween(100, 1000000),
            'transaction_number' => fake()->bothify('??##?##??')
        ];
    }
}
