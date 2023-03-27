<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Guide',
            'Recensione',
            'News',
            'Offerte',
            'Eventi',
            'Off Topic',
            'Crypto',
        ];

        foreach ($categories as $category) {
            $newCategoty = Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
