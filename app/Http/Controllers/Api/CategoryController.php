<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Mendapatkan semua kategori
    public function index()
    {
        $categories = Category::with('posts')->get(); // Mengambil kategori beserta postingannya
        return response()->json($categories);
    }

    // Menambahkan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'kategori_name' => 'required|string|max:255',
        ]);

        $category = Category::create($request->all());

        return response()->json([
            'message' => 'Category created successfully',
            'category' => $category,
        ], 201);
    }

    // Mendapatkan satu kategori berdasarkan ID
    public function show($id)
    {
        $category = Category::with('posts')->find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($category);
    }

    // Mengupdate kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_name' => 'required|string|max:255',
        ]);

        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->update($request->all());

        return response()->json([
            'message' => 'Category updated successfully',
            'category' => $category,
        ]);
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }
}

