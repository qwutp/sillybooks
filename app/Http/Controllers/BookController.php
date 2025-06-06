<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\UserBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function show($id)
    {
        $book = Book::with(['author', 'reviews.user', 'genres'])
            ->findOrFail($id);

        $userBookStatus = null;
        if (Auth::check()) {
            $userBook = UserBook::where('user_id', Auth::id())
                ->where('book_id', $book->id)
                ->first();
            
            $userBookStatus = $userBook ? $userBook->status : null;
        }
            
        return view('book.show', compact('book', 'userBookStatus'));
    }
}
