@extends('layouts.admin.app')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Book Author - {{ $author->name }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('author.update', $author->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $author->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="about_author" class="form-label">About Author</label>
                        <textarea class="form-control" id="about_author" name="about_author" rows="3" required>{{ $author->about_author }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
