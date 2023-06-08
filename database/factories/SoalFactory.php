<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Soal>
 */
class SoalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pertanyaan' => fake()->sentence(),
            'pilihan_a' => fake()->sentence(2),
            'pilihan_b' => fake()->sentence(2),
            'pilihan_c' => fake()->sentence(2),
            'pilihan_d' => fake()->sentence(2),
            'jawaban' => fake()->randomElement(['a', 'b', 'c', 'd']),
            'status' => fake()->boolean(),
        ];
    }
}
