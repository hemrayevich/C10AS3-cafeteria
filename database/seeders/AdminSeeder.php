<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'isazx454@gmail.com'],
            [
                'name' => 'Admin',
                'password' => 'isahemra13',
                'role' => 'admin',
            ]
        );
    }
}
