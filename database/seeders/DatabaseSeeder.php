<?php

namespace Database\Seeders;

use App\Models\Cafeterias;
use App\Models\Drink;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Cafeterias::factory(50)->create();

        $this->call([
            CategorySeeder::class,
            CafeteriasSeeder::class,
            DrinkSeeder::class,
        ]);

        Drink::factory(100)->create();


    }
}
