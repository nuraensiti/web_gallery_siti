<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $kategoris = [
            ['kategori_name' => 'Informasi Terkini'],
            ['kategori_name' => 'Agenda Sekolah'],
            ['kategori_name' => 'Galeri Sekolah']
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }
    }
} 