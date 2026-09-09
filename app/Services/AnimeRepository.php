<?php

namespace App\Services;

use App\Models\Anime;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class AnimeRepository
{
    protected MyAnimeListApiService $malApi;
    protected JikanApiService $jikanApi;

    public function __construct(
        MyAnimeListApiService $malApi,
        JikanApiService $jikanApi
    ) {
        $this->malApi = $malApi;
        $this->jikanApi = $jikanApi;
    }

    public function usesOfficialMalApi(): bool
    {
        return $this->malApi->isConfigured();
    }

    /**
     * Mengambil daftar anime dengan dukungan paginasi lengkap (1.000+ anime)
     */
    public function getPaginatedAnimes(int $perPage = 24, string $tab = 'all', ?string $search = null): LengthAwarePaginator
    {
        $query = Anime::query();

        // Filter Pencarian
        if (! empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'LIKE', "%{$search}%")
                  ->orWhere('genre', 'LIKE', "%{$search}%");
            });
        }

        // Filter Tab Kategori
        match ($tab) {
            'airing' => $query->where('status', 'Currently Airing'),
            'movie' => $query->where('tipe', 'Movie'),
            'bypopularity' => $query->orderBy('rating', 'desc'),
            default => $query->orderBy('rating', 'desc'),
        };

        // Fallback jika belum ada data di database: seed data default
        if ($query->count() === 0 && empty($search)) {
            \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'AnimeLibrary1kSeeder', '--force' => true]);
        }

        return $query->paginate($perPage)->withQueryString();
    }

    /**
     * Ambil detail lengkap anime (lokal 1k library didukung API eksternal)
     */
    public function getAnimeDetail(int|string $id): ?array
    {
        $cacheKey = "anime_detail_v3_{$id}";

        $cached = Cache::get($cacheKey);
        if (! empty($cached)) {
            return $cached;
        }

        // 1. Cek dari database lokal 1.000 anime
        $local = Anime::where('mal_id', $id)->orWhere('id', $id)->first();
        if ($local) {
            $detail = $local->toCatalogArray();
            Cache::put($cacheKey, $detail, 86400);
            return $detail;
        }

        // 2. Jika tidak ada di lokal, coba panggil Official MAL API
        $detail = null;
        if ($this->malApi->isConfigured()) {
            $detail = $this->malApi->getAnimeDetail($id);
        }

        // 3. Fallback Jikan API
        if (empty($detail)) {
            $detail = $this->jikanApi->getAnimeDetail($id);
        }

        if (! empty($detail)) {
            Cache::put($cacheKey, $detail, 86400);
        }

        return $detail;
    }

    /**
     * Mengelompokkan anime ke dalam genre dari perpustakaan 1.000 anime
     */
    public function getGenresWithAnimes(): array
    {
        $cacheKey = 'genre_collection_1k_v3';

        return Cache::remember($cacheKey, 86400, function () {
            $animes = Anime::orderBy('rating', 'desc')->take(300)->get();

            if ($animes->isEmpty()) {
                \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'AnimeLibrary1kSeeder', '--force' => true]);
                $animes = Anime::orderBy('rating', 'desc')->take(300)->get();
            }

            $genresMap = [];

            foreach ($animes as $anime) {
                $genreList = array_map('trim', explode(',', $anime->genre ?? ''));
                $itemArray = $anime->toCatalogArray();

                foreach ($genreList as $gName) {
                    if (empty($gName)) {
                        continue;
                    }

                    if (! isset($genresMap[$gName])) {
                        $genresMap[$gName] = [
                            'name' => $gName,
                            'animes' => [],
                        ];
                    }

                    if (count($genresMap[$gName]['animes']) < 15) {
                        $genresMap[$gName]['animes'][] = $itemArray;
                    }
                }
            }

            // Urutkan berdasarkan genre terbanyak
            uasort($genresMap, fn ($a, $b) => count($b['animes']) <=> count($a['animes']));

            return array_values($genresMap);
        });
    }

    /**
     * Total anime dalam perpustakaan lokal
     */
    public function getTotalAnimeCount(): int
    {
        return Anime::count();
    }
}
