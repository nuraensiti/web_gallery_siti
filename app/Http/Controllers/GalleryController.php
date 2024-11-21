<?php declare(strict_types=1); 

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Ambil semua data gallery
        $galleries = Gallery::all();
        
        //tampilkan view index untuk menampilkan semua data gallery
        return view('admin.galleries.index', [
            'title' => 'Galeri Foto',
            'galleries' => $galleries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //ambil semua data post
        $posts = Post::all();

        //tampilkan view form tambah galeri
        return view('admin.galleries.create', [
            'title' => 'Tambah Galeri Foto',
            'posts' => $posts
     
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|string',
            'status' => 'required|in:aktif,nonaktif',
            // validasi lainnya...
        ]);

        $gallery = Gallery::create($validatedData);
        
        // proses upload image jika ada
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads', 'public');
                $gallery->images()->create([
                    'file' => $path,
                    'title' => $image->getClientOriginalName()
                ]);
            }
        }

        return redirect()->route('galleries.index')
            ->with('success', 'Gallery berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //tampilkan view detail gallery
        return view('admin.galleries.show', [
            'title' => 'Detail Galeri Foto',
            'gallery' => $gallery
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {

        //ambil semua data post
        $posts = Post::all();

        //tampilkan view form edit gallery
        return view('admin.galleries.edit', [
            'title' => 'Edit Galeri Foto',
            'gallery' => $gallery,
            'posts' => $posts,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validatedData = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $gallery->update($validatedData);

        return redirect()->route('galleries.index')
            ->with('success', 'Gallery berhasil diupdate');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //hapus data gallery
        $gallery->delete();

        //redirect ke halaman index gallery
        return redirect('/galleries')->with('success', 'Galeri Foto berhasil dihapus');
    }
}
