<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Services\AnimeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnimeController extends Controller
{
    protected AnimeRepository $animeRepo;

    public function __construct(AnimeRepository $animeRepo)
    {
        $this->animeRepo = $animeRepo;
    }

    // --- HALAMAN BERANDA DENGAN 1.000+ ANIME, TABS, DAN PAGINASI LENGKAP ---
    public function index(Request $request)
    {
        $currentTab = $request->query('tab', 'all');
        $searchQuery = $request->query('q');

        // Paginasi 24 anime per halaman (total 42 halaman untuk 1.000 anime!)
        $animes = $this->animeRepo->getPaginatedAnimes(24, $currentTab, $searchQuery);
        $totalAnimeCount = $this->animeRepo->getTotalAnimeCount();

        return view('pages.beranda', [
            'animes' => $animes,
            'currentTab' => $currentTab,
            'searchQuery' => $searchQuery,
            'totalAnimeCount' => $totalAnimeCount,
            'isUsingMalKey' => $this->animeRepo->usesOfficialMalApi(),
        ]);
    }

    // --- HALAMAN KOLEKSI GENRE ANIME ---
    public function genre()
    {
        $allGenreData = $this->animeRepo->getGenresWithAnimes();

        return view('pages.genre', [
            'allGenreData' => $allGenreData,
            'isUsingMalKey' => $this->animeRepo->usesOfficialMalApi(),
        ]);
    }

    // --- DETAIL ANIME ---
    public function show($id)
    {
        $anime = $this->animeRepo->getAnimeDetail($id);

        if (! $anime) {
            abort(404, 'Detail anime tidak ditemukan atau sedang tidak dapat diakses.');
        }

        $isFavorited = false;
        if (Auth::check()) {
            $isFavorited = Favorite::where('user_id', Auth::id())
                ->where('anime_mal_id', $id)
                ->exists();
        }

        return view('pages.detail', compact('anime', 'isFavorited'));
    }

    // --- HALAMAN FAVORIT PENGGUNA ---
    public function favorites()
    {
        $myFavorites = Favorite::where('user_id', Auth::id())->latest()->get();

        return view('pages.favorit', compact('myFavorites'));
    }

    // --- MENAMBAH KE FAVORIT DENGAN PROTEKSI DUPLIKASI ---
    public function addFavorite(Request $request)
    {
        $request->validate([
            'mal_id' => 'required',
            'judul' => 'required',
            'gambar' => 'required',
        ]);

        $existing = Favorite::where('user_id', Auth::id())
            ->where('anime_mal_id', $request->mal_id)
            ->first();

        if ($existing) {
            return back()->with('error', 'Anime ini sudah ada dalam daftar favorit Anda!');
        }

        Favorite::create([
            'user_id' => Auth::id(),
            'anime_mal_id' => $request->mal_id,
            'judul' => $request->judul,
            'gambar' => $request->gambar,
        ]);

        return back()->with('success', 'Berhasil ditambahkan ke daftar favorit!');
    }

    // --- MENGHAPUS DARI FAVORIT ---
    public function destroyFavorite($id)
    {
        $favorite = Favorite::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($favorite) {
            $favorite->delete();

            return back()->with('success', 'Anime berhasil dihapus dari favorit!');
        }

        return back()->with('error', 'Data favorit tidak ditemukan atau bukan milik Anda!');
    }
}
