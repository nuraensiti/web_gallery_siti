<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Post::where('kategori_id', 7)
            ->where('status', 'publish')
            ->latest()
            ->paginate(10); // Menampilkan 10 agenda per halaman
            
        return view('agenda.index', compact('agendas'));
    }
} 