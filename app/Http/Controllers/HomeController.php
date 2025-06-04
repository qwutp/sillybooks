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
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        if (empty($query) || strlen($query) < 2) {
            return redirect()->route('home')
                ->with('error', 'Поисковый запрос должен содержать не менее 2 символов.');
        }
        
        $books = Book::with('author', 'genres')
            ->where('title', 'like', "%{$query}%")
            ->orWhereHas('author', function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->paginate(12);
            
        $authors = Author::where('name', 'like', "%{$query}%")
            ->withCount('books')
            ->take(5)
            ->get();
            
        return view('search-results', compact('books', 'authors', 'query'));
    }
}
