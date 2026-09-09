<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anime>
 */
class AnimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mal_id' => fake()->unique()->numberBetween(1, 999999),
            'judul' => fake()->sentence(3),
            'genre' => fake()->randomElement(['Action, Adventure', 'Comedy, Romance', 'Sci-Fi, Fantasy', 'Drama, Mystery']),
            'rating' => fake()->randomFloat(2, 6, 9.5),
            'gambar' => 'https://cdn.myanimelist.net/images/anime/4/19644.jpg',
            'sinopsis' => fake()->paragraph(),
            'tipe' => 'TV',
            'episodes' => fake()->numberBetween(12, 24),
            'status' => 'Finished Airing',
        ];
    }
}
