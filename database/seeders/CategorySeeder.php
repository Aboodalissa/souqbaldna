<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'مشغولات يدوية', 'icon' => '🧶'],
            ['name' => 'ملابس تراثية', 'icon' => '👘'],
            ['name' => 'أطعمة منزلية', 'icon' => '🍯'],
            ['name' => 'مجوهرات وإكسسوارات', 'icon' => '💍'],
            ['name' => 'ديكور وزينة', 'icon' => '🏺'],
            ['name' => 'عطور وصابون', 'icon' => '🧴'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}