<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function __construct()
    {
    }
    
    public function index()
    {

        if (!auth()->check() || !auth()->user()->hasRole('admin')) {
            abort(403, 'Доступ запрещен. Требуются права администратора.');
        }
        
        $query = Book::with(['author', 'genres']);

        if (request('search')) {
            $search = request('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhereHas('author', function($authorQuery) use ($search) {
                      $authorQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $books = $query->latest()->paginate(10);
        
        return view('admin.books.index', compact('books'));
    }
    
    public function create()
    {

        if (!auth()->check() || !auth()->user()->hasRole('admin')) {
            abort(403, 'Доступ запрещен. Требуются права администратора.');
        }
        
        $authors = Author::all();
        $genres = Genre::all();

        if ($genres->isEmpty()) {
            $this->createDefaultGenres();
            $genres = Genre::all();
        }
        
        return view('admin.books.create', compact('authors', 'genres'));
    }
    
    private function createDefaultGenres()
    {
        $genreNames = [
            'Фантастика', 'Фэнтези', 'Детектив', 'Триллер', 'Роман',
            'Драма', 'Комедия', 'Ужасы', 'Приключения', 'Историческая литература',
            'Биография', 'Автобиография', 'Научная фантастика', 'Мистика',
            'Любовный роман', 'Классическая литература', 'Современная литература',
            'Поэзия', 'Философия', 'Психология', 'Самопомощь', 'Бизнес',
            'Образование', 'Детская литература', 'Подростковая литература'
        ];

        foreach ($genreNames as $name) {
            Genre::firstOrCreate(['name' => $name]);
        }
    }
    
    public function store(Request $request)
    {

        if (!auth()->check() || !auth()->user()->hasRole('admin')) {
            abort(403, 'Доступ запрещен. Требуются права администратора.');
        }
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'required|exists:authors,id',
            'publisher' => 'required|string|max:255',
            'year' => 'required|integer|min:1000|max:' . date('Y'),
            'pages' => 'required|integer|min:1',
            'language' => 'required|string|max:255',
            'is_bestseller' => 'boolean',
            'genres' => 'required|array|min:1',
            'genres.*' => 'exists:genres,id',
        ]);
        
        $coverImageName = 'default-book.jpg';
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $coverImageName = time() . '.' . $coverImage->extension();
  
            if (!file_exists(public_path('images/books'))) {
                mkdir(public_path('images/books'), 0755, true);
            }
            
            $coverImage->move(public_path('images/books'), $coverImageName);
        }
        
        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'cover_image' => $coverImageName,
            'author_id' => $request->author_id,
            'publisher' => $request->publisher,
            'year' => $request->year,
            'pages' => $request->pages,
            'language' => $request->language,
            'is_bestseller' => $request->boolean('is_bestseller'),
        ]);
 
        if ($request->has('genres')) {
            $book->genres()->attach($request->genres);
        }
        
        return redirect()->route('admin.books.index')->with('success', 'Книга успешно добавлена.');
    }
    
    public function edit(Book $book)
    {
 
        if (!auth()->check() || !auth()->user()->hasRole('admin')) {
            abort(403, 'Доступ запрещен. Требуются права администратора.');
        }
        
        $authors = Author::all();
        $genres = Genre::all();
        $bookGenres = $book->genres->pluck('id')->toArray();
        
        return view('admin.books.edit', compact('book', 'authors', 'genres', 'bookGenres'));
    }
    
    public function update(Request $request, Book $book)
    {
 
        if (!auth()->check() || !auth()->user()->hasRole('admin')) {
            abort(403, 'Доступ запрещен. Требуются права администратора.');
        }
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'required|exists:authors,id',
            'publisher' => 'required|string|max:255',
            'year' => 'required|integer|min:1000|max:' . date('Y'),
            'pages' => 'required|integer|min:1',
            'language' => 'required|string|max:255',
            'is_bestseller' => 'boolean',
            'genres' => 'required|array|min:1',
            'genres.*' => 'exists:genres,id',
        ]);
        
        $data = $request->except(['cover_image', 'genres']);
        $data['is_bestseller'] = $request->boolean('is_bestseller');
        
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $coverImageName = time() . '.' . $coverImage->extension();

            if (!file_exists(public_path('images/books'))) {
                mkdir(public_path('images/books'), 0755, true);
            }
            
            $coverImage->move(public_path('images/books'), $coverImageName);
            $data['cover_image'] = $coverImageName;
        }
        
        $book->update($data);

        if ($request->has('genres')) {
            $book->genres()->sync($request->genres);
        }
        
        return redirect()->route('admin.books.index')->with('success', 'Книга успешно обновлена.');
    }
    
    public function destroy(Book $book)
    {

        if (!auth()->check() || !auth()->user()->hasRole('admin')) {
            abort(403, 'Доступ запрещен. Требуются права администратора.');
        }
        
        $book->delete();
        
        return redirect()->route('admin.books.index')->with('success', 'Книга успешно удалена.');
    }
}
