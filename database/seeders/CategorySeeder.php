<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Koffee', 'name_en' => 'Coffee', 'name_ru' => 'Кофе'],
            ['name' => 'Çaý', 'name_en' => 'Tea', 'name_ru' => 'Чай'],
            ['name' => 'Smuzi', 'name_en' => 'Smoothie', 'name_ru' => 'Смузи'],
            ['name' => 'Limonad', 'name_en' => 'Lemonade', 'name_ru' => 'Лимонад'],
            ['name' => 'Sowuk koffee', 'name_en' => 'Cold Coffee', 'name_ru' => 'Холодный кофе'],
            ['name' => 'Şokolad we Kakao', 'name_en' => 'Chocolate & Cocoa', 'name_ru' => 'Шоколад и Какао'],
            ['name' => 'Süýtli kokteýller', 'name_en' => 'Milkshakes', 'name_ru' => 'Молочные коктейли'],
            ['name' => 'Fresh şireler', 'name_en' => 'Fresh Juices', 'name_ru' => 'Свежевыжатые соки'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'name_en' => $category['name_en'],
                'name_ru' => $category['name_ru'],
            ]);
        }
    }
}
