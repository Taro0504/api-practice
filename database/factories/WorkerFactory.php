<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement(['男性','女性']);

        return [
            'user_id' => User::factory(),
            'date_of_birth' => fake()->date(),
            'gender' => $gender,
            'address' => fake()->address(),
            'hire_date' => fake()->date(),
            'is_checked' => fake()->boolean(),
        ];
    }
}
