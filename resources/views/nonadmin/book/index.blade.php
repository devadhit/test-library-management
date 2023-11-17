@extends('layouts.nonadmin.app')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Books</span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>ISBN</th>
                            <th>Description</th>
                            <th>Stock</th>
                            <th>Date Published</th>
                            <th>Publisher</th>
                            <th>Status</th>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
