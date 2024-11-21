<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Image;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        // Fetch all images
        $images = Image::all();
        // Retrieve the latest post or however you want to select it
    $post = Post::with('kategori')->latest()->first(); // Eager load the category

    return view('welcome', compact('post'));
    
        // Return the welcome view with images
        return view('welcome', compact('images'));
    }
    
}
