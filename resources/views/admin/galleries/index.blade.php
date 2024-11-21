<?php

declare(strict_types=1); ?>
@extends('admin.layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h3>Daftar Galeri</h3>

            <!-- Display Success Message -->
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <a href="{{ route('galleries.create') }}" class="btn btn-success mb-3">Tambah Galeri</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Post</th>
                        <th>Posisi</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($galleries as $index => $gallery)
                    <tr>
                        <td>{{ $index + 1 }}</td> <!-- Displaying the row number -->
                        <td>{{ $gallery->post->title }}</td>
                        <td>{{ $gallery->position }}</td>
                        <td>
                            @if ($gallery->status == 'aktif')
                                <span class="badge bg-success">{{ Str::ucfirst($gallery->status) }}</span>
                            @else
                                <span class="badge bg-warning">{{ Str::ucfirst($gallery->status) }}</span>
                            @endif
                        </td>
                        <td class="d-flex justify-content-center">
                            <a href="/galleries/{{ $gallery->id }}" class="btn btn-success me-2">
                                <i data-feather="info"></i> Detail
                            </a>
                            <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-warning me-2">
                                <i data-feather="edit"></i> Edit
                            </a>
                            <form action="{{ route('galleries.destroy', $gallery->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">
                                    <i data-feather="trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection