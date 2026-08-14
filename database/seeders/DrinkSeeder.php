<?php

namespace Database\Seeders;

use App\Models\Drink;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DrinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drinks = [
            [
                'name' => 'Espresso',
                'name_ru' => 'Эспрессо',
                'name_en' => 'Espresso',
                'cafeteria_id' => 1,
                'category_id' => 1,
                'image' => 'drinks/espresso.jpg',
                'price' => 20.00,
                'description' => 'Güyçli we goýy adaty kofe içgisi.',
                'description_ru' => 'Крепкий и насыщенный классический кофе.',
                'description_en' => 'Strong and rich classic coffee.',
                'weight' => '30 ml',
                'is_available' => true,
                'is_discount' => false,
                'discount_percent' => null,
            ],
            [
                'name' => 'Amerikano',
                'name_ru' => 'Американо',
                'name_en' => 'Americano',
                'cafeteria_id' => 1,
                'category_id' => 1,
                'image' => 'drinks/americano.jpg',
                'price' => 25.00,
                'description' => 'Yssy suw goşulan ýumşak espresso.',
                'description_ru' => 'Мягкий эспрессо с добавлением горячей воды.',
                'description_en' => 'Smooth espresso diluted with hot water.',
                'weight' => '200 ml',
                'is_discount' => true,
                'discount_percent' => 10,
                'is_available' => true,
            ],
            [
                'name' => 'Kapuçino',
                'name_ru' => 'Капучино',
                'name_en' => 'Cappuccino',
                'cafeteria_id' => 2,
                'category_id' => 1,
                'image' => 'drinks/cappuccino.jpg',
                'price' => 35.00,
                'description' => 'Süýt köpürjigi we espresso garyşygy.',
                'description_ru' => 'Сбалансированное сочетание эспрессо и молочной пены.',
                'description_en' => 'Balanced mixture of espresso and foamed milk.',
                'weight' => '250 ml',
                'is_discount' => false,
                'discount_percent' => null,
                'is_available' => true,
            ],
            [
                'name' => 'Latte',
                'name_ru' => 'Латте',
                'name_en' => 'Latte',
                'cafeteria_id' => 2,
                'category_id' => 1,
                'image' => 'drinks/latte.jpg',
                'price' => 38.00,
                'description' => 'Názik süýtli kofe içgisi.',
                'description_ru' => 'Нежный кофейный напиток с большим количеством молока.',
                'description_en' => 'Delicate coffee drink with plenty of milk.',
                'weight' => '300 ml',
                'is_discount' => true,
                'discount_percent' => 15,
                'is_available' => true,
            ],
            [
                'name' => 'Flat White',
                'name_ru' => 'Флэт Уайт',
                'name_en' => 'Flat White',
                'cafeteria_id' => 3,
                'category_id' => 1,
                'image' => 'drinks/flat_white.jpg',
                'price' => 40.00,
                'description' => 'Goşa espresso we ýuka süýt köpürjigi.',
                'description_ru' => 'Двойной эспрессо с тонким слоем бархатистой пены.',
                'description_en' => 'Double espresso with a thin layer of velvety foam.',
                'weight' => '200 ml',
                'is_discount' => false,
                'discount_percent' => null,
                'is_available' => true,
            ],
            [
                'name' => 'Raf Kofe',
                'name_ru' => 'Раф кофе',
                'name_en' => 'Raf Coffee',
                'cafeteria_id' => 3,
                'category_id' => 1,
                'image' => 'drinks/raf.jpg',
                'price' => 45.00,
                'description' => 'Gaimak we wanil şekerli tatar kofe.',
                'description_ru' => 'Кофе со сливками и ванильным сахаром.',
                'description_en' => 'Coffee whipped with cream and vanilla sugar.',
                'weight' => '250 ml',
                'is_discount' => true,
                'discount_percent' => 20,
                'is_available' => true,
            ],
            [
                'name' => 'Mokka',
                'name_ru' => 'Мокка',
                'name_en' => 'Mocha',
                'cafeteria_id' => 4,
                'category_id' => 1,
                'image' => 'drinks/mocha.jpg',
                'price' => 42.00,
                'description' => 'Şokolad we espresso garyşykly süýtli kofe.',
                'description_ru' => 'Кофейно-молочный напиток с шоколадным вкусом.',
                'description_en' => 'Coffee drink with milk and chocolate flavor.',
                'weight' => '300 ml',
                'is_discount' => false,
                'discount_percent' => null,
                'is_available' => true,
            ],
        ];

        foreach ($drinks as $drink) {
            Drink::create($drink);
        }
    }
}
