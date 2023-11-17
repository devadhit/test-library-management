<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin.book.index',compact('books'));
    }

    public function create()
    {
        $bookcategories = BookCategory::all();
        $authors = Author::all();
        return view('admin.book.create', compact('bookcategories','authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'author_id' => 'required|exists:authors,id',
            'isbn' => 'required',
            'description' => 'required',
            'stock' => 'required|integer',
            'date_published' => 'required|date',
            'publisher' => 'required',
            'status' => 'required|in:available,unavailable',
        ]);

        Book::create($request->all());

        return redirect()->route('book.index')->with('success', 'Book created successfully!');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $bookcategories = BookCategory::all();
        $authors = Author::all();

        return view('admin.book.edit', compact('book', 'bookcategories', 'authors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:book_categories,id',
            'author_id' => 'required|exists:authors,id',
            'isbn' => 'required',
            'description' => 'required',
            'stock' => 'required|integer',
            'date_published' => 'required|date',
            'publisher' => 'required',
            'status' => 'required|in:available,unavailable',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('book.index')->with('success', 'Book updated successfully!');
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('book.index')->with('success', 'Book deleted successfully!');
    }

}
