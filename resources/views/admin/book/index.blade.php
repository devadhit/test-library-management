@extends('layouts.admin.app')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Books</span>
                <a href="{{ route('book.create') }}" class="btn btn-success btn-sm">Add</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>ISBN</th>
                            <th>Description</th>
                            <th>Stock</th>
                            <th>Date Published</th>
                            <th>Publisher</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>
                                    @if ($book->bookcategory)
                                        {{ $book->bookcategory->name }}
                                    @else
                                        No Category
                                    @endif
                                </td>
                                <td>
                                    @if ($book->author)
                                        {{ $book->author->name }}
                                    @else
                                        No Category
                                    @endif
                                </td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->description }}</td>
                                <td>{{ $book->stock }}</td>
                                <td>{{ $book->date_published }}</td>
                                <td>{{ $book->publisher }}</td>
                                <td>{{ $book->status }}</td>
                                <td style="text-align: center;">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('book.edit', ['id' => $book->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('book.delete', ['id' => $book->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
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
