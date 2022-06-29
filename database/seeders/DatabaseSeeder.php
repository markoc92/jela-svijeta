<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Category;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use Database\Seeders\LanguageSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {
        $this->call(LanguageSeeder::class);

        Category::factory(20)->create();
        Tag::factory(25)->create();
        Ingredient::factory(50)->create();

        $this->call(MealSeeder::class);
        $this->call(MealTagSeeder::class);
        $this->call(MealIngredientSeeder::class);
    }
}
