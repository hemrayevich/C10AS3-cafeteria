<?php

namespace Database\Seeders;

use App\Models\Cafeteria;
use App\Models\Drink;
use App\Models\Order;
use App\Models\Reviews;
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
        User::factory(40)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Cafeteria::factory(50)->create();

        $this->call([
            CategorySeeder::class,
            CafeteriaSeeder::class,
            DrinkSeeder::class,
        ]);

        Drink::factory(100)->create();

        $drinks = Drink::all();
        Order::factory(23)->create()->each(function ($order) use ($drinks) {
            $randomDrinks = $drinks->random(rand(1, 6));

            foreach ($randomDrinks as $drink) {
                $order->items()->create([
                    'drink_id' => $drink->id,
                    'price' => $drink->price,
                    'quantity' => rand(1, 5),
                ]);
            }
        });

        Reviews::factory(50)->create();

        // ->recycle($users)->recycle($drinks)


    }
}
