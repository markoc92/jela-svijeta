<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $locales = Language::pluck('locale')->toArray();

        $data = [
            'created_at' => $this->faker->dateTimeBetween('-7 days', '-4 days'),
            'updated_at' => null,
            'deleted_at' => null,
        ];

        foreach ($locales as $locale) {
            $data[$locale] = [
                'title' => 'Meal-Title - ' . strtoupper($locale) . ' - ' . $this->faker->words(3, true),
                'description' => 'Meal-Description - ' . strtoupper($locale) . ' - ' . $this->faker->sentence()
            ];
        }

        return $data;
    }
}
