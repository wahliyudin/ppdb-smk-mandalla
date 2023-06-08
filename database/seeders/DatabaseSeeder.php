<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Siswa;
use App\Models\SiswaDokumen;
use App\Models\SiswaIdentitas;
use App\Models\SiswaOrangTua;
use App\Models\SiswaTesOnline;
use App\Models\Soal;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Siswa::factory(10)->create();
        SiswaDokumen::factory(10)->create();
        SiswaIdentitas::factory(10)->create();
        SiswaOrangTua::factory(10)->create();
        Soal::factory(10)->create();
        SiswaTesOnline::factory(10)->create();
    }
}
