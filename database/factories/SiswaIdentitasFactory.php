<?php

namespace Database\Factories;

use App\Enums\Agama;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiswaIdentitas>
 */
class SiswaIdentitasFactory extends Factory
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
            'nisn' => fake()->randomNumber(),
            'nik' => fake()->randomNumber(),
            'jumlah_saudara' => fake()->randomNumber(),
            'anak_ke' => fake()->randomNumber(),
            'agama' => fake()->randomElement(Agama::cases()),
            'suku' => fake()->city(),
            'asal_sekolah' => fake()->city(),
            'no_ijazah' => fake()->randomNumber(),
            'berat_badan' => fake()->randomNumber(),
            'tinggi_badan' => fake()->randomNumber(),
            'riwayat_penyakit' => fake()->streetAddress(),
        ];
    }
}
