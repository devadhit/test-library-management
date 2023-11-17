<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $author = Author::all();
        return view('admin.author.index',compact('author'));
    }

    public function create()
    {
        return view('admin.author.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string',
            'about_author' => 'string',
        ]);

        $author = new Author([
            'name' => $request->name,
            'about_author' => $request->about_author,
        ]);

        $author->save();

        return redirect()->route('author.index')->withSuccess('Author created successfully.');
    }

    public function edit($id)
    {
        $author = Author::where('id', $id)->first();
        return view('admin.author.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $author = Author::where('id', $id)->first();

        $request->validate([
            'name' => 'string',
            'about_author' => 'string',
        ]);


        $author->update([
            'name' => $request->name,
            'about_author' => $request->about_author,
        ]);

        return redirect()->route('author.index')->withSuccess('Author updated successfully.');
    }

    public function delete($id)
    {
        $author = Author::where('id', $id)->first();
        $author->delete();
        return redirect()->route('author.index')->withSuccess('Author deleted successfully.');
    }
}
