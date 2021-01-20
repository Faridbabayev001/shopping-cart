<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Jamaica Blue Mountain',
                'image' => 'jamaica_blue.jpg',
                'price' => 19.50,
                'stock' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kopi Luwak',
                'image' => 'kopi_luwak.jpg',
                'price' => 29.50,
                'stock' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hot Chocolate Sticks',
                'image' => 'hot_chocolate.jpg',
                'price' => 1.25,
                'stock' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Everyday Espresso Blend',
                'image' => 'espresso.jpg',
                'price' => 6.45,
                'stock' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Roaster\'s Choice',
                'image' => 'roaster.jpg',
                'price' => 6.22,
                'stock' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Green Jamaica Blue Mountain',
                'image' => 'jamaica_green.jpg',
                'price' => 110,
                'stock' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Green Monsoon Malabar Coffee Beans',
                'image' => 'monsoon.jpg',
                'price' => 12.47,
                'stock' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Product::insert($products);
    }
}
