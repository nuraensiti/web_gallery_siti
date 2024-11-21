<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Mengambil post informasi dengan gallery untuk gambarnya
        $informasiPost = Post::where('kategori_id', 1)
            ->where('status', 'publish')
            ->first();

        // Mengambil post agenda dari kategori Agenda Sekolah
        $agendaPosts = Post::where('kategori_id', 7)
                ->where('status', 'publish')
                ->latest()
                ->take(3)
                ->get();

        // Mengambil semua gallery untuk section galeri
        $galleries = Gallery::with(['images', 'post'])
                ->whereHas('post', function($query) {
                    $query->where('kategori_id', 5);
                })
                ->where('status', 'aktif')
                ->get();

        return view('welcome', compact(
            'informasiPost',
            'agendaPosts',
            'galleries'
        ));
    }
}