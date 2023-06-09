<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiswaOrangTua>
 */
class SiswaOrangTuaFactory extends Factory
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
            'nama_ayah' => fake()->name(),
            'tempat_lahir_ayah' => fake()->city(),
            'pekerjaan_ayah' => fake()->sentence(2),
            'tgl_lahir_ayah' => fake()->date(),
            'no_telp_ayah' => fake()->phoneNumber(),
            'nama_ibu' => fake()->name(),
            'tempat_lahir_ibu' => fake()->city(),
            'pekerjaan_ibu' => fake()->sentence(2),
            'tgl_lahir_ibu' => fake()->date(),
            'no_telp_ibu' => fake()->phoneNumber(),
        ];
    }
}
