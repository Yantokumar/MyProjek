<?php

namespace Database\Seeders;

use App\Models\Anime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class AnimeLibrary1kSeeder extends Seeder
{
    /**
     * Memasukkan 1.000 judul anime ke dalam database SQLite
     */
    public function run(): void
    {
        $jsonPath = database_path('data/animes_1000.json');

        if (! File::exists($jsonPath)) {
            $this->command?->error("File {$jsonPath} tidak ditemukan.");
            return;
        }

        $data = json_decode(File::get($jsonPath), true);
        if (empty($data)) {
            $this->command?->error("Data anime kosong.");
            return;
        }

        $this->command?->info("Memproses " . count($data) . " anime ke dalam database...");

        // Kosongkan tabel anime agar data bersih dan terstruktur
        Anime::truncate();

        // Masukkan dalam batch 100 untuk performa maksimal di SQLite
        $now = now();
        $chunks = array_chunk($data, 100);

        foreach ($chunks as $chunk) {
            $records = array_map(function ($item) use ($now) {
                return [
                    'mal_id' => $item['mal_id'] ?? null,
                    'judul' => $item['judul'],
                    'genre' => $item['genre'] ?? 'Anime',
                    'rating' => $item['rating'] ?? 8.0,
                    'gambar' => $item['gambar'] ?? null,
                    'sinopsis' => $item['sinopsis'] ?? '',
                    'tipe' => $item['tipe'] ?? 'TV',
                    'episodes' => $item['episodes'] ?? 12,
                    'status' => $item['status'] ?? 'Finished Airing',
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }, $chunk);

            Anime::insert($records);
        }

        $this->command?->info("Sukses mengimpor " . number_format(count($data)) . " anime ke tabel animes!");
    }
}
