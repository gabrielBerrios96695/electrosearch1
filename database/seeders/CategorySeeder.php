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
        $category = new Category();
        $category->name = 'Celular';
        $category->user_id = 1; // Add this line
        $category->save();
        $category = new Category();
        $category->name = 'Accesorio';
        $category->user_id = 1; // Add this line
        $category->save();
        $category = new Category();
        $category->name = 'Laptop';
        $category->user_id = 1; // Add this line
        $category->save();
        $category = new Category();
        $category->name = 'PC';
        $category->user_id = 2; // Add this line
        $category->save();
        
    }
}
