<?php

namespace App\Services;

use App\Services\Contracts\AnimeProviderInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class JikanApiService implements AnimeProviderInterface
{
    protected string $baseUrl = 'https://api.jikan.moe/v4';

    protected function client()
    {
        return Http::withoutVerifying()
            ->withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36',
                'Accept' => 'application/json',
            ])
            ->timeout(15);
    }

    public function getTopAnimes(int $limit = 50, string $rankingType = 'all'): array
    {
        try {
            // Endpoint Jikan top/anime paling stabil dengan limit=25
            $response = $this->client()->get("{$this->baseUrl}/top/anime?limit=25");

            if ($response->successful()) {
                $page1 = $response->json()['data'] ?? [];

                // Jika minta lebih dari 25, ambil page 2 (total 50 anime)
                if ($limit > 25) {
                    usleep(350000); // 350ms delay
                    $res2 = $this->client()->get("{$this->baseUrl}/top/anime?page=2&limit=25");
                    if ($res2->successful()) {
                        $page2 = $res2->json()['data'] ?? [];
                        return array_merge($page1, $page2);
                    }
                }

                return $page1;
            }
        } catch (\Throwable $e) {
            Log::warning('Jikan API top anime error: '.$e->getMessage());
        }

        return [];
    }

    public function getAnimeDetail(int|string $id): ?array
    {
        try {
            $response = $this->client()->get("{$this->baseUrl}/anime/{$id}/full");

            if ($response->successful()) {
                return $response->json()['data'] ?? null;
            }
        } catch (\Throwable $e) {
            Log::warning("Jikan API detail error for ID {$id}: ".$e->getMessage());
        }

        return null;
    }

    public function searchAnime(string $query, int $limit = 24): array
    {
        try {
            $response = $this->client()->get("{$this->baseUrl}/anime", [
                'q' => $query,
                'limit' => 25,
            ]);

            if ($response->successful()) {
                $data = $response->json()['data'] ?? [];
                if (! empty($data)) {
                    return $data;
                }
            }
        } catch (\Throwable $e) {
            Log::warning("Jikan API search query '{$query}': ".$e->getMessage());
        }

        // Fallback pencarian: filter dari katalog top anime jika Jikan search timeout
        $catalog = $this->getTopAnimes(50);
        $filtered = array_filter($catalog, function ($item) use ($query) {
            return stripos($item['title'] ?? '', $query) !== false;
        });

        return array_values($filtered);
    }
}
