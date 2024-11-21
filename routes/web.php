<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Route;


// Routes yang bisa diakses semua pengunjung
Route::get('/', [WelcomeController::class, 'index']);
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi.index');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

// Route untuk menampilkan halaman login
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login')->middleware('guest');

//Route untuk menangani proses login
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

//Route untuk pengunjung yang sudah login
Route::middleware('auth')->group(function() {
    // Route untuk menampilkan dashboard admin
    Route::get('/admin', function(){
        return view('admin.dashboard.index', [
            'title' => 'Dashboard',
        ]);
    });

    // Route untuk menampilkan halaman manajemen admin
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/hapus/{id}', [UserController::class, 'destroy'])->name('users.hapus');

    //Route untuk logout
    Route::get('/logout', [AuthController::class, 'logout']);

    //route untuk CRUD category
    Route::resource('categories', CategoryController::class);

    // Route untuk CRUD post
    Route::resource('posts', PostController::class);

    //Route untuk CRUD gallery
    Route::resource('galleries', GalleryController::class);

    //route untuk menyimpan foto yang di upload
    Route::post('/images/store', [ImageController::class, 'store']);
    Route::delete('/images/{id}', [ImageController::class, 'destroy']);
    Route::post('/upload-image', [ImageController::class, 'upload'])->name('upload.image');
    Route::get('/images', [ImageController::class, 'index']);
    Route::get('/admin/galleries', [GalleryController::class, 'index'])->name('admin.galleries.index');
});