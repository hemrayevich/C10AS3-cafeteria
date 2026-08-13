<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class ordersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $userId = User::inRandomOrder()->first()?->id ?? User::factory();
        $cafeteriaId = Cafeteria::inRandomOrder()->first()?->id ?? Cafeteria::factory();

        return [
            //
        ];
    }
}
