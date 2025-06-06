@extends('layouts.admin')

@section('title', 'Управление книгами')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <h2 style="margin: 0;">Список книг</h2>
    <a href="{{ route('admin.books.create') }}" class="btn btn-primary btn-sm">
        Добавить книгу
    </a>
</div>
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.books.index') }}" style="display: flex; gap: 1rem; align-items: center;">
            <div style="flex: 1;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Поиск по названию или автору..." class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Поиск</button>
            @if(request('search'))
                <a href="{{ route('admin.books.index') }}" class="btn btn-secondary btn-sm">Сбросить</a>
            @endif
        </form>
    </div>
</div>
<div class="card">
    @if($books->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Книга</th>
                    <th>Автор</th>
                    <th>Жанры</th>
                    <th>Рейтинг</th>
                    <th>Дата добавления</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>
                        <div style="display: flex; align-items: center;">
                            <div style="width: 48px; height: 64px; margin-right: 1rem; background: #f0f0f0; border-radius: 0.25rem; overflow: hidden;">
                                @if($book->cover_image && file_exists(public_path('images/books/' . $book->cover_image)))
                                    <img src="{{ asset('images/books/' . $book->cover_image) }}" alt="{{ $book->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <div style="width: 100%; height: 100%; background: #e5e7eb; display: flex; align-items: center; justify-content: center; color: #9ca3af; font-size: 0.75rem;">Нет обложки</div>
                                @endif
                            </div>
                            <div>
                                <div style="font-weight: 500;">{{ $book->title }}</div>
                                <div style="color: #666; font-size: 0.9rem;">{{ Str::limit($book->description, 50) }}</div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $book->author->name ?? 'Неизвестен' }}</td>
                    <td>
                        <div style="display: flex; flex-wrap: wrap; gap: 0.25rem;">
                            @foreach($book->genres as $genre)
                                <span style="background: #f0f0f0; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.8rem;">{{ $genre->name }}</span>
                            @endforeach
                        </div>
                    </td>
                    <td>
                        <div style="display: flex; align-items: center;">
                            <span>{{ number_format($book->average_rating, 1) }}</span>
                        </div>
                    </td>
                    <td>{{ $book->created_at->format('d.m.Y') }}</td>
                    <td>
                        <div style="display: flex; gap: 0.5rem;">
                            <a href="{{ route('admin.books.edit', $book) }}" style="color: #B57219; text-decoration: none;">Редактировать</a>
                            <form action="{{ route('admin.books.destroy', $book) }}" method="POST" style="display: inline;" onsubmit="return confirm('Вы уверены, что хотите удалить эту книгу?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; text-decoration: underline;">Удалить</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($books->hasPages())
            <div style="padding: 1.5rem; border-top: 1px solid #ddd;">
                {{ $books->links() }}
            </div>
        @endif
    @else
        <div style="padding: 2rem; text-align: center;">
            <p style="color: #666;">Книги не найдены.</p>
            <a href="{{ route('admin.books.create') }}" class="btn btn-primary btn-sm" style="margin-top: 1rem;">
                Добавить первую книгу
            </a>
        </div>
    @endif
</div>
@endsection
