<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Image;
use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Project::factory()
            ->count(5)
            ->create();

        Category::factory()
            ->count(3)
            ->create();

        Image::factory()
            ->count(5)
            ->create();
    }
}



