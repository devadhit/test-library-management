<?php

namespace App\Http\Controllers\Nonadmin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NonAdminController extends Controller
{
    public function index()
    {
        return view('nonadmin.dashboard');
    }

    // view buku, view profile, edit profile
    public function viewBook()
    {
        $books = Book::all();
        return view('nonadmin.book.index',compact('books'));
    }

    public function viewProfile()
    {
        $user = Auth::user();
        return view('nonadmin.profile.index', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('nonadmin.profile.edit', compact('user'));
    }

}
