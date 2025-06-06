@extends('layouts.app')

@section('title', 'Мои книги')

@section('content')
    <div class="container">
        <h1 class="page-title">Мои книги</h1>
        
        <section class="section">
            <h2 class="section-title">Сейчас читаю ({{ $currentlyReading->count() }})</h2>
            <div class="books-grid">
                @forelse($currentlyReading as $book)
                    <a href="{{ route('book.show', $book->id) }}" class="book-card">
                        <div class="book-cover">
                            <img src="/images/books/{{ $book->cover_image ?? 'default.jpg' }}" alt="{{ $book->title }} by {{ $book->author->name }}">
                        </div>
                        <h3 class="book-title">{{ $book->title }}</h3>
                        <p class="book-author">{{ $book->author->name }}</p>
                    </a>
                @empty
                    <p class="empty-message">Нет книг в этом разделе</p>
                @endforelse
            </div>
        </section>
  
        <section class="section">
            <h2 class="section-title">Хочу прочитать ({{ $wantToRead->count() }})</h2>
            <div class="books-grid">
                @forelse($wantToRead as $book)
                    <a href="{{ route('book.show', $book->id) }}" class="book-card">
                        <div class="book-cover">
                            <img src="/images/books/{{ $book->cover_image ?? 'default.jpg' }}" alt="{{ $book->title }} by {{ $book->author->name }}">
                        </div>
                        <h3 class="book-title">{{ $book->title }}</h3>
                        <p class="book-author">{{ $book->author->name }}</p>
                    </a>
                @empty
                    <p class="empty-message">Нет книг в этом разделе</p>
                @endforelse
            </div>
        </section>

        <section class="section">
            <h2 class="section-title">Прочитано ({{ $completed->count() }})</h2>
            <div class="books-grid">
                @forelse($completed as $book)
                    <a href="{{ route('book.show', $book->id) }}" class="book-card">
                        <div class="book-cover">
                            <img src="/images/books/{{ $book->cover_image ?? 'default.jpg' }}" alt="{{ $book->title }} by {{ $book->author->name }}">
                        </div>
                        <h3 class="book-title">{{ $book->title }}</h3>
                        <p class="book-author">{{ $book->author->name }}</p>
                    </a>
                @empty
                    <p class="empty-message">Нет книг в этом разделе</p>
                @endforelse
            </div>
        </section>
    </div>

<style>
.page-title {
    font-family: 'Druk Wide Cyr', Arial, sans-serif;
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 2rem;
    color: #1f2937;
}

.section {
    margin-bottom: 3rem;
}

.section-title {
    font-family: 'Druk Wide Cyr', Arial, sans-serif;
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 1.5rem;
    color: #1f2937;
}

.books-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 1.5rem;
}

.book-card {
    display: block;
    text-decoration: none;
    color: inherit;
    transition: transform 0.3s ease;
}

.book-card:hover {
    transform: translateY(-5px);
}

.book-cover {
    width: 100%;
    aspect-ratio: 2/3;
    margin-bottom: 0.75rem;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.book-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.book-title {
    font-family: 'Druk Wide Cyr', Arial, sans-serif;
    font-size: 0.875rem;
    font-weight: bold;
    line-height: 1.2;
    margin-bottom: 0.25rem;
    color: #1f2937;
}

.book-author {
    font-size: 0.75rem;
    color: #6b7280;
    margin: 0;
}

.empty-message {
    grid-column: 1 / -1;
    color: #6b7280;
    text-align: center;
    padding: 2rem;
    font-style: italic;
}

@media (max-width: 768px) {
    .books-grid {
        grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
        gap: 1rem;
    }
    
    .page-title {
        font-size: 1.5rem;
    }
    
    .section-title {
        font-size: 1.25rem;
    }
}
</style>
@endsection
