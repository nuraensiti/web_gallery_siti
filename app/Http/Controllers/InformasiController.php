<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Post::where('kategori_id', 1)
            ->where('status', 'publish')
            ->latest()
            ->paginate(9);
            
        return view('informasi.index', compact('informasi'));
    }
} 