<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    // Mendapatkan semua gallery
    public function index()
    {
        $galleries = Gallery::with(['post', 'images'])->get(); // Include relasi
        return response()->json($galleries);
    }

    // Membuat gallery baru
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id', // Harus ada di tabel posts
            'position' => 'nullable|integer',
            'status' => 'nullable|string',
            'image_name' => 'nullable|string|max:255',
            'image_path' => 'nullable|string|max:255',
        ]);

        $gallery = Gallery::create($request->all());

        return response()->json([
            'message' => 'Gallery created successfully',
            'gallery' => $gallery,
        ], 201);
    }

    // Mendapatkan satu gallery berdasarkan ID
    public function show($id)
    {
        $gallery = Gallery::with(['post', 'images'])->find($id);

        if (!$gallery) {
            return response()->json(['message' => 'Gallery not found'], 404);
        }

        return response()->json($gallery);
    }

    // Mengupdate gallery
    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return response()->json(['message' => 'Gallery not found'], 404);
        }

        $request->validate([
            'post_id' => 'sometimes|exists:posts,id',
            'position' => 'nullable|integer',
            'status' => 'nullable|string',
            'image_name' => 'nullable|string|max:255',
            'image_path' => 'nullable|string|max:255',
        ]);

        $gallery->update($request->all());

        return response()->json([
            'message' => 'Gallery updated successfully',
            'gallery' => $gallery,
        ]);
    }

    // Menghapus gallery
    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return response()->json(['message' => 'Gallery not found'], 404);
        }

        $gallery->delete();

        return response()->json(['message' => 'Gallery deleted successfully']);
    }
}

