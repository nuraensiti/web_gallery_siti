<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Mendapatkan semua post
    public function index()
    {
        return response()->json(Post::all());
    }

    // Menampilkan post berdasarkan ID
    public function show($id)
    {
        $post = Post::with(['kategori', 'user', 'galleries'])->find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        return response()->json($post);
    }

    // Menyimpan post baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'kategori_id' => 'required|integer',
            'content' => 'required|string',
            'user_id' => 'required|integer',
            'status' => 'required|string',
        ]);

        $post = Post::create($validatedData);
        return response()->json($post, 201);
    }

    // Mengupdate post
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $validatedData = $request->validate([
            'title' => 'string|max:255',
            'kategori_id' => 'integer',
            'content' => 'string',
            'user_id' => 'integer',
            'status' => 'string',
        ]);

        $post->update($validatedData);
        return response()->json($post);
    }

    // Menghapus post
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $post->delete();
        return response()->json(['message' => 'Post deleted successfully']);
    }
}

