<?php

namespace Tests\Feature;

use App\Models\Anime;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnimeLibraryTest extends TestCase
{
    use RefreshDatabase;

    public function test_beranda_displays_paginated_anime(): void
    {
        Anime::factory()->count(30)->create();

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewHas('animes');
        $this->assertEquals(24, count($response->viewData('animes')));
        $this->assertEquals(30, $response->viewData('totalAnimeCount'));
    }

    public function test_beranda_search_filters_anime(): void
    {
        Anime::create([
            'mal_id' => 99901,
            'judul' => 'Steins;Gate 0',
            'genre' => 'Sci-Fi, Thriller',
            'rating' => 8.5,
            'gambar' => 'https://cdn.myanimelist.net/images/anime/1375/93621.jpg',
            'sinopsis' => 'A brilliant anime about time travel.'
        ]);

        Anime::create([
            'mal_id' => 99902,
            'judul' => 'Naruto Shippuden',
            'genre' => 'Action, Adventure',
            'rating' => 8.2,
            'gambar' => 'https://cdn.myanimelist.net/images/anime/1565/111305.jpg',
            'sinopsis' => 'Ninja adventures in Hidden Leaf village.'
        ]);

        $response = $this->get('/?q=Steins');
        $response->assertStatus(200);
        $response->assertSee('Steins;Gate 0');
        $response->assertDontSee('Naruto Shippuden');
    }

    public function test_anime_detail_page_loads_correctly(): void
    {
        $anime = Anime::create([
            'mal_id' => 99903,
            'judul' => 'Frieren: Beyond Journey\'s End',
            'genre' => 'Adventure, Fantasy',
            'rating' => 9.38,
            'gambar' => 'https://cdn.myanimelist.net/images/anime/1015/138075.jpg',
            'sinopsis' => 'An elf mage reflecting on time and mortality.'
        ]);

        $response = $this->get('/anime/' . $anime->mal_id);
        $response->assertStatus(200);
        $response->assertSee('Frieren: Beyond Journey');
        $response->assertSee('9.38');
    }

    public function test_admin_anime_index_displays_paginated_list(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        Anime::factory()->count(35)->create();

        $response = $this->actingAs($admin)->get('/admin/anime');
        $response->assertStatus(200);
        $response->assertViewHas('animes');
        $this->assertEquals(25, count($response->viewData('animes')));
        $this->assertEquals(35, $response->viewData('animes')->total());
    }
}
