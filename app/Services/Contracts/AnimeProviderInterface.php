<?php

namespace App\Services\Contracts;

interface AnimeProviderInterface
{
    /**
     * Mengambil daftar peringkat anime teratas / populer
     */
    public function getTopAnimes(int $limit = 50, string $rankingType = 'all'): array;

    /**
     * Mengambil detail lengkap anime berdasarkan ID MyAnimeList
     */
    public function getAnimeDetail(int|string $id): ?array;

    /**
     * Mencari anime berdasarkan kata kunci
     */
    public function searchAnime(string $query, int $limit = 24): array;
}
