<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;
    protected $fillable = [
        'mal_id',
        'judul',
        'genre',
        'rating',
        'gambar',
        'sinopsis',
        'tipe',
        'episodes',
        'status',
    ];

    /**
     * Konversi model Anime lokal ke format array standar katalog AnimeLib
     */
    public function toCatalogArray(): array
    {
        $genreList = array_map('trim', explode(',', $this->genre ?? 'Anime'));
        $formattedGenres = array_map(function ($g) {
            return ['name' => $g];
        }, $genreList);

        return [
            'id' => $this->id,
            'mal_id' => $this->mal_id ?? $this->id,
            'title' => $this->judul,
            'images' => [
                'jpg' => [
                    'large_image_url' => $this->gambar,
                    'image_url' => $this->gambar,
                ],
            ],
            'score' => $this->rating,
            'genres' => $formattedGenres,
            'synopsis' => $this->sinopsis,
            'status' => $this->status ?? 'Finished Airing',
            'episodes' => $this->episodes ?? 12,
            'type' => $this->tipe ?? 'TV',
            'studios' => [['name' => 'Official Animation Studio']],
        ];
    }
}
