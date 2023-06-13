<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiswaDokumen>
 */
class SiswaDokumenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'siswa_id' => fake()->randomElement(Siswa::query()->pluck('id')->toArray()),
            'ijazah' => fake()->name(),
            'ktp_orang_tua' => fake()->name(),
            'kip' => fake()->name(),
            'pkh' => fake()->name(),
            'kks' => fake()->name(),
        ];
    }
}
