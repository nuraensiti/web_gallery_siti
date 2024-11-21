<?php declare(strict_types=1); ?>
@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Tambah Kategori</h3>
                <form action="{{ route('galleries.store') }}" method="post"> <!-- Updated action route -->
                    @csrf
                    <div class="form-group mb-3">
                        <label for="post_id">Post</label>
                        <select name="post_id" id="post_id" class="form-control" required>
                            <option value="">Pilih Post</option>
                            @foreach($posts as $post)
                                <option value="{{ $post->id }}">{{ $post->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="position">Position</label>
                        <input type="text" name="position" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Non Aktif</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary d-block mx-auto">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
