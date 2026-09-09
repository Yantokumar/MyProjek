<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalAnime' => Anime::count(),
            'totalPesan' => Feedback::count(),
        ]);
    }

    public function anime(Request $request)
    {
        $search = $request->query('q');
        $query = Anime::query();

        if (! empty($search)) {
            $query->where('judul', 'LIKE', "%{$search}%")
                  ->orWhere('genre', 'LIKE', "%{$search}%");
        }

        $animes = $query->orderBy('rating', 'desc')->paginate(25)->withQueryString();

        return view('admin.anime_index', compact('animes', 'search'));
    }

    public function feedback()
    {
        return view('admin.feedback_index', ['pesans' => Feedback::all()]);
    }

    public function users()
    {
        $allUsers = User::all();

        return view('admin.users_index', compact('allUsers'));
    }

    public function storeFeedback(Request $request)
    {
        // 1. Validasi data
        $request->validate([
            'nama' => 'required',
            'pesan' => 'required',
        ]);

        // 2. Simpan ke Database
        Feedback::create([
            'nama' => $request->nama,
            'pesan' => $request->pesan,
        ]);

        // 3. Kembali ke halaman tentang dengan pesan sukses
        return back()->with('success', 'Terima kasih, masukan Anda sudah terkirim!');
    }

    public function destroyFeedback($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return back()->with('success', 'Pesan masukan berhasil dihapus!');
    }
}
