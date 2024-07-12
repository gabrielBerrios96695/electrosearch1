<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     /*
     'name',
        'description',
        'price',
        'stock',
        'category_id',
        'user_id',
     */
    public function run(): void
    {
        $product = new Product();
        $product->name = 'Samsung Galaxy S21';
        $product->description = 'Celular de Ultima generacion';
        $product->price = 1800;
        $product->stock = 10; 
        $product->category_id = 1;
        $product->user_id = 1;
        $product->save();

    }
}
