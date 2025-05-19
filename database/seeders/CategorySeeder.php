<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Smartphone', 'Laptop', 'Tablet', 'Smartwatch', 'Aksesoris Teknologi'];

        foreach ($categories as $categoryName) {
            \App\Models\Category::create([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName),
            ]);
        }
    }
}
