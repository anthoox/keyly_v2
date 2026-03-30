<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first(); // Asumimos que ya creaste un usuario con el login de Laravel

        $categories = [
            ['name' => 'Redes Sociales', 'icon' => 'share-2'],
            ['name' => 'Bancos', 'icon' => 'credit-card'],
            ['name' => 'Trabajo', 'icon' => 'briefcase'],
            ['name' => 'Compras', 'icon' => 'shopping-cart'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'user_id' => 2,
                'name' => $category['name'],
                'icon' => $category['icon'],
            ]);
        }
    }
}
