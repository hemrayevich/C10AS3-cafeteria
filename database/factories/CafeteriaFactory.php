<?php

namespace Database\Factories;

use App\Models\Cafeteria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cafeteria>
 */
class CafeteriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $companyName = fake()->words(2, true);

        $image = ['image/cafeteria/defolt1.png', 'image/cafeteria/defoltCafe2.png', 'image/cafeteria/defoltCafe3.png'];

        $working_hours = ['08:00 - 22:00', '09:00 - 23:00', '08:00 - 00:00', '24/7'];

        return [
            'name' => ucfirst($companyName),
            'name_en' => ucfirst($companyName),
            'name_ru' => ucfirst($companyName),
            'img' => fake()->randomElement($image),
            'is_vip' => fake()->boolean(20),
            'address' => fake()->streetAddress(),
            'address_ru' => 'ул. ' . fake()->streetName() . ', д. ' . fake()->buildingNumber(),
            'address_en' => fake()->buildingNumber() . ' ' . fake()->streetName() . ' St.',
            'phone' => '+993 6' . fake()->numberBetween(1, 5) . ' ' . fake()->numerify('######'),
            'working_hours' => fake()->randomElement($working_hours),
        ];
    }
}
