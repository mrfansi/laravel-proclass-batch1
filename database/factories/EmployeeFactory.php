<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'position' => "Developer",
            'office' => fake()->company,
            'age' => rand(23, 60),
            'start_date' => now(),
            'salary' => rand(15000000, 24000000),
        ];
    }
}
