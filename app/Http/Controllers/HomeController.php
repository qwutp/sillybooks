<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
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

        $popularGenres = Genre::withCount('books')
            ->orderBy('books_count', 'desc')
            ->take(5)
            ->get();
            
        return view('home', compact('newBooks', 'popularAuthors', 'popularBooks', 'bestsellerBooks', 'popularGenres'));
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

        $genres = Genre::orderBy('name')->get();

        $selectedGenres = $request->input('genres', []);
        $minRating = $request->input('min_rating', 0);
        $sortBy = $request->input('sort_by', 'relevance');

        $booksQuery = Book::with('author', 'genres');

        if (!empty($query) && strlen($query) >= 2) {
            $booksQuery->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%")
                  ->orWhereHas('author', function($q) use ($query) {
                      $q->where('name', 'like', "%{$query}%");
                  });
            });
        }

        if (!empty($selectedGenres)) {
            $booksQuery->whereHas('genres', function($q) use ($selectedGenres) {
                $q->whereIn('genres.id', $selectedGenres);
            }, '=', count($selectedGenres));
        }

        if ($minRating > 0) {
            $booksQuery->where('average_rating', '>=', $minRating);
        }

        switch ($sortBy) {
            case 'title_asc':
                $booksQuery->orderBy('title', 'asc');
                break;
            case 'title_desc':
                $booksQuery->orderBy('title', 'desc');
                break;
            case 'rating_desc':
                $booksQuery->orderBy('average_rating', 'desc');
                break;
            case 'newest':
                $booksQuery->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $booksQuery->orderBy('created_at', 'asc');
                break;
            case 'popularity':
                $booksQuery->orderBy('views', 'desc');
                break;
            default:

                if (!empty($query)) {

                    $booksQuery->orderByRaw("CASE WHEN title LIKE ? THEN 1 WHEN title LIKE ? THEN 2 ELSE 3 END", 
                        ["{$query}%", "%{$query}%"]);
                } else {
                    $booksQuery->orderBy('average_rating', 'desc');
                }
                break;
        }

        $books = $booksQuery->paginate(12)->withQueryString();

        $authors = [];
        if (!empty($query)) {
            $authors = Author::where('name', 'like', "%{$query}%")
                ->withCount('books')
                ->take(5)
                ->get();
        }

        $searchParams = [
            'query' => $query,
            'selectedGenres' => $selectedGenres,
            'minRating' => $minRating,
            'sortBy' => $sortBy,
        ];
        
        return view('search-results', compact('books', 'authors', 'genres', 'searchParams'));
    }
}
