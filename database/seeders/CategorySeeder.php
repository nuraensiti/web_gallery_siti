<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['nama' => 'informasi'],
            ['nama' => 'agenda'],
            ['nama' => 'galeri']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
} 