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
        Category::factory()->create([
            "name" => "Web Design",
            "slug" => "web-design",
            "color" => "bg-red-100"
        ]);

        Category::factory()->create([
            "name" => "Web Development",
            "slug" => "web-development",
            "color" => "bg-yellow-100"
        ]);

        Category::factory()->create([
            "name" => "Artificial Intelligence",
            "slug" => "ai",
            "color" => "bg-blue-100"
        ]);
    }
}
