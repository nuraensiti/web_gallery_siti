<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with(['images', 'post'])
            ->whereHas('post', function($query) {
                $query->where('kategori_id', 5);
            })
            ->where('status', 'aktif')
            ->latest()
            ->paginate(9);
            
        return view('galeri.index', compact('galleries'));
    }
} 