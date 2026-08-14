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
            [
                'name' => 'Koffee, Çaý',
                'name_en' => 'Coffee, Tea',
                'name_ru' => 'Кофе, Чай',
                'img' => 'image/categorie/kofeCay.png'
            ],
            [
                'name' => 'Moxito',
                'name_en' => 'Moxito',
                'name_ru' => 'Махито',
                'img' => 'image/categorie/mohito.png'
            ],
            [
                'name' => 'Frappuçino',
                'name_en' => 'Frappuchino',
                'name_ru' => 'Фрапучино',
                'img' => 'image/categorie/frapucino.png'
            ],
            [
                'name' => 'Smuzi',
                'name_en' => 'Smoothie',
                'name_ru' => 'Смузи',
                'img' => 'image/categorie/Smuzi.png'
            ],
            [
                'name' => 'Limonad',
                'name_en' => 'Lemonade',
                'name_ru' => 'Лимонад',
                'img' => 'image/categorie/limonad.png'
            ],
            [
                'name' => 'Sowuk çay',
                'name_en' => 'Cold Tea',
                'name_ru' => 'Холодный  Чай',
                'img' => 'image/categorie/coldTea.png'
            ],
            [
                'name' => 'Şokolad we Kakao',
                'name_en' => 'Chocolate & Cocoa',
                'name_ru' => 'Шоколад и Какао',
                'img' => 'image/categorie/kakao.png'
            ],
            [
                'name' => 'Süýtli kokteýller',
                'name_en' => 'Milkshakes',
                'name_ru' => 'Молочные коктейли',
                'img' => 'image/categorie/Koktel.png'
            ],
            [
                'name' => 'Fresh şireler',
                'name_en' => 'Fresh Juices',
                'name_ru' => 'Свежевыжатые соки',
                'img' => 'image/categorie/sok.png'
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'name_en' => $category['name_en'],
                'name_ru' => $category['name_ru'],
                'img' => $category['img'],
            ]);
        }
    }
}
