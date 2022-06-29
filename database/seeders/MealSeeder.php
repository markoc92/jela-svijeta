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
        // Assign category for specific meals
        $categories = Category::pluck('id')->toArray();
        foreach ($categories as $category) {
            Meal::factory(10)->create(['category_id' => $category]);
        }

        // Add few meals with empty category
        Meal::factory(20)->create();

        // Update meals
        $mealsUpdate = Meal::all()->random(40)->each(function ($meal) {
            $meal->touch();
        });

        // Delete meals
        $mealsDelete = Meal::pluck('id')->random(20)->toArray();
        Meal::destroy($mealsDelete);
    }
}
