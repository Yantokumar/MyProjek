<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function show($id)
    {
        // Ambil detail anime berdasarkan ID
        $response = Http::get("https://api.jikan.moe/v4/anime/{$id}/full");
        $anime = $response->json()['data'];

        return view('pages.detail', compact('anime'));
    }

    // Fungsi untuk menampilkan halaman favorit
    public function favorites()
    {
        // Ambil data favorit hanya milik user yang sedang login
        $myFavorites = Favorite::where('user_id', Auth::id())->get();

        return view('pages.favorit', compact('myFavorites'));
    }

    // Fungsi untuk menambah ke favorit
    public function addFavorite(Request $request)
    {
        if (! Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login dulu ya!');
        }

        Favorite::create([
            'user_id' => Auth::id(),
            'anime_mal_id' => $request->mal_id,
            'judul' => $request->judul,
            'gambar' => $request->gambar,
        ]);

        return back()->with('success', 'Berhasil ditambah ke favorit!');
    }

    // Tambahkan ini di dalam class AnimeController

    public function destroyFavorite($id)
    {
        // Cari data favorit berdasarkan ID dan pastikan itu milik user yang sedang login
        $favorite = Favorite::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($favorite) {
            $favorite->delete();

            return back()->with('success', 'Anime berhasil dihapus dari favorit!');
        }

        return back()->with('error', 'Data tidak ditemukan!');
    }
}
