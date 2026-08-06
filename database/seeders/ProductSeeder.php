<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'category_id' => 1,
            'name' => 'Cappuccino',
            'description' => 'Kopi susu creamy',
            'price' => 25000,
            'is_active' => 1,
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Latte',
            'description' => 'Kopi susu lembut',
            'price' => 28000,
            'is_active' => 1,
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Matcha',
            'description' => 'Minuman teh hijau',
            'price' => 30000,
            'is_active' => 1,
        ]);
    }
}