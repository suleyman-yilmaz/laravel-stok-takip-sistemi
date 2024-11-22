<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'id' => 1,
            'name' => 'Süleyman Yılmaz',
            'email' => 'suleymanymz50@gmail.com',
            'password' => '*1*5*9*7*5*3*',
            'gender' => 1,
        ]);
    }
}
