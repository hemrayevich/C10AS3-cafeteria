<?php

namespace Database\Factories;

use App\Models\Cafeteria;
use App\Models\Category;
use App\Models\Drink;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Drink>
 */
class DrinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cafeteriaId = Cafeteria::inRandomOrder()->first()->id;
        $categoryId = Category::inRandomOrder()->first()->id;
        $isDiscount = fake()->boolean(15);

        $drinkName = fake()->words(2, true);

        $description = fake()->paragraph();

        $weight = ['250ml', '330ml', '500ml', '1L'];

        $image = ['image/drinks/espresso.jpg', 'image/drinks/americano.jpg', 'image/drinks/capucino.jpg'];

        return [
            'cafeteria_id' => $cafeteriaId,
            'category_id' => $categoryId,
            'name' => $drinkName,
            'name_en' => $drinkName,
            'name_ru' => $drinkName,
            'image' => fake()->randomElement($image),
            'price' => fake()->randomFloat(2, 10, 300),
            'description' => $description,
            'description_en' => $description,
            'description_ru' => $description,
            'weight' => fake()->randomElement($weight),
            'is_discount' => $isDiscount,
            'discount_percent' => $isDiscount ? fake()->numberBetween(5, 30) : null,
            'is_available' => fake()->boolean(85),
        ];
    }
}
