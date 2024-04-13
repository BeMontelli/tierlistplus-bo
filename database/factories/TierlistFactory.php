<?php

namespace Database\Factories;

use App\Models\Tierlist;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tierlist>
 */
class TierlistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->words(2, true);
        $slug = Tierlist::getUniqueSlug($title);
        return [
            'title' => $title,
            'slug' => $slug,
            'description' => fake()->paragraph(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
