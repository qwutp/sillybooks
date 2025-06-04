@extends('layouts.app')

@section('title', 'Рекомендации')

@section('content')
<div class="container">
    <div class="section">
        <h2 class="section-title">Рекомендации для вас</h2>
        <div class="books-grid">
            @forelse($recommendedBooks ?? [] as $book)
                <a href="{{ route('book.show', $book->id) }}" class="book-card">
                    <div class="book-cover">
                        <img src="/images/books/{{ $book->cover_image ?? 'default.jpg' }}" alt="{{ $book->title }}">
                    </div>
                    <h3 class="book-title">{{ $book->title }}</h3>
                    <p class="book-author">{{ $book->author->name ?? 'Неизвестный автор' }}</p>
                </a>
            @empty
                <div class="empty-state">
                    <h3>Пока нет рекомендаций</h3>
                    <p>Добавьте книги в свою библиотеку, чтобы получить персональные рекомендации</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">Найти книги</a>
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>
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

.empty-state {
    grid-column: 1 / -1;
    text-align: center;
    padding: 3rem;
}

.empty-state h3 {
    font-size: 1.25rem;
    font-weight: bold;
    margin-bottom: 1rem;
    color: #1f2937;
}

.empty-state p {
    color: #6b7280;
    margin-bottom: 2rem;
}

@media (max-width: 768px) {
    .books-grid {
        grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
        gap: 1rem;
    }
}
</style>
@endsection
