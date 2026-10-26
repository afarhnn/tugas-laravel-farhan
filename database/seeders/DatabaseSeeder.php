<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Dosen::query()->insert([
            [
                'nidn' => '081277238276',
                'nama' => 'Prof. Suyanto, S.Kom., M.Kom.',
                'jabatan' => 'Rektor',
                'kepakaran' => 'Artificial Intelegence',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nidn' => '081276535312',
                'nama' => 'Rahmat Mulyana, S.Kom., M.Kom.',
                'jabatan' => 'Dosen',
                'kepakaran' => 'Sistem Basis Data',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
