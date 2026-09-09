<?php

namespace App\Services;

use App\Services\Contracts\AnimeProviderInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MyAnimeListApiService implements AnimeProviderInterface
{
    protected ?string $clientId;
    protected string $baseUrl;

    public function __construct()
    {
        $this->clientId = config('myanimelist.client_id');
        $this->baseUrl = config('myanimelist.base_url', 'https://api.myanimelist.net/v2');
    }

    public function isConfigured(): bool
    {
        return !empty($this->clientId);
    }

    protected function client()
    {
        return Http::withoutVerifying()
            ->withHeaders([
                'X-MAL-CLIENT-ID' => $this->clientId,
                'User-Agent' => 'AnimeLib/1.0',
                'Accept' => 'application/json',
            ])
            ->timeout(15);
    }

    public function getTopAnimes(int $limit = 50, string $rankingType = 'all'): array
    {
        if (! $this->isConfigured()) {
            return [];
        }

        try {
            $fields = 'id,title,main_picture,mean,rank,popularity,genres,synopsis,status,num_episodes,media_type,studios';
            $response = $this->client()->get("{$this->baseUrl}/anime/ranking", [
                'ranking_type' => $rankingType,
                'limit' => min($limit, 100),
                'fields' => $fields,
            ]);

            if ($response->successful()) {
                $raw = $response->json()['data'] ?? [];
                return array_map([$this, 'transformNode'], $raw);
            }
        } catch (\Throwable $e) {
            Log::warning('MAL API ranking error: '.$e->getMessage());
        }

        return [];
    }

    public function getAnimeDetail(int|string $id): ?array
    {
        if (! $this->isConfigured()) {
            return null;
        }

        try {
            $fields = 'id,title,main_picture,alternative_titles,start_date,end_date,synopsis,mean,rank,popularity,media_type,status,genres,num_episodes,start_season,source,rating,pictures,background,studios';
            $response = $this->client()->get("{$this->baseUrl}/anime/{$id}", [
                'fields' => $fields,
            ]);

            if ($response->successful()) {
                $raw = $response->json();
                return $this->transformItem($raw);
            }
        } catch (\Throwable $e) {
            Log::warning("MAL API detail error for ID {$id}: ".$e->getMessage());
        }

        return null;
    }

    public function searchAnime(string $query, int $limit = 24): array
    {
        if (! $this->isConfigured()) {
            return [];
        }

        try {
            $fields = 'id,title,main_picture,mean,genres,synopsis,status,media_type,num_episodes';
            $response = $this->client()->get("{$this->baseUrl}/anime", [
                'q' => $query,
                'limit' => min($limit, 50),
                'fields' => $fields,
            ]);

            if ($response->successful()) {
                $raw = $response->json()['data'] ?? [];
                return array_map([$this, 'transformNode'], $raw);
            }
        } catch (\Throwable $e) {
            Log::warning("MAL API search error for '{$query}': ".$e->getMessage());
        }

        return [];
    }

    public function transformNode(array $row): array
    {
        $node = $row['node'] ?? $row;
        return $this->transformItem($node);
    }

    public function transformItem(array $item): array
    {
        $largeImg = $item['main_picture']['large'] ?? ($item['main_picture']['medium'] ?? null);
        $mediumImg = $item['main_picture']['medium'] ?? $largeImg;

        $genres = array_map(function ($g) {
            return [
                'mal_id' => $g['id'] ?? null,
                'name' => $g['name'] ?? '',
            ];
        }, $item['genres'] ?? []);

        $studios = array_map(function ($s) {
            return [
                'name' => $s['name'] ?? '',
            ];
        }, $item['studios'] ?? []);

        return [
            'mal_id' => $item['id'] ?? null,
            'title' => $item['title'] ?? 'Untitled',
            'title_japanese' => $item['alternative_titles']['ja'] ?? null,
            'images' => [
                'jpg' => [
                    'large_image_url' => $largeImg,
                    'image_url' => $mediumImg,
                ],
            ],
            'score' => $item['mean'] ?? null,
            'rank' => $item['rank'] ?? null,
            'popularity' => $item['popularity'] ?? null,
            'genres' => $genres,
            'synopsis' => $item['synopsis'] ?? null,
            'status' => ucwords(str_replace('_', ' ', $item['status'] ?? 'Unknown')),
            'episodes' => $item['num_episodes'] ?? null,
            'type' => strtoupper($item['media_type'] ?? 'TV'),
            'studios' => $studios,
            'source' => ucwords(str_replace('_', ' ', $item['source'] ?? '-')),
            'rating' => $item['rating'] ?? null,
            'background' => $item['background'] ?? null,
        ];
    }
}
