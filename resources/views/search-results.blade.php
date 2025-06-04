@extends('layouts.app')

@section('title', 'Результаты поиска')

@section('content')
<style>
    .search-header {
        margin-bottom: 2rem;
    }
    
    .search-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    
    .search-meta {
        color: #6b7280;
        font-size: 0.9rem;
    }
    
    .search-section {
        margin-bottom: 3rem;
    }
    
    .section-title {
        font-family: 'Druk Wide Cyr', Arial, sans-serif;
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: #333;
        border-bottom: 2px solid #f3f4f6;
        padding-bottom: 0.5rem;
    }
    
    /* Authors Grid */
    .authors-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
    }
    
    .author-card {
        display: flex;
        align-items: center;
        padding: 1rem;
        border-radius: 8px;
        background-color: #f9fafb;
        text-decoration: none;
        color: inherit;
        transition: all 0.2s ease;
    }
    
    .author-card:hover {
        background-color: #f3f4f6;
        transform: translateY(-2px);
    }
    
    .author-image {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 1rem;
        background-color: #B57219;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        font-weight: bold;
    }
    
    .author-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .author-info {
        flex: 1;
    }
    
    .author-name {
        font-weight: 600;
        margin-bottom: 0.25rem;
    }
    
    .author-books {
        color: #6b7280;
        font-size: 0.875rem;
    }
    
    /* Books Grid */
    .books-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 1rem;
    }
    
    .book-card {
        text-decoration: none;
        color: inherit;
        transition: transform 0.3s ease;
    }
    
    .book-card:hover {
        transform: translateY(-2px);
    }
    
    .book-cover {
        position: relative;
        aspect-ratio: 2/3;
        margin-bottom: 0.5rem;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .book-cover img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .book-title {
        font-weight: 500;
        margin-bottom: 0.25rem;
        font-size: 0.9rem;
        line-height: 1.3;
    }
    
    .book-author {
        color: #6b7280;
        font-size: 0.8rem;
    }
    
    .no-results {
        text-align: center;
        padding: 3rem 0;
    }
    
    .no-results-icon {
        font-size: 3rem;
        color: #d1d5db;
        margin-bottom: 1rem;
    }
    
    .no-results-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .no-results-text {
        color: #6b7280;
        max-width: 500px;
        margin: 0 auto;
    }
    
    .search-again {
        margin-top: 1.5rem;
    }
    
    .search-container {
        position: relative;
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
    }
    
    .search-input {
        width: 100%;
        padding: 0.75rem 3rem 0.75rem 1rem;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        outline: none;
        transition: all 0.3s ease;
    }
    
    .search-input:focus {
        border-color: #B57219;
        box-shadow: 0 0 0 2px rgba(181, 114, 25, 0.2);
    }
    
    .search-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6b7280;
    }
    
    @media (max-width: 768px) {
        .authors-grid {
            grid-template-columns: 1fr;
        }
        
        .books-grid {
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        }
    }
</style>

<div class="container">
    <div class="search-header">
        <h1 class="search-title">Результаты поиска: "{{ $query }}"</h1>
        <p class="search-meta">Найдено: {{ $books->total() }} книг и {{ $authors->count() }} авторов</p>
    </div>
    
    @if($authors->count() > 0 || $books->count() > 0)
        @if($authors->count() > 0)
            <div class="search-section">
                <h2 class="section-title">Авторы</h2>
                <div class="authors-grid">
                    @foreach($authors as $author)
                        <a href="{{ route('author.show', $author->id) }}" class="author-card">
                            <div class="author-image">
                                @if($author->image && file_exists(public_path('images/authors/' . $author->image)))
                                    <img src="{{ asset('images/authors/' . $author->image) }}" alt="{{ $author->name }}">
                                @else
                                    {{ substr($author->name, 0, 1) }}
                                @endif
                            </div>
                            <div class="author-info">
                                <div class="author-name">{{ $author->name }}</div>
                                <div class="author-books">{{ $author->books_count }} {{ trans_choice('книга|книги|книг', $author->books_count) }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
        
        @if($books->count() > 0)
            <div class="search-section">
                <h2 class="section-title">Книги</h2>
                <div class="books-grid">
                    @foreach($books as $book)
                        <a href="{{ route('book.show', $book->id) }}" class="book-card">
                            <div class="book-cover">
                                @if($book->cover_image && file_exists(public_path('images/books/' . $book->cover_image)))
                                    <img src="{{ asset('images/books/' . $book->cover_image) }}" alt="{{ $book->title }} by {{ $book->author->name }}">
                                @else
                                    <div style="width: 100%; height: 100%; background: #e5e7eb; display: flex; align-items: center; justify-content: center; color: #9ca3af;">Нет обложки</div>
                                @endif
                            </div>
                            <h3 class="book-title">{{ $book->title }}</h3>
                            <p class="book-author">{{ $book->author->name }}</p>
                        </a>
                    @endforeach
                </div>
                
                @if($books->hasPages())
                    <div style="margin-top: 2rem;">
                        {{ $books->appends(['query' => $query])->links() }}
                    </div>
                @endif
            </div>
        @endif
    @else
        <div class="no-results">
            <div class="no-results-icon">📚</div>
            <h2 class="no-results-title">Ничего не найдено</h2>
            <p class="no-results-text">К сожалению, по вашему запросу "{{ $query }}" ничего не найдено. Попробуйте изменить запрос или просмотреть наши рекомендации.</p>
            
            <div class="search-again">
                <form action="{{ route('search') }}" method="GET">
                    <div class="search-container">
                        <input type="text" name="query" placeholder="Попробуйте другой запрос" class="search-input" value="{{ $query }}">
                        <button type="submit" class="search-icon" style="background: none; border: none; cursor: pointer;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            
            <div style="margin-top: 2rem;">
                <a href="{{ route('recommendations') }}" class="btn btn-primary">Посмотреть рекомендации</a>
            </div>
        </div>
    @endif
</div>
@endsection
