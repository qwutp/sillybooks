@extends('layouts.app')

@section('title', 'Результаты поиска')

@section('content')
<style>
    .search-header {
        margin-bottom: 1.5rem;
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
    
    .search-container {
        display: flex;
        gap: 1.5rem;
    }
    
    .search-sidebar {
        width: 280px;
        flex-shrink: 0;
    }
    
    .search-results {
        flex: 1;
    }
    
    .filter-section {
        background-color: #f9fafb;
        border-radius: 8px;
        padding: 1.25rem;
        margin-bottom: 1.5rem;
    }
    
    .filter-title {
        font-weight: 600;
        margin-bottom: 1rem;
        font-size: 1rem;
        color: #374151;
    }
    
    .filter-group {
        margin-bottom: 1rem;
    }
    
    .filter-label {
        display: block;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
        color: #4b5563;
    }
    
    .filter-select {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        background-color: white;
        font-size: 0.875rem;
    }
    
    .filter-checkbox-group {
        max-height: 200px;
        overflow-y: auto;
        padding-right: 0.5rem;
    }
    
    .filter-checkbox-item {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
    }
    
    .filter-checkbox {
        margin-right: 0.5rem;
    }
    
    .filter-checkbox-label {
        font-size: 0.875rem;
        color: #4b5563;
    }
    
    .filter-button {
        background-color: #B57219;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        font-weight: 500;
        cursor: pointer;
        width: 100%;
        margin-top: 1rem;
    }
    
    .filter-button:hover {
        background-color: #9A5F14;
    }
    
    .filter-reset {
        background: none;
        border: none;
        color: #6b7280;
        font-size: 0.875rem;
        cursor: pointer;
        text-decoration: underline;
        padding: 0;
        margin-top: 0.5rem;
        width: 100%;
        text-align: center;
    }
    
    .filter-reset:hover {
        color: #4b5563;
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
    
    .book-rating {
        display: flex;
        align-items: center;
        margin-top: 0.25rem;
    }
    
    .book-rating-stars {
        color: #FACC15;
        font-size: 0.75rem;
        margin-right: 0.25rem;
    }
    
    .book-rating-value {
        color: #6b7280;
        font-size: 0.75rem;
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
    
    .search-input-container {
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
    
    .active-filters {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }
    
    .filter-tag {
        background-color: #f3f4f6;
        border-radius: 9999px;
        padding: 0.25rem 0.75rem;
        font-size: 0.75rem;
        color: #4b5563;
        display: flex;
        align-items: center;
    }
    
    .filter-tag-remove {
        margin-left: 0.25rem;
        color: #9ca3af;
        cursor: pointer;
    }
    
    .filter-tag-remove:hover {
        color: #6b7280;
    }
    
    @media (max-width: 768px) {
        .search-container {
            flex-direction: column;
        }
        
        .search-sidebar {
            width: 100%;
            margin-bottom: 1.5rem;
        }
        
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
        <h1 class="search-title">
            @if(!empty($searchParams['query']))
                Результаты поиска: "{{ $searchParams['query'] }}"
            @else
                Каталог книг
            @endif
        </h1>
        <p class="search-meta">Найдено: {{ $books->total() }} книг @if(count($authors) > 0) и {{ count($authors) }} авторов @endif</p>
    </div>
    
    <div class="search-container">
        <!-- Sidebar с фильтрами -->
        <div class="search-sidebar">
            <form action="{{ route('search') }}" method="GET" id="filterForm">
                @if(!empty($searchParams['query']))
                    <input type="hidden" name="query" value="{{ $searchParams['query'] }}">
                @endif
                
                <div class="filter-section">
                    <h3 class="filter-title">Фильтры</h3>
                    
                    <!-- Фильтр по жанрам -->
                    <div class="filter-group">
                        <label class="filter-label">Жанры</label>
                        <div class="filter-checkbox-group">
                            @foreach($genres as $genre)
                                <div class="filter-checkbox-item">
                                    <input type="checkbox" 
                                           name="genres[]" 
                                           value="{{ $genre->id }}" 
                                           id="genre-{{ $genre->id }}" 
                                           class="filter-checkbox"
                                           @if(in_array($genre->id, $searchParams['selectedGenres'])) checked @endif>
                                    <label for="genre-{{ $genre->id }}" class="filter-checkbox-label">{{ $genre->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Сортировка -->
                    <div class="filter-group">
                        <label class="filter-label" for="sort-by">Сортировка</label>
                        <select name="sort_by" id="sort-by" class="filter-select">
                            <option value="title_asc" @if($searchParams['sortBy'] == 'title_asc') selected @endif>По названию (А-Я)</option>
                            <option value="title_desc" @if($searchParams['sortBy'] == 'title_desc') selected @endif>По названию (Я-А)</option>
                            <option value="rating_desc" @if($searchParams['sortBy'] == 'rating_desc') selected @endif>По рейтингу</option>
                            <option value="newest" @if($searchParams['sortBy'] == 'newest') selected @endif>Сначала новые</option>
                            <option value="oldest" @if($searchParams['sortBy'] == 'oldest') selected @endif>Сначала старые</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="filter-button">Применить фильтры</button>
                    <button type="button" id="reset-filters" class="filter-reset">Сбросить все фильтры</button>
                </div>
            </form>
        </div>
        
        <!-- Основной контент с результатами -->
        <div class="search-results">
            <!-- Активные фильтры -->
            @if(!empty($searchParams['selectedGenres']))
                <div class="active-filters">
                    @foreach($genres->whereIn('id', $searchParams['selectedGenres']) as $genre)
                        <div class="filter-tag">
                            {{ $genre->name }}
                            <span class="filter-tag-remove" data-remove="genre" data-id="{{ $genre->id }}">×</span>
                        </div>
                    @endforeach
                </div>
            @endif
            
            @if(count($authors) > 0)
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
                                <div class="book-rating">
                                    <div class="book-rating-stars">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= round($book->average_rating))
                                                ★
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="book-rating-value">{{ number_format($book->average_rating, 1) }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    
                    @if($books->hasPages())
                        <div style="margin-top: 2rem;">
                            {{ $books->links() }}
                        </div>
                    @endif
                </div>
            @else
                <div class="no-results">
                    <h2 class="no-results-title">Ничего не найдено</h2>
                    <p class="no-results-text">
                        @if(!empty($searchParams['query']))
                            К сожалению, по вашему запросу ничего не найдено.
                        @else
                            К сожалению, книг, соответствующих выбранным фильтрам, не найдено.
                        @endif
                        Попробуйте изменить параметры поиска.
                    </p>
                    
                    <div class="search-again">
                        <form action="{{ route('search') }}" method="GET">
                            <div class="search-input-container">
                                <input type="text" name="query" placeholder="Попробуйте другой запрос" class="search-input" value="{{ $searchParams['query'] }}">
                                <button type="submit" class="search-icon" style="background: none; border: none; cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Обработчик для удаления тегов фильтров
        const filterTagRemoves = document.querySelectorAll('.filter-tag-remove');
        filterTagRemoves.forEach(tag => {
            tag.addEventListener('click', function() {
                const type = this.dataset.remove;
                
                if (type === 'genre') {
                    const genreId = this.dataset.id;
                    const checkbox = document.getElementById('genre-' + genreId);
                    if (checkbox) {
                        checkbox.checked = false;
                    }
                }
                
                // Отправляем форму
                document.getElementById('filterForm').submit();
            });
        });
        
        // Обработчик для кнопки сброса фильтров
        document.getElementById('reset-filters').addEventListener('click', function() {
            // Сбрасываем все чекбоксы
            const checkboxes = document.querySelectorAll('.filter-checkbox');
            checkboxes.forEach(cb => cb.checked = false);
            
            // Сбрасываем сортировку
            document.getElementById('sort-by').value = 'title_asc';
            
            // Отправляем форму
            document.getElementById('filterForm').submit();
        });
    });
</script>
@endsection
