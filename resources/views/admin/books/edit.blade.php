@extends('layouts.admin')

@section('title', 'Редактировать книгу')

@section('content')
<style>
    .error {
        border-color: #dc3545 !important;
    }
    .error-message {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    .genre-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 0.75rem;
        max-height: 200px;
        overflow-y: auto;
        border: 1px solid #ddd;
        padding: 1rem;
        border-radius: 4px;
    }
    .genre-item {
        display: flex;
        align-items: center;
        padding: 0.25rem 0;
    }
    .genre-item input {
        margin-right: 0.5rem;
    }
    .current-image {
        margin-bottom: 1rem;
    }
    .current-image img {
        max-width: 150px;
        height: auto;
        border-radius: 4px;
        border: 1px solid #ddd;
    }
</style>

<div style="max-width: 800px; margin: 0 auto;">
    <div style="display: flex; align-items: center; margin-bottom: 2rem;">
        <a href="{{ route('admin.books.index') }}" style="color: #666; text-decoration: none; margin-right: 1rem; font-size: 1.5rem;">
            ← Назад
        </a>
        <h2 style="margin: 0;">Редактировать книгу: {{ $book->title }}</h2>
    </div>

    <div class="card">
        <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data" style="padding: 2rem;">
            @csrf
            @method('PUT')
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label for="title" class="form-label">Название книги *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" required class="form-control @error('title') error @enderror">
                    @error('title')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="author_id" class="form-label">Автор *</label>
                    <select name="author_id" id="author_id" required class="form-control @error('author_id') error @enderror">
                        <option value="">Выберите автора</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div style="margin-bottom: 1.5rem;">
                <label for="description" class="form-label">Описание *</label>
                <textarea name="description" id="description" rows="4" required class="form-control @error('description') error @enderror">{{ old('description', $book->description) }}</textarea>
                @error('description')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label for="publisher" class="form-label">Издательство *</label>
                    <input type="text" name="publisher" id="publisher" value="{{ old('publisher', $book->publisher) }}" required class="form-control @error('publisher') error @enderror">
                    @error('publisher')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="year" class="form-label">Год публикации *</label>
                    <input type="number" name="year" id="year" value="{{ old('year', $book->year) }}" min="1000" max="{{ date('Y') }}" required class="form-control @error('year') error @enderror">
                    @error('year')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="pages" class="form-label">Количество страниц *</label>
                    <input type="number" name="pages" id="pages" value="{{ old('pages', $book->pages) }}" min="1" required class="form-control @error('pages') error @enderror">
                    @error('pages')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label for="language" class="form-label">Язык *</label>
                    <input type="text" name="language" id="language" value="{{ old('language', $book->language) }}" required class="form-control @error('language') error @enderror">
                    @error('language')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label style="display: flex; align-items: center; margin-top: 2rem;">
                        <input type="checkbox" name="is_bestseller" value="1" {{ old('is_bestseller', $book->is_bestseller) ? 'checked' : '' }} style="margin-right: 0.5rem;">
                        <span>Бестселлер</span>
                    </label>
                </div>
            </div>
            <div style="margin-bottom: 1.5rem;">
                <label class="form-label">Жанры * (выберите один или несколько)</label>
                @if($genres->count() > 0)
                    <div class="genre-grid">
                        @foreach($genres as $genre)
                            <label class="genre-item">
                                <input type="checkbox" name="genres[]" value="{{ $genre->id }}" 
                                       {{ in_array($genre->id, old('genres', $book->genres->pluck('id')->toArray())) ? 'checked' : '' }}>
                                <span>{{ $genre->name }}</span>
                            </label>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-warning">
                        Жанры не найдены. Обратитесь к администратору для добавления жанров.
                    </div>
                @endif
                @error('genres')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            @if($book->cover_image && file_exists(public_path('images/books/' . $book->cover_image)))
                <div style="margin-bottom: 1.5rem;">
                    <label class="form-label">Текущая обложка</label>
                    <div class="current-image">
                        <img src="{{ asset('images/books/' . $book->cover_image) }}" alt="{{ $book->title }}">
                    </div>
                </div>
            @endif
            <div style="margin-bottom: 1.5rem;">
                <label for="cover_image" class="form-label">Изменить обложку</label>
                <input type="file" name="cover_image" id="cover_image" accept="image/*" class="form-control @error('cover_image') error @enderror">
                @error('cover_image')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div style="display: flex; justify-content: flex-end; gap: 1rem; padding-top: 1.5rem; border-top: 1px solid #ddd;">
                <a href="{{ route('admin.books.index') }}" class="btn btn-secondary btn-sm">Отмена</a>
                <button type="submit" class="btn btn-primary btn-sm">Сохранить изменения</button>
            </div>
        </form>
    </div>
</div>

<script>
document.querySelector('form').addEventListener('submit', function(e) {
    const genreCheckboxes = document.querySelectorAll('input[name="genres[]"]:checked');
    if (genreCheckboxes.length === 0) {
        e.preventDefault();
        alert('Пожалуйста, выберите хотя бы один жанр для книги.');
        return false;
    }
});
</script>
@endsection
