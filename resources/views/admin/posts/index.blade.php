<?php

declare(strict_types=1);
?>
@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-body">
        <!-- Success message after update or delete -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">+ Post</a>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Petugas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $index => $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->kategori ? $post->kategori->kategori_name : 'Tidak ada kategori' }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>
                        @if (Str::lower($post->status) == 'publish')
                        <span class="badge bg-success text-white">{{ Str::ucfirst($post->status) }}</span>
                        @else
                        <span class="badge bg-warning text-white">{{ Str::ucfirst($post->status) }}</span>
                        @endif
                    </td>
                    <td class="d-flex">
                        <!-- Button to open the modal for the specific post -->
                        <button class="btn btn-info me-2 btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#postDetail{{ $post->id }}">
                            <i data-feather="info"></i>
                        </button>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning me-2">
                            <i data-feather="edit"></i>
                        </a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin?')">
                                <i data-feather="trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal detail post template -->
@foreach ($posts as $post)
<div class="modal fade" id="postDetail{{ $post->id }}" tabindex="-1" aria-labelledby="postDetailLabel{{ $post->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="postDetailLabel{{ $post->id }}"><i data-feather="info"></i> Detail Post</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table text-sm">
                    <tr>
                        <td>Judul</td>
                        <td>:</td>
                        <td>{{ $post->title }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal dibuat</td>
                        <td>:</td>
                        <td>{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</td>
                    </tr>
                    <tr>
                        <td>Dibuat oleh</td>
                        <td>:</td>
                        <td>{{ $post->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>{{ Str::ucfirst($post->status) }}</td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td>{{ $post->kategori ? $post->kategori->kategori_name : 'Tidak ada kategori' }}</td>
                    </tr>
                    <tr>
                        <td>Isi</td>
                        <td>:</td>
                        <td>{{ $post->content }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
