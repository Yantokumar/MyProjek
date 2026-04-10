<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Feedback;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalAnime' => Anime::count(),
            'totalPesan' => Feedback::count(),
        ]);
    }

    public function anime()
    {
        return view('admin.anime_index', ['animes' => Anime::all()]);
    }

    public function feedback()
    {
        return view('admin.feedback_index', ['pesans' => Feedback::all()]);
    }
}
