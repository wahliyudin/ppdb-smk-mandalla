<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\Role;
use App\Models\Siswa;
use App\Models\SiswaDokumen;
use App\Models\SiswaIdentitas;
use App\Models\SiswaOrangTua;
use App\Models\SiswaTesOnline;
use App\Models\Soal;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'ali',
            'email' => 'ali@gmail.com',
            'password' => Hash::make(1234567890),
            'role' => Role::ADMIN,
        ]);
        foreach (Storage::allDirectories('public') as $directory) {
            Storage::deleteDirectory($directory);
        }
        User::factory(10)->create();
        Siswa::factory(10)->create();
        SiswaDokumen::factory(10)->create();
        SiswaIdentitas::factory(10)->create();
        SiswaOrangTua::factory(10)->create();
        Soal::factory(10)->create();
        SiswaTesOnline::factory(10)->create();
    }
}
