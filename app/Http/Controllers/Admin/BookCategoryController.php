<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    public function index()
    {
        $bookCategories = BookCategory::all();
        return view('admin.bookcategory.index',compact('bookCategories'));
    }

    public function create()
    {
        return view('admin.bookcategory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string',
            'description' => 'string',
        ]);

        $bookCategory = new BookCategory([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $bookCategory->save();

        return redirect()->route('bookcategory.index')->withSuccess('Book created successfully.');
    }

    public function edit($id)
    {
        $bookCategory = BookCategory::where('id', $id)->first();
        return view('admin.bookcategory.edit', compact('bookCategory'));
    }

    public function update(Request $request, $id)
    {
        $bookCategory = BookCategory::where('id', $id)->first();

        $request->validate([
            'name' => 'string',
            'description' => 'string',
        ]);


        $bookCategory->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('bookcategory.index')->withSuccess('Book category updated successfully.');
    }

    public function delete($id)
    {
        $bookCategory = BookCategory::where('id', $id)->first();
        $bookCategory->delete();
        return redirect()->route('bookcategory.index')->withSuccess('Book category deleted successfully.');
    }

}
