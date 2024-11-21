<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all(); // Fetch all images
        return view('welcome', compact('images'));
    }
    public function store(Request $request)
    {
        //validasi data request
        $request->validate([
            'gallery_id' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,heic|max:3000',
            'title' => 'required',
        ]);
    
        //ambil file di upload
        $file = $request->file('file');
    
        //nama file
        $fileName = time() . '.' . $file->extension();
    
        //pindahkan file ke folder public/images
        $file->move(public_path('images'), $fileName);
    
        //simpan data ke database
        Image::create([
            'gallery_id' => $request->gallery_id,
            'file' => $fileName,
            'title' => $request->title,
        ]);
    
        //redirect ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Foto berhasil ditambahkan');
    }
    
    public function destroy($id)
    {
        //ambil data image berdasarkan id
        $image = Image::find($id);

        //hapus file dari folder public/images
        unlink(public_path('images/' . $image->file));

        //hapus data dari database
        $image->delete();

        //redirect ke halaman sebelumnya
        return back()->with('success', 'Foto berhasil dihapus');
    }


    public function upload(Request $request)
    {
        // Validasi file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan file
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        return back()->with('success', 'Gambar berhasil diupload!')->with('image', $imageName);
    }
}
