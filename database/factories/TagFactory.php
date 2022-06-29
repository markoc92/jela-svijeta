<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $locales = Language::pluck('locale')->toArray();

        static $counter = 1;

        $data = [
            'slug' => 'tag-' . $counter++,
            'created_at' => $this->faker->dateTimeBetween('-2 weeks', '-1 week'),
            'updated_at' => $this->faker->dateTimeBetween('-2 weeks', '-1 week')
        ];

        foreach ($locales as $locale) {
            $data[$locale] = [
                'title' => 'Tag- ' . $counter - 1 . ' - ' . strtoupper($locale) . ' - ' . $this->faker->words(3, true)
            ];
        }

        return $data;
    }
}
