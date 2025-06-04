<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $newBooks = Book::with('author')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        $popularAuthors = Author::withCount('books')
            ->orderBy('books_count', 'desc')
            ->take(3)
            ->get();
            
        $popularBooks = Book::with('author')
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();
            
        $bestsellerBooks = Book::with('author')
            ->where('is_bestseller', true)
            ->take(5)
            ->get();
            
        return view('home', compact('newBooks', 'popularAuthors', 'popularBooks', 'bestsellerBooks'));
    }

    public function recommendations()
    {
        $recommendedBooks = Book::with('author')
            ->orderBy('average_rating', 'desc')
            ->take(9)
            ->get();
            
        return view('recommendations', compact('recommendedBooks'));
    }
}
