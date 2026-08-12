<?php

namespace Database\Factories;

use App\Models\Cafeterias;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cafeterias>
 */
class CafeteriasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $companyName = fake()->words(2, true);

        return [
            'name' => ucfirst($companyName),
            'img' => 'cafeterias/' . fake()->numberBetween(1, 5) . '.jpg',
            'is_vip' => fake()->boolean(20),
            'address' => fake()->streetAddress(),
            'address_ru' => 'ул. ' . fake()->streetName() . ', д. ' . fake()->buildingNumber(),
            'address_en' => fake()->buildingNumber() . ' ' . fake()->streetName() . ' St.',
            'phone' => '+993 6' . fake()->numberBetween(1, 5) . ' ' . fake()->numerify('######'),
            'working_hours' => fake()->randomElement(['08:00 - 22:00', '09:00 - 23:00', '08:00 - 00:00', '24/7']),
        ];
    }
}
