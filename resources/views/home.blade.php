@extends('layouts.app')

@section('title', 'Главная')

@section('content')
<style>

    .hero-banner {
        background-color: #000;
        border-radius: 16px;
        overflow: hidden;
        position: relative;
        height: 500px;
        margin: 2rem 0;
    }

    .hero-image-container {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
    }

    .hero-image-container img {
        object-fit: cover;
        width: 100%;
        height: 100%;
        opacity: 0.9;
    }

    .hero-content {
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        width: 50%;
        padding: 4rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-end;
        text-align: right;
        z-index: 10;
    }

    .hero-title {
        color: white;
        font-size: 2.5rem;
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 2rem;
        font-family: 'Druk Wide Cyr', Arial, sans-serif;
    }

    .hero-button {
        background-color: #B57219;
        color: #fff;
        font-weight: 600;
        width: 250px;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.5rem;
        transition: background-color 0.2s;
        font-family: 'Druk Wide Cyr', Arial, sans-serif;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-decoration: none;
    }

    .hero-button:hover {
        background-color: #9A5F14;
    }

    .search-section {
        padding: 1.5rem 0;
    }

    .search-wrapper {
        display: flex;
        align-items: center;
        gap: 2rem;
    }

    .search-container {
        position: relative;
        width: 100%;
        max-width: 600px;
        margin-bottom: 1rem;
    }

    .search-input {
        width: 100%;
        padding: 0.75rem 3rem 0.75rem 1rem;
        border: 1px solid transparent;
        border-radius: 8px;
        background-color: #f3f4f6;
        outline: none;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        border-color: #B57219;
        box-shadow: 0 0 0 2px rgba(181, 114, 25, 0.2);
        background-color: white;
    }

    .search-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6b7280;
    }

    .search-nav {
        margin-left: auto;
        display: flex;
        gap: 1.5rem;
    }

    .search-nav a {
        color: #6b7280;
        text-decoration: none;
        position: relative;
        padding-bottom: 0.25rem;
    }

    .search-nav a.active {
        color: #B57219;
        border-bottom: 2px solid #B57219;
    }

    .search-nav a:hover {
        color: #B57219;
    }

    .section {
        padding: 2rem 0;
    }

    .section-title {
        font-family: 'Druk Wide Cyr', Arial, sans-serif;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: #333;
    }

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

    .authors-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1rem;
    }

    .author-card {
        text-decoration: none;
        color: inherit;
        display: block;
        background: #000;
        border-radius: 8px;
        overflow: hidden;
        position: relative;
        height: 150px;
    }

    .author-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.8;
    }

    .author-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 1rem;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
    }

    .author-name {
        color: white;
        font-family: 'Druk Wide Cyr', Arial, sans-serif;
        font-size: 1.25rem;
        margin: 0;
    }

    @media (max-width: 768px) {
        .hero-banner {
            height: auto;
        }

        .hero-content {
            position: relative;
            width: 100%;
            padding: 2rem;
            align-items: center;
            text-align: center;
        }

        .hero-image-container {
            position: relative;
            height: 300px;
        }

        .hero-title {
            font-size: 2rem;
        }

        .hero-button {
            width: 100%;
            max-width: 250px;
            height: 50px;
        }

        .search-wrapper {
            flex-direction: column;
            gap: 1rem;
        }

        .search-nav {
            margin-left: 0;
        }

        .books-grid {
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        }

        .authors-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
<section class="container">
    <div class="hero-banner">
        <div class="hero-image-container">
            <img src="{{ asset('images/hero-cat.png') }}" alt="Cat with books">
        </div>
        <div class="hero-content">
            <h1 class="hero-title">НАЧНИ ЧИТАТЬ<br>ВМЕСТЕ С<br>SILLYBOOKS</h1>
            <a href="{{ route('recommendations') }}" class="hero-button">Начать читать</a>
        </div>
    </div>
</section>
<section class="container search-section">
    <div class="search-wrapper">
        <div class="search-container">
            <form action="{{ route('search') }}" method="GET">
                <input type="text" name="query" placeholder="Найти книгу или автора" class="search-input">
                <button type="submit" class="search-icon" style="background: none; border: none; cursor: pointer;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </form>
        </div>
        <div class="search-nav">
            <a href="{{ route('home') }}" class="active">Главная</a>
            <a href="{{ route('recommendations') }}">Рекомендации</a>
            <a href="{{ route('my-books') }}">Мои книги</a>
        </div>
    </div>
</section>
<section class="container section">
    <h2 class="section-title">Новинки</h2>
    <div class="books-grid">
        @foreach($newBooks as $book)
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
</section>
<section class="container section">
    <h2 class="section-title">Популярные авторы</h2>
    <div class="authors-grid">
        @foreach($popularAuthors as $author)
            <a href="{{ route('author.show', $author->id) }}" class="author-card">
                @if($author->image && file_exists(public_path('images/authors/' . $author->image)))
                    <img src="{{ asset('images/authors/' . $author->image) }}" alt="{{ $author->name }}">
                @else
                    <div style="width: 100%; height: 100%; background: #B57219; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: bold;">{{ substr($author->name, 0, 1) }}</div>
                @endif
                <div class="author-overlay">
                    <h3 class="author-name">{{ $author->name }}</h3>
                </div>
            </a>
        @endforeach
    </div>
</section>
<section class="container section">
    <h2 class="section-title">Популярно на этой неделе</h2>
    <div class="books-grid">
        @foreach($popularBooks as $book)
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
</section>
<section class="container section">
    <h2 class="section-title">Бестселлеры</h2>
    <div class="books-grid">
        @foreach($bestsellerBooks as $book)
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
</section>
@endsection
