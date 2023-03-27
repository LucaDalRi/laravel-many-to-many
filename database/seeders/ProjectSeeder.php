<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// model
use App\Models\Project;

// helpers

use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $title = $faker->unique()->sentence(4);

            Project::create([
                'title' => $title,
                'description' => $faker->paragraph(),
                'slug' => Str::slug($title),
            ]);
        }
    }
}
