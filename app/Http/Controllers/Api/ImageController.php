<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    // Mendapatkan semua image
    public function index()
    {
        $images = Image::with('gallery')->get(); // Include relasi gallery
        return response()->json($images);
    }

    // Membuat image baru
    public function store(Request $request)
    {
        $request->validate([
            'gallery_id' => 'required|exists:galleries,id', // Harus ada di tabel galleries
            'file' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
        ]);

        $image = Image::create($request->all());

        return response()->json([
            'message' => 'Image created successfully',
            'image' => $image,
        ], 201);
    }

    // Mendapatkan satu image berdasarkan ID
    public function show($id)
    {
        $image = Image::with('gallery')->find($id);

        if (!$image) {
            return response()->json(['message' => 'Image not found'], 404);
        }

        return response()->json($image);
    }

    // Mengupdate image
    public function update(Request $request, $id)
    {
        $image = Image::find($id);

        if (!$image) {
            return response()->json(['message' => 'Image not found'], 404);
        }

        $request->validate([
            'gallery_id' => 'sometimes|exists:galleries,id',
            'file' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
        ]);

        $image->update($request->all());

        return response()->json([
            'message' => 'Image updated successfully',
            'image' => $image,
        ]);
    }

    // Menghapus image
    public function destroy($id)
    {
        $image = Image::find($id);

        if (!$image) {
            return response()->json(['message' => 'Image not found'], 404);
        }

        $image->delete();

        return response()->json(['message' => 'Image deleted successfully']);
    }
}
