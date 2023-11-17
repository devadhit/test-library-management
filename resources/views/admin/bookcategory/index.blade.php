@extends('layouts.admin.app')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Book Categories</span>
                <a href="{{ route('bookcategory.create') }}" class="btn btn-success btn-sm">Add</a>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookCategories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td style="text-align: center;">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('bookcategory.edit', ['id' => $category->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('bookcategory.delete', ['id' => $category->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
