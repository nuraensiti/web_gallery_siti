<?php declare(strict_types=1); ?>
@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Edit Gallery</h3>
                <form action="{{ route('galleries.update', $gallery->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group mb-3">
                        <label for="post_id">Post</label>
                        <select name="post_id" id="post_id" class="form-control" required>
                            <option value="">Pilih Post</option>
                            @foreach($posts as $post)
                                <option value="{{ $post->id }}" {{ $gallery->post_id == $post->id ? 'selected' : '' }}>
                                    {{ $post->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="position">Position</label>
                        <input type="text" name="position" class="form-control" value="{{ $gallery->position }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="aktif" {{ $gallery->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ $gallery->status == 'nonaktif' ? 'selected' : '' }}>Non Aktif</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary d-block mx-auto">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
