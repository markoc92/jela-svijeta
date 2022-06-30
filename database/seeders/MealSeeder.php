<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assign category for meals
        $categories = Category::pluck('id')->toArray();
        foreach ($categories as $category) {
            Meal::factory(10)->create(['category_id' => $category]);
        }

        // Add few meals with empty category
        Meal::factory(20)->create();

        // Update meals
        Meal::all()->random(60)->each(function ($meal) {
            $meal->touch();
        });

        // Delete meals
        Meal::all()->random(30)->each(function ($meal) {
            $meal->delete();
        });
    }
}
