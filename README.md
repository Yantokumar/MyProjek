<div align="center">

# 🎬 AnimeLib — Platform Perpustakaan Anime Digital

**Platform katalog dan perpustakaan anime digital modern berbasis Laravel 12 & SQLite dengan integrasi REST API MyAnimeList (Jikan) serta antarmuka bergaya platform streaming profesional.**

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![SQLite](https://img.shields.io/badge/Database-SQLite-003B57?style=for-the-badge&logo=sqlite&logoColor=white)](https://www.sqlite.org)
[![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![Tests](https://img.shields.io/badge/Tests-11%20Passed-brightgreen?style=for-the-badge&logo=githubactions&logoColor=white)](https://github.com/Yantokumar/Anime-Library)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg?style=for-the-badge)](LICENSE)

</div>

---

## 📖 Tentang Projek

**AnimeLib** adalah aplikasi web perpustakaan anime modern yang dibangun untuk memudahkan penggemar anime dalam mengeksplorasi, mencari, dan menyimpan koleksi anime favorit mereka. Aplikasi ini mengombinasikan kecepatan database lokal **SQLite** berkapasitas **3.000 judul anime pilihan** dengan fleksibilitas integrasi real-time dari **Jikan REST API** dan **Official MyAnimeList API**.

Desain antarmuka dibuat secara khusus (*bespoke*) dengan tema biru-putih modern, aksen *glassmorphism*, ikon vektor custom (tanpa template emoji generik AI), serta *Interactive Spotlight Showcase* ala platform streaming terkemuka (AniList, Crunchyroll, MyAnimeList).

---

## 🌟 Fitur Utama

### 1. 🗂️ Perpustakaan 3.000 Anime Terverifikasi
- **Poster Khas Per Judul & Season**: Setiap anime dan musim penayangan (misal: *Attack on Titan S1–Final*, *Demon Slayer Mugen Train / Entertainment District*, *My Hero Academia S1–S5*) memiliki poster resmi yang 100% berbeda dan akurat.
- **Paginasi Efisien**: Menampilkan 24 kartu anime per halaman (total 125 halaman) dengan navigasi URL yang rapi (`?page=X&tab=Y`).
- **Tab Kategori Pintar**:
  - *Peringkat Teratas* (Top Rated)
  - *Sedang Tayang* (Currently Airing)
  - *Film & Movie*
  - *Paling Populer* (By Popularity)

### 2. 🎨 UI/UX Modern & Ikon Anime Bespoke
- **Ikon Vektor Kustom**: Menggunakan komponen Blade mandiri (`resources/views/components/`) untuk logo brand, bintang rating bersegi (*faceted star*), api popularitas, radar siaran langsung, klise film sinema, dan hati favorit.
- **Hero Spotlight Showcase**: Menampilkan rekomendasi anime utama dengan poster, rating langsung, ringkasan sinopsis, dan tombol detail.
- **Pencarian Cepat & Filter Kata Kunci**: Bar pencarian futuristik dengan filter tag instan (*Action, Fantasy, Romance, Drama*).
- **Responsive & Clean**: Tampilan adaptif untuk desktop, tablet, dan smartphone.

### 3. 🔍 Halaman Detail Anime Komprehensif
- Rating resmi, peringkat global, dan nomor popularitas.
- Matriks spesifikasi media: Studio produksi, musim rilis, sumber karya (*Manga, Light Novel, Original*), dan status penayangan.
- Sinopsis cerita dengan subjudul kaligrafi Jepang (*あらすじ*).
- Tombol satu klik untuk menambahkan ke daftar favorit pribadi.

### 4. 🏷️ Eksplorasi Genre
- Pengelompokan anime berdasarkan genre (*Action, Adventure, Fantasy, Comedy, Drama, Romance, Sci-Fi, Mystery, Supernatural, Slice of Life*).
- Format kartu gulir horizontal (*horizontal scroll*) yang interaktif dengan tautan loncat cepat (*quick-jump pills*).

### 5. 👤 Sistem Pengguna & Koleksi Favorit
- Autentikasi lengkap: Registrasi akun baru, Login, dan Logout.
- Dashboard koleksi favorit pribadi untuk setiap user dengan proteksi duplikasi data.

### 6. 🛡️ Panel Administrasi (Admin Dashboard)
- **Role-Based Access Control (RBAC)**: Proteksi rute menggunakan middleware `EnsureUserIsAdmin`.
- **Overview Dashboard**: Statistik total anime, jumlah pesan masuk, dan status server.
- **Katalog Data Anime**: Tabel data anime lokal dengan fungsi pencarian dan paginasi.
- **Kotak Saran & Masukan**: Mengelola dan menghapus masukan yang dikirim pengunjung dari halaman *Tentang Kami*.
- **Kelola Pengguna**: Direktori daftar akun terdaftar beserta perannya (*Admin / User*).

---

## 🛠️ Arsitektur & Teknologi

| Komponen | Teknologi yang Digunakan |
| :--- | :--- |
| **Framework** | Laravel 12.x (PHP 8.2+) |
| **Database** | SQLite (Ringan, bebas konfigurasi server terpisah, portable) |
| **Frontend** | Blade Templates, Tailwind CSS (via CDN), Google Fonts (*Plus Jakarta Sans* & *Inter*) |
| **API Provider** | Jikan REST API v4 & Official MyAnimeList API Client |
| **Caching** | Laravel Cache (File / Memory) dengan TTL 24 jam untuk pencegahan rate-limit API |
| **Testing** | PHPUnit / Laravel Test Suite (11 Tests, 30 Assertions) |
| **Standar Kode** | Semua file di bawah batas 500 baris kode untuk efisiensi dan modularitas |

---

## 📁 Struktur Direktori Penting

```text
Anime-Library/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AdminController.php         # Kontroler dashboard dan manajemen admin
│   │   │   ├── AnimeController.php         # Kontroler katalog, detail, genre, favorit
│   │   │   ├── AuthController.php          # Kontroler autentikasi login & registrasi
│   │   │   └── FeedbackController.php      # Kontroler formulir kritik & saran
│   │   └── Middleware/
│   │       └── EnsureUserIsAdmin.php       # Proteksi akses rute khusus role admin
│   ├── Models/
│   │   ├── Anime.php                       # Model anime dengan casting katalog
│   │   ├── Favorite.php                    # Model koleksi favorit user
│   │   ├── Feedback.php                    # Model pesan saran pengguna
│   │   └── User.php                        # Model pengguna dengan helper isAdmin()
│   └── Services/
│       ├── AnimeRepository.php             # Repository sentral paginasi & caching data
│       ├── JikanApiService.php             # Service pemanggil Jikan REST API
│       ├── MyAnimeListApiService.php       # Service integrasi resmi MyAnimeList API
│       └── Contracts/
│           └── AnimeProviderInterface.php  # Abstraksi antarmuka penyedia data anime
├── config/
│   └── myanimelist.php                     # Konfigurasi client ID & URL API MAL
├── database/
│   ├── data/
│   │   └── animes_1000.json                # Dataset 3.000 anime resmi dengan poster unik
│   ├── migrations/                         # Skema database SQLite
│   └── seeders/
│       ├── AnimeLibrary1kSeeder.php        # Seeder impor 3.000 anime ke SQLite
│       └── DatabaseSeeder.php              # Akun default admin & user demo
├── resources/
│   └── views/
│       ├── admin/                          # Template Blade area manajemen admin
│       ├── components/                     # Komponen ikon anime vektor kustom
│       ├── layouts/                        # Layout utama (main & admin)
│       └── pages/                          # Halaman publik (beranda, detail, genre, dll.)
└── tests/
    └── Feature/
        ├── AnimeLibraryTest.php            # Uji fungsionalitas katalog, search, dan detail
        └── SecurityAndFeaturesTest.php     # Uji autentikasi, proteksi admin, dan feedback
```

---

## 🚀 Panduan Instalasi & Menjalankan Lokal

Pastikan komputer Anda telah terinstal:
- **PHP >= 8.2** (dengan ekstensi `pdo_sqlite`, `curl`, `mbstring`, `openssl`)
- **Composer**
- **Git**

### 1. Klon Repositori
```bash
git clone https://github.com/Yantokumar/Anime-Library.git
cd Anime-Library
```

### 2. Instal Dependensi Composer
```bash
composer install
```

### 3. Salin File Konfigurasi `.env`
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Konfigurasi Database SQLite & Migrasi
Pastikan file database SQLite siap, kemudian jalankan migrasi dan seeder:
```bash
# Buat file database jika belum ada (Linux/macOS)
touch database/database.sqlite

# Di Windows PowerShell:
New-Item -ItemType File -Path database/database.sqlite -Force

# Jalankan migrasi dan muat 3.000 anime + akun demo
php artisan migrate:fresh --seed
```

*(Opsional)* Jika ingin mengintegrasikan MyAnimeList Client ID resmi, tambahkan ke file `.env`:
```env
MAL_CLIENT_ID=your_client_id_here
```

### 5. Jalankan Server Lokal
```bash
php artisan serve
```
Akses aplikasi melalui peramban web di: **`http://127.0.0.1:8000`**

---

## 🔑 Akun Demo Pengujian

Aplikasi telah dilengkapi dengan akun bawaan untuk mempermudah demonstrasi:

| Peran (Role) | Alamat Email | Kata Sandi | Hak Akses |
| :--- | :--- | :--- | :--- |
| **Super Administrator** | `admin@animelib.com` | `admin123` | Akses penuh: Panel Admin, Data Anime, Inbox, User |
| **Regular User** | `user@animelib.com` | `user123` | Akses pengguna: Simpan Favorit, Kirim Masukan |

---

## 🧪 Pengujian Otomatis (Automated Tests)

Seluruh fitur inti dan aturan keamanan telah divalidasi dengan rangkaian automated test bawaan:
```bash
php artisan test
```

**Hasil Pengujian:**
```text
PASS  Tests\Feature\AnimeLibraryTest
✓ beranda displays paginated anime
✓ beranda search filters anime
✓ anime detail page loads correctly
✓ admin anime index displays paginated list

PASS  Tests\Feature\SecurityAndFeaturesTest
✓ guest cannot access admin panel
✓ regular user cannot access admin panel
✓ admin can access admin panel
✓ user can submit feedback and admin can delete it
✓ user cannot add duplicate favorite

Tests: 11 passed (30 assertions)
```

---

## 📜 Lisensi & Atribusi

- **Lisensi**: Dirilis di bawah lisensi terbuka [MIT License](LICENSE).
- **Penyedia Data**: Didukung oleh [Jikan REST API](https://jikan.moe) & [MyAnimeList](https://myanimelist.net).
- **Aset & Poster**: Hak cipta setiap anime, poster, dan materi promosi dimiliki sepenuhnya oleh masing-masing studio produksi dan komite produksi terkait.

---

<div align="center">
  Dibuat dengan dedikasi menggunakan <strong>Laravel 12</strong> & <strong>Tailwind CSS</strong>.
</div>
