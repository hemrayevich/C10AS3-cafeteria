<?php

namespace Database\Seeders;

use App\Models\Cafeteria;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CafeteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $cafeterias = [
            [
                'name' => 'Coffee House',
                'img' => 'cafeterias/coffee_house.jpg',
                'is_vip' => true,
                'address' => 'Aşgabat ş., 10 ýyl Abadançylyk köç., 14',
                'phone' => '+993 12 48-00-11',
                'working_hours' => '08:00 - 23:00',
            ],

            [
                'name' => 'Barista Cafe',
                'img' => 'cafeterias/barista.jpg',
                'is_vip' => true,
                'address' => 'Aşgabat ş., «Berkarar» SOW, 3-nji gat',
                'phone' => '+993 12 46-88-00',
                'working_hours' => '09:00 - 22:00',
            ],

            [
                'name' => 'Soltan Coffee',
                'img' => 'cafeterias/soltan.jpg',
                'is_vip' => false,
                'address' => 'Aşgabat ş., Atamyrat Nyýazow şaýoly, 122',
                'phone' => '+993 12 21-15-15',
                'working_hours' => '08:00 - 23:00',
            ],

            [
                'name' => 'Zip Coffee',
                'img' => 'cafeterias/zip_coffee.jpg',
                'is_vip' => true,
                'address' => 'Aşgabat ş., Magtymguly şaýoly, 78',
                'phone' => '+993 12 94-22-10',
                'working_hours' => '08:00 - 23:00',
            ],

            [
                'name' => 'Mado',
                'img' => 'cafeterias/mado.jpg',
                'is_vip' => true,
                'address' => 'Aşgabat ş., «Berkarar» SOW, 1-nji gat',
                'phone' => '+993 12 46-80-00',
                'working_hours' => '09:00 - 23:00',
            ],

            [
                'name' => 'Kofeomaniya',
                'img' => 'cafeterias/kofeomaniya.jpg',
                'is_vip' => false,
                'address' => 'Aşgabat ş., Türkmenbaşy şaýoly, 54',
                'phone' => '+993 12 45-12-34',
                'working_hours' => '08:30 - 22:30',
            ],

            [
                'name' => 'Cup & Cup',
                'img' => 'cafeterias/cup_and_cup.jpg',
                'is_vip' => false,
                'address' => 'Aşgabat ş., Bitarap Türkmenistan şaýoly, 15',
                'phone' => '+993 12 92-05-05',
                'working_hours' => '08:00 - 22:00',
            ],
        ];

        foreach ($cafeterias as $cafeteria) {
            Cafeteria::create($cafeteria);
        }
    }
}
