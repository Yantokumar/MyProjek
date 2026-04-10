<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class AnimeController extends Controller
{
    // --- MESIN UNTUK HALAMAN BERANDA ---
    public function index()
    {
        $response = Http::get('https://api.jikan.moe/v4/top/anime?filter=bypopularity&limit=12');
        $animes = $response->json()['data'];

        return view('pages.beranda', [
            'animes' => $animes,
        ]);
    }

    // --- MESIN UNTUK HALAMAN GENRE (OTOMATIS) ---
    public function genre()
    {
        $genreListResponse = Http::get('https://api.jikan.moe/v4/genres/anime');
        $genres = $genreListResponse->json()['data'];

        $allGenreData = [];
        // Kita batasi 10-15 saja agar tidak terlalu berat loadingnya
        foreach (array_slice($genres, 0, 15) as $genre) {
            $animeResponse = Http::get('https://api.jikan.moe/v4/anime?genres='.$genre['mal_id'].'&limit=8');
            $allGenreData[] = [
                'name' => $genre['name'],
                'animes' => $animeResponse->json()['data'] ?? [],
            ];
        }

        return view('pages.genre', compact('allGenreData'));
    }
}
